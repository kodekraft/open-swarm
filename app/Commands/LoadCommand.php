<?php

namespace KodeKraft\OpenSwarm\Commands;

use InvalidArgumentException;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use KodeKraft\OpenSwarm\Clients\GuzzleClient;
use KodeKraft\OpenSwarm\Entities\OpenAPI\v2\OpenAPI;
use KodeKraft\OpenSwarm\Output;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LoadCommand
 *
 * @package KodeKraft\OpenSwarm\Commands
 */
class LoadCommand extends Command
{
    const ARG_FILE = 'file';
    const OPT_OPERATION = 'operation';
    const OPT_TIMEOUT = 'timeout';
    const OPT_REQUEST_COUNT = 'requests';
    const OPT_CONNECTIONS = 'connections';

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * LoadCommand constructor.
     *
     * @param string $root
     * @param string $name
     */
    public function __construct($root, $name = 'open-swarm')
    {
        parent::__construct($name);
        $adapter = new Local($root);
        $this->filesystem = new Filesystem($adapter);
        $this->serializer = $this->serializer = SerializerBuilder::create()
            ->addMetadataDir(
                app_path('Entities/OpenAPI/v2/Metadata'),
                'KodeKraft\\OpenSwarm\\Entities\\OpenAPI\\v2'
            )->build();
    }

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName('load')
            ->setDescription('Loads your swagger file and allows you to stress test the paths.')
            ->addArgument(self::ARG_FILE, InputArgument::REQUIRED, 'The filename containing the swagger data.')
            ->addOption(self::OPT_OPERATION, null, InputOption::VALUE_OPTIONAL, 'A specific operation to test.')
            ->addOption(self::OPT_TIMEOUT, null, InputOption::VALUE_OPTIONAL, 'Set the timeout value for the connection.', 5)
            ->addOption(self::OPT_REQUEST_COUNT, null, InputOption::VALUE_OPTIONAL, 'Set the number of requests per connection.', 1)
            ->addOption(self::OPT_CONNECTIONS, null, InputOption::VALUE_OPTIONAL, 'Set the number of concurrent connections.', 1);

    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument(self::ARG_FILE);
        $path = $input->getOption(self::OPT_OPERATION);
        $method = $input->getOption(self::OPT_METHOD);
        $timeout = $input->getOption(self::OPT_TIMEOUT);
        $requestCount = $input->getOption(self::OPT_REQUEST_COUNT);
        $connections = $input->getOption(self::OPT_CONNECTIONS);

        $output = (new Output($output))->newline();

        if (empty($file)) {
            throw new RuntimeException('Not enough arguments (missing: "' . self::ARG_FILE . '").');
        }

        if (!$this->filesystem->has($file)) {
            $output->error("Could not find the swagger file, '{$file}'.");

            return;
        }

        if (isset($method) && !in_array(strtolower($method), ['put', 'post', 'get', 'head', 'delete', 'options'])) {
            $output->error("Your method '{$method}' is invalid.");

            return;
        }

        $data = $this->filesystem->read($file);

        try {
            /** @var OpenAPI $openAPI */
            $openAPI = $this->serializer->deserialize($data, OpenAPI::class, 'json');

            $hostname = $openAPI->getAbsoluteUrl();
            if (!filter_var($hostname, FILTER_VALIDATE_URL)) {
                $output->error("Your hostname '{$hostname}' is invalid.");

                return;
            }

            if (isset($path)) {
                $pathItem = $openAPI->getPath($path);

                if (is_null($pathItem)) {
                    $output->error("The path '{$path}' does not exist in your file.");

                    return;
                }

                if (!isset($pathItem->getDocument()->$method)) {
                    $output->error("The path '{$path}' does not contain a '{$method}' method.");

                    return;
                }

                $openAPI->setPath($path, $pathItem, $method);
            }

            $hostname = $openAPI->getHost();

            $output->info("Swarming on $hostname ...")->newline();
        } catch (InvalidArgumentException $e) {
            $output->error($e->getMessage());

            return;
        }

        foreach ($openAPI->getPaths() as $path => $methods) {
            foreach ($methods as $method => $properties) {
                $client = new GuzzleClient([
                    'base_uri' => $hostname,
                    'timeout'  => $timeout,
                ], new ProgressBar($output->getOutput(), $requestCount));

                $results = $client->execute($properties);

                $output->newline(2)
                    ->label("  Server Software     ", $results->getServerSoftware())
                    ->label("  Server Hostname     ", parse_url($openAPI->getHost(), PHP_URL_HOST))
                    ->label("  Server Port         ", $this->getPort($openAPI->getHost()))
                    ->newline()
                    ->label("  Document Path       ", $path)
                    ->label("  Document Length     ", $results->getDocumentLength() . ' bytes')
                    ->newline()
                    ->label("  Request Method      ", strtoupper($pathItem->getMethod()))
                    ->label("  Concurrency Level   ", $pathItem->getConcurrency())
                    ->label("  Time taken for tests", $results->getTotalTime() . ' seconds')
                    ->label("  Completed requests  ", $results->getCompletedRequestCount())
                    ->label("  4xx responses       ", $results->getClientExceptionCount())
                    ->label("  5xx responses       ", $results->getServerExceptionCount())
                    ->label("  Connect errors      ", $results->getConnectExceptionCount())
                    ->label("  Total transferred   ", $results->getTotalTransferred() . ' bytes')
                    ->label("  Requests per second ", $results->getRequestsPerSecond() . '[#/sec] (mean)')
                    ->label("  Time per request    ", $results->getTimePerRequest() . ' [ms] (mean)')
                    ->label("  Time per request    ", $results->getTimePerRequest(false) . ' [ms] (mean, across all concurrent requests)')
                    ->label("  Transfer rate       ", $results->getTransferRate() . ' [Kbytes/sec] received')
                    ->newline(2);
            }
        }
    }

    /**
     * @param string $url
     *
     * @return mixed|string
     */
    private function getPort(string $url)
    {
        return parse_url($url, PHP_URL_PORT) ?? '80';
    }
}
