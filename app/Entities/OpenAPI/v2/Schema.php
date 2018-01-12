<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Schema
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Schema
{
    /**
     * @var string
     */
    private $ref;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $default;

    /**
     * @var int
     */
    private $multipleOf;

    /**
     * @var int
     */
    private $maximum;

    /**
     * @var bool
     */
    private $exclusiveMaximum;

    /**
     * @var int
     */
    private $minimum;

    /**
     * @var bool
     */
    private $exclusiveMinimum;

    /**
     * @var int
     */
    private $maxLength;

    /**
     * @var int
     */
    private $minLength;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var int
     */
    private $maxItems;

    /**
     * @var int
     */
    private $minItems;

    /**
     * @var bool
     */
    private $uniqueItems;

    /**
     * @var int
     */
    private $maxProperties;

    /**
     * @var int
     */
    private $minProperties;

    /**
     * @var string[]
     */
    private $required;

    /**
     * @var string[]
     */
    private $enum;

    /**
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getRef(): string
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     *
     * @return Schema
     */
    public function setRef(string $ref): Schema
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     *
     * @return Schema
     */
    public function setFormat(string $format): Schema
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Schema
     */
    public function setTitle(string $title): Schema
    {
        $this->title = $title;

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
     * @return Schema
     */
    public function setDescription(string $description): Schema
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefault(): string
    {
        return $this->default;
    }

    /**
     * @param string $default
     *
     * @return Schema
     */
    public function setDefault(string $default): Schema
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return int
     */
    public function getMultipleOf(): int
    {
        return $this->multipleOf;
    }

    /**
     * @param int $multipleOf
     *
     * @return Schema
     */
    public function setMultipleOf(int $multipleOf): Schema
    {
        $this->multipleOf = $multipleOf;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaximum(): int
    {
        return $this->maximum;
    }

    /**
     * @param int $maximum
     *
     * @return Schema
     */
    public function setMaximum(int $maximum): Schema
    {
        $this->maximum = $maximum;

        return $this;
    }

    /**
     * @return bool
     */
    public function isExclusiveMaximum(): bool
    {
        return $this->exclusiveMaximum;
    }

    /**
     * @param bool $exclusiveMaximum
     *
     * @return Schema
     */
    public function setExclusiveMaximum(bool $exclusiveMaximum): Schema
    {
        $this->exclusiveMaximum = $exclusiveMaximum;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinimum(): int
    {
        return $this->minimum;
    }

    /**
     * @param int $minimum
     *
     * @return Schema
     */
    public function setMinimum(int $minimum): Schema
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * @return bool
     */
    public function isExclusiveMinimum(): bool
    {
        return $this->exclusiveMinimum;
    }

    /**
     * @param bool $exclusiveMinimum
     *
     * @return Schema
     */
    public function setExclusiveMinimum(bool $exclusiveMinimum): Schema
    {
        $this->exclusiveMinimum = $exclusiveMinimum;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    /**
     * @param int $maxLength
     *
     * @return Schema
     */
    public function setMaxLength(int $maxLength): Schema
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinLength(): int
    {
        return $this->minLength;
    }

    /**
     * @param int $minLength
     *
     * @return Schema
     */
    public function setMinLength(int $minLength): Schema
    {
        $this->minLength = $minLength;

        return $this;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     *
     * @return Schema
     */
    public function setPattern(string $pattern): Schema
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxItems(): int
    {
        return $this->maxItems;
    }

    /**
     * @param int $maxItems
     *
     * @return Schema
     */
    public function setMaxItems(int $maxItems): Schema
    {
        $this->maxItems = $maxItems;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinItems(): int
    {
        return $this->minItems;
    }

    /**
     * @param int $minItems
     *
     * @return Schema
     */
    public function setMinItems(int $minItems): Schema
    {
        $this->minItems = $minItems;

        return $this;
    }

    /**
     * @return bool
     */
    public function isUniqueItems(): bool
    {
        return $this->uniqueItems;
    }

    /**
     * @param bool $uniqueItems
     *
     * @return Schema
     */
    public function setUniqueItems(bool $uniqueItems): Schema
    {
        $this->uniqueItems = $uniqueItems;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxProperties(): int
    {
        return $this->maxProperties;
    }

    /**
     * @param int $maxProperties
     *
     * @return Schema
     */
    public function setMaxProperties(int $maxProperties): Schema
    {
        $this->maxProperties = $maxProperties;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinProperties(): int
    {
        return $this->minProperties;
    }

    /**
     * @param int $minProperties
     *
     * @return Schema
     */
    public function setMinProperties(int $minProperties): Schema
    {
        $this->minProperties = $minProperties;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRequired(): array
    {
        return $this->required;
    }

    /**
     * @param string[] $required
     *
     * @return Schema
     */
    public function setRequired(array $required): Schema
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getEnum(): array
    {
        return $this->enum;
    }

    /**
     * @param string[] $enum
     *
     * @return Schema
     */
    public function setEnum(array $enum): Schema
    {
        $this->enum = $enum;

        return $this;
    }

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
     * @return Schema
     */
    public function setType(string $type): Schema
    {
        $this->type = $type;

        return $this;
    }
}
