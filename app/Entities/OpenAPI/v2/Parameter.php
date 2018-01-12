<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Parameter
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Parameter
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $in;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $required;

    /**
     * @var Schema
     */
    private $schema;

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
     * @return Parameter
     */
    public function setName(string $name): Parameter
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getIn(): string
    {
        return $this->in;
    }

    /**
     * @param string $in
     *
     * @return Parameter
     */
    public function setIn(string $in): Parameter
    {
        $this->in = $in;

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
     * @return Parameter
     */
    public function setDescription(string $description): Parameter
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     *
     * @return Parameter
     */
    public function setRequired(bool $required): Parameter
    {
        $this->required = $required;

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
     * @return Parameter
     */
    public function setSchema(Schema $schema): Parameter
    {
        $this->schema = $schema;

        return $this;
    }
}
