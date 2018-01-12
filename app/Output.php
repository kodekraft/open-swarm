<?php

namespace KodeKraft\OpenSwarm;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Output
 *
 * @package KodeKraft\OpenSwarm
 */
class Output
{
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * Output constructor.
     *
     * @param OutputInterface $output
     */
    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * @return OutputInterface
     */
    public function getOutput(): OutputInterface
    {
        return $this->output;
    }

    /**
     * @param OutputInterface $output
     *
     * @return Output
     */
    public function setOutput(OutputInterface $output): Output
    {
        $this->output = $output;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return Output
     */
    public function error(string $message): Output
    {
        $this->output->writeln("<fg=black;bg=red;options=bold> {$message} </>");

        return $this;
    }

    /**
     * @param string $message
     *
     * @return Output
     */
    public function info(string $message): Output
    {
        $this->output->writeln("<info>{$message}</info>");

        return $this;
    }

    /**
     * @param string $label
     * @param string $value
     *
     * @return Output
     */
    public function label(string $label, string $value): Output
    {
        $this->output->writeln("<options=bold>{$label} </><info>{$value}</info>");

        return $this;
    }

    /**
     * @param int $lines
     *
     * @return Output
     */
    public function newline($lines = 1): Output
    {
        while ($lines > 0) {
            $this->output->write(PHP_EOL);
            $lines--;
        }

        return $this;
    }
}
