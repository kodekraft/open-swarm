<?php

namespace KodeKraft\OpenSwarm\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use KodeKraft\OpenSwarm\Entities\RequestEntity;
use KodeKraft\OpenSwarm\Entities\ResultsEntity;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Class GuzzleClient
 *
 * @package KodeKraft\OpenSwarm\Clients
 */
class GuzzleClient extends Client
{
    /**
     * @var Stopwatch
     */
    private $stopwatch;

    /**
     * @var ProgressBar
     */
    private $progress;

    /**
     * GuzzleClient constructor.
     *
     * @param array       $config
     * @param ProgressBar $progress
     */
    public function __construct(array $config = [], ProgressBar $progress)
    {
        parent::__construct($config);
        $this->stopwatch = new Stopwatch();
        $progress->setFormat(' %current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%');
        $progress->setBarCharacter('<fg=magenta>=</>');
        $this->progress = $progress;
    }

    /**
     * @param RequestEntity $requestEntity
     *
     * @return ResultsEntity
     */
    public function execute(RequestEntity $requestEntity)
    {
        $results = new ResultsEntity();
        $results->setRequestCount($requestEntity->getRequestCount())->setConcurrency($requestEntity->getConcurrency());

        $this->progress->start();

        $requests = function ($total) use ($requestEntity) {
            for ($index = 0; $index < $total; $index++) {
                yield new Request($requestEntity->getMethod(), $requestEntity->getUri(), $requestEntity->getHeaders(), $requestEntity->getBody());
            }
        };

        $pool = new Pool($this, $requests($requestEntity->getRequestCount()), [
            'concurrency' => $requestEntity->getConcurrency(),
            'fulfilled' => function (Response $response, $index) use ($results) {
                $this->stopwatch->lap('request');
                $results->setDocumentLength($response->getHeaderLine('Content-Length'))
                    ->setServerSoftware($response->getHeaderLine('Server'))
                    ->addDocumentLength($response->getHeaderLine('Content-Length'))
                    ->incrementCompletedRequestCount();

                $this->progress->advance();
            },
            'rejected' => function (GuzzleException $reason, $index) use ($results) {

                if ($reason->hasResponse()) {
                    $response = $reason->getResponse();

                    $results->setServerSoftware($response->getHeaderLine('Server'))
                        ->addDocumentLength($response->getHeaderLine('Content-Length'))
                        ->setDocumentLength($response->getHeaderLine('Content-Length'));
                }

                if ($reason instanceof ClientException) {
                    $results->addDocumentLength($response->getHeaderLine('Content-Length'))->incrementClientExceptionCount()->incrementCompletedRequestCount();
                }

                if ($reason instanceof ServerException) {
                    $results->addDocumentLength($response->getHeaderLine('Content-Length'))->incrementServerExceptionCount()->incrementConnectExceptionCount();
                }

                if ($reason instanceof ConnectException) {
                    $results->incrementConnectExceptionCount();
                }

                $this->stopwatch->lap('request');
                $this->progress->advance();
            },
        ]);

        // Initiate the transfers and create a promise
        $promise = $pool->promise();

        // Force the pool of requests to complete.
        $this->stopwatch->start('request');
        $promise->wait();
        $event = $this->stopwatch->stop('request');
        $this->progress->finish();

        $results->setPeriods($event->getPeriods())->setTotalTime($event->getDuration());

        return $results;
    }
}
