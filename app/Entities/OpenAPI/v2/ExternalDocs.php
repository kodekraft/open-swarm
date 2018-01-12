<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class ExternalDocs
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class ExternalDocs
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $url;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return ExternalDocs
     */
    public function setDescription(string $description): ExternalDocs
    {
        $this->description = $description;

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
     * @return ExternalDocs
     */
    public function setUrl(string $url): ExternalDocs
    {
        $this->url = $url;

        return $this;
    }
}
