<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Response
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Response
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var Schema
     */
    private $schema;

    /**
     * @var Header[]
     */
    private $headers;

    /**
     * @var array
     */
    private $examples;

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
     * @return Response
     */
    public function setDescription(string $description): Response
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Schema
     */
    public function getSchema(): Schema
    {
        return $this->schema;
    }

    /**
     * @param Schema $schema
     *
     * @return Response
     */
    public function setSchema(Schema $schema): Response
    {
        $this->schema = $schema;

        return $this;
    }

    /**
     * @return Header[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param Header[] $headers
     *
     * @return Response
     */
    public function setHeaders(array $headers): Response
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getExamples(): array
    {
        return $this->examples;
    }

    /**
     * @param array $examples
     *
     * @return Response
     */
    public function setExamples(array $examples): Response
    {
        $this->examples = $examples;

        return $this;
    }
}
