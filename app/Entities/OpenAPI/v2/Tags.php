<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Tags
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Tags
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var ExternalDocs
     */
    private $externalDocs;

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
     * @return Tags
     */
    public function setName(string $name): Tags
    {
        $this->name = $name;

        return $this;
    }

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
     * @return Tags
     */
    public function setDescription(string $description): Tags
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return ExternalDocs
     */
    public function getExternalDocs(): ExternalDocs
    {
        return $this->externalDocs;
    }

    /**
     * @param ExternalDocs $externalDocs
     *
     * @return Tags
     */
    public function setExternalDocs(ExternalDocs $externalDocs): Tags
    {
        $this->externalDocs = $externalDocs;

        return $this;
    }
}
