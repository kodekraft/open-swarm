<?php

namespace KodeKraft\OpenSwarm\Entities;

use Exception;
use KodeKraft\OpenSwarm\Replacer;

/**
 * Class RequestEntity
 *
 * @package KodeKraft\OpenSwarm\Entities
 */
class RequestEntity
{
    /**
     * @var int
     */
    private $concurrency;

    /**
     * @var int
     */
    private $requestCount;

    /**
     * @var int
     */
    private $timeout;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var string
     */
    private $body = null;

    /**
     * RequestEntity constructor.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     */
    private function hydrate(array $data)
    {
        $params = get_object_vars($this);

        foreach ($params as $property => $value) {
            if (!isset($data[$property])) {
                continue;
            }

            if (is_array($data[$property])) {
                if ($property === 'headers') {
                    foreach ($data[$property] as $v) {
                        foreach ($v as $header => $headerValue) {
                            $this->$property[$header] = $headerValue;
                        }
                    }
                    continue;
                }

                if ($property === 'body' && isset($data[$property])) {
                    if (is_array($data[$property])) {
                        Replacer::replace($data[$property]);
                    }
                    $data[$property] = json_encode($data[$property]);
                }
            }

            $this->$property = $data[$property];
        }
    }

    /**
     * @return int
     */
    public function getConcurrency(): int
    {
        return $this->concurrency;
    }

    /**
     * @param int $concurrency
     *
     * @return RequestEntity
     */
    public function setConcurrency(int $concurrency): RequestEntity
    {
        $this->concurrency = $concurrency;

        return $this;
    }

    /**
     * @return int
     */
    public function getRequestCount(): int
    {
        return $this->requestCount;
    }

    /**
     * @param int $requestCount
     *
     * @return RequestEntity
     */
    public function setRequestCount(int $requestCount): RequestEntity
    {
        $this->requestCount = $requestCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     *
     * @return RequestEntity
     */
    public function setTimeout(int $timeout): RequestEntity
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return RequestEntity
     */
    public function setMethod(string $method): RequestEntity
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     *
     * @return RequestEntity
     */
    public function setUri(string $uri): RequestEntity
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     *
     * @return RequestEntity
     */
    public function setHeaders(array $headers): RequestEntity
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     *
     * @return RequestEntity
     */
    public function setBody(string $body): RequestEntity
    {
        $this->body = $body;

        return $this;
    }
}
