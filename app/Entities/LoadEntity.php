<?php

namespace KodeKraft\OpenSwarm\Entities;

use Exception;

/**
 * Class LoadEntity
 *
 * @package KodeKraft\OpenSwarm\Entities
 */
class LoadEntity
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var RequestEntity[]
     */
    private $requests;

    /**
     * RequestEntity constructor.
     *
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = \GuzzleHttp\json_decode($json, true);
        $this->hydrate($data);
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     *
     * @return LoadEntity
     */
    public function setHost(string $host): LoadEntity
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @param string $request
     *
     * @return null|RequestEntity
     */
    public function getRequest(string $request)
    {
        return $this->requests[$request] ?? null;
    }

    /**
     * @return RequestEntity[]
     */
    public function getRequests(): array
    {
        return $this->requests;
    }

    /**
     * @param RequestEntity[] $requests
     *
     * @return LoadEntity
     */
    public function setRequests(array $requests): LoadEntity
    {
        $this->requests = $requests;

        return $this;
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
                throw new Exception("The property '{$property}' is required in your load file.");
            }

            if (is_array($data[$property])) {
                if ($property === 'requests') {
                    foreach ($data[$property] as $request) {
                        foreach ($request as $k => $v) {
                            $this->$property[$k] = new RequestEntity($v);
                        }
                    }
                    continue;
                }
            }

            $this->$property = $data[$property];
        }
    }
}
