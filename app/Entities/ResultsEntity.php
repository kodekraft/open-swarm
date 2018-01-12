<?php

namespace KodeKraft\OpenSwarm\Entities;

use Symfony\Component\Stopwatch\StopwatchPeriod;

/**
 * Class ResultsEntity
 *
 * @package KodeKraft\OpenSwarm\Entities
 */
class ResultsEntity
{
    /**
     * @var int
     */
    private $requestCount = 0;

    /**
     * @var int
     */
    private $concurrency = 0;

    /**
     * @var float
     */
    private $totalTime = 0;

    /**
     * @var int
     */
    private $completedRequestCount = 0;

    /**
     * @var int
     */
    private $clientExceptionCount = 0;

    /**
     * @var int
     */
    private $serverExceptionCount = 0;

    /**
     * @var int
     */
    private $connectExceptionCount = 0;

    /**
     * @var int
     */
    private $totalTransferred = 0;

    /**
     * @var int
     */
    private $documentLength = 0;

    /**
     * @var string
     */
    private $serverSoftware = '';

    /**
     * @var StopwatchPeriod[]
     */
    private $periods = [];

    /**
     * @param int $requestCount
     *
     * @return $this
     */
    public function setRequestCount(int $requestCount = 1)
    {
        $this->requestCount = $requestCount;

        return $this;
    }

    /**
     * @param int $concurrency
     *
     * @return $this
     */
    public function setConcurrency(int $concurrency = 1)
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    /**
     * @return int
     */
    public function getConcurrency(): int
    {
        return $this->concurrency;
    }

    /**
     * @return float
     */
    public function getTotalTime(): float
    {
        return ($this->totalTime / 1000);
    }

    /**
     * @param float $totalTime
     *
     * @return $this
     */
    public function setTotalTime(float $totalTime)
    {
        $this->totalTime = $totalTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getCompletedRequestCount(): int
    {
        return $this->completedRequestCount;
    }

    /**
     * @param int $completedRequestCount
     *
     * @return $this
     */
    public function setCompletedRequestCount(int $completedRequestCount)
    {
        $this->completedRequestCount = $completedRequestCount;

        return $this;
    }

    /**
     * @return $this
     */
    public function incrementCompletedRequestCount()
    {
        $this->completedRequestCount++;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalTransferred(): int
    {
        return $this->totalTransferred;
    }

    /**
     * @param int $totalTransferred
     *
     * @return $this
     */
    public function setTotalTransferred(int $totalTransferred)
    {
        $this->totalTransferred = $totalTransferred;

        return $this;
    }

    /**
     * @return StopwatchPeriod[]
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param StopwatchPeriod[] $periods
     *
     * @return $this
     */
    public function setPeriods(array $periods)
    {
        $this->periods = $periods;

        return $this;
    }

    /**
     * @return float
     */
    public function getRequestsPerSecond()
    {
        return ($this->requestCount / $this->getTotalTime());
    }

    /**
     * @param bool $isAcrossAllConcurrentRequests
     *
     * @return float|int
     */
    public function getTimePerRequest($isAcrossAllConcurrentRequests = true)
    {
        $deltas = [];

        foreach ($this->getPeriods() as $period) {
            $deltas[] = $period->getDuration();
        }

        $mean = array_sum($deltas) / count($this->getPeriods());
        if ($isAcrossAllConcurrentRequests) {
            return $mean;
        }

        return $mean * $this->concurrency;
    }

    /**
     * @return float
     */
    public function getTransferRate()
    {
        return (($this->getTotalTransferred() / $this->getTotalTime())) / 1000;
    }

    /**
     * @return int
     */
    public function getDocumentLength()
    {
        return $this->documentLength;
    }

    /**
     * @param string $documentLength
     *
     * @return $this
     */
    public function setDocumentLength(string $documentLength = '')
    {
        if (!empty($documentLength)) {
            $this->documentLength = intval($documentLength);
        }

        return $this;
    }

    /**
     * @param string $documentLength
     *
     * @return $this
     */
    public function addDocumentLength(string $documentLength = '')
    {
        if (!empty($documentLength)) {
            $this->totalTransferred += intval($documentLength);
        }

        return $this;
    }


    /**
     * @return string
     */
    public function getServerSoftware(): string
    {
        return $this->serverSoftware;
    }

    /**
     * @param string $serverSoftware
     *
     * @return $this
     */
    public function setServerSoftware(string $serverSoftware)
    {
        $this->serverSoftware = $serverSoftware;

        return $this;
    }

    /**
     * @return int
     */
    public function getClientExceptionCount(): int
    {
        return $this->clientExceptionCount;
    }

    /**
     * @param int $clientExceptionCount
     *
     * @return $this
     */
    public function setClientExceptionCount(int $clientExceptionCount)
    {
        $this->clientExceptionCount = $clientExceptionCount;

        return $this;
    }

    /**
     * @return $this
     */
    public function incrementClientExceptionCount()
    {
        $this->clientExceptionCount++;

        return $this;
    }

    /**
     * @return int
     */
    public function getServerExceptionCount(): int
    {
        return $this->serverExceptionCount;
    }

    /**
     * @param int $serverExceptionCount
     *
     * @return $this
     */
    public function setServerExceptionCount(int $serverExceptionCount)
    {
        $this->serverExceptionCount = $serverExceptionCount;

        return $this;
    }

    /**
     * @return $this
     */
    public function incrementServerExceptionCount()
    {
        $this->serverExceptionCount++;

        return $this;
    }

    /**
     * @return int
     */
    public function getConnectExceptionCount(): int
    {
        return $this->connectExceptionCount;
    }

    /**
     * @param int $connectExceptionCount
     *
     * @return $this
     */
    public function setConnectExceptionCount(int $connectExceptionCount)
    {
        $this->connectExceptionCount = $connectExceptionCount;

        return $this;
    }

    /**
     * @return $this
     */
    public function incrementConnectExceptionCount()
    {
        $this->connectExceptionCount++;

        return $this;
    }
}