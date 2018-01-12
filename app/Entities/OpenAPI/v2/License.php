<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class License
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class License
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return License
     */
    public function setName(string $name): License
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return License
     */
    public function setUrl(string $url): License
    {
        $this->url = $url;

        return $this;
    }
}
