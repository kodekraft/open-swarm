<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Operation
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Operation
{
    /**
     * @var string[]
     */
    private $tags;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $description;

    /**
     * @var ExternalDocs
     */
    private $externalDocs;

    /**
     * @var string
     */
    private $operationId;

    /**
     * @var string[]
     */
    private $consumes;

    /**
     * @var string[]
     */
    private $produces;

    /**
     * @var Parameter[]
     */
    private $parameters;

    /**
     * @var Response[]
     */
    private $responses;

    /**
     * @var string[]
     */
    private $schemes;

    /**
     * @var bool
     */
    private $deprecated;

    /**
     * @var array
     */
    private $security;

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param string[] $tags
     *
     * @return Operation
     */
    public function setTags(array $tags): Operation
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     *
     * @return Operation
     */
    public function setSummary(string $summary): Operation
    {
        $this->summary = $summary;

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
     * @return Operation
     */
    public function setDescription(string $description): Operation
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
     * @return Operation
     */
    public function setExternalDocs(ExternalDocs $externalDocs): Operation
    {
        $this->externalDocs = $externalDocs;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperationId(): string
    {
        return $this->operationId;
    }

    /**
     * @param string $operationId
     *
     * @return Operation
     */
    public function setOperationId(string $operationId): Operation
    {
        $this->operationId = $operationId;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getConsumes(): array
    {
        return $this->consumes;
    }

    /**
     * @param string[] $consumes
     *
     * @return Operation
     */
    public function setConsumes(array $consumes): Operation
    {
        $this->consumes = $consumes;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getProduces(): array
    {
        return $this->produces;
    }

    /**
     * @param string[] $produces
     *
     * @return Operation
     */
    public function setProduces(array $produces): Operation
    {
        $this->produces = $produces;

        return $this;
    }

    /**
     * @return Parameter[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param Parameter[] $parameters
     *
     * @return Operation
     */
    public function setParameters(array $parameters): Operation
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return Response[]
     */
    public function getResponses(): array
    {
        return $this->responses;
    }

    /**
     * @param Response[] $responses
     *
     * @return Operation
     */
    public function setResponses(array $responses): Operation
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getSchemes(): array
    {
        return $this->schemes;
    }

    /**
     * @param string[] $schemes
     *
     * @return Operation
     */
    public function setSchemes(array $schemes): Operation
    {
        $this->schemes = $schemes;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDeprecated(): bool
    {
        return $this->deprecated;
    }

    /**
     * @param bool $deprecated
     *
     * @return Operation
     */
    public function setDeprecated(bool $deprecated): Operation
    {
        $this->deprecated = $deprecated;

        return $this;
    }

    /**
     * @return array
     */
    public function getSecurity(): array
    {
        return $this->security;
    }

    /**
     * @param array $security
     *
     * @return Operation
     */
    public function setSecurity(array $security): Operation
    {
        $this->security = $security;

        return $this;
    }
}
