<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Definition
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Definition
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $properties;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Definition
     */
    public function setType(string $type): Definition
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param array $properties
     *
     * @return Definition
     */
    public function setProperties(array $properties): Definition
    {
        $this->properties = $properties;

        return $this;
    }
}
