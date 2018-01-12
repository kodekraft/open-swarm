<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Header
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Header
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $format;

    /**
     * @var Items
     */
    private $items;

    /**
     * @var string
     */
    private $collectionFormat;

    /**
     * @var string
     */
    private $default;

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
     * @var array
     */
    private $enum;

    /**
     * @var int
     */
    private $multipleOf;

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
     * @return Header
     */
    public function setDescription(string $description): Header
    {
        $this->description = $description;

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
     * @return Header
     */
    public function setType(string $type): Header
    {
        $this->type = $type;

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
     * @return Header
     */
    public function setFormat(string $format): Header
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     *
     * @return Header
     */
    public function setItems(array $items): Header
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return string
     */
    public function getCollectionFormat(): string
    {
        return $this->collectionFormat;
    }

    /**
     * @param string $collectionFormat
     *
     * @return Header
     */
    public function setCollectionFormat(string $collectionFormat): Header
    {
        $this->collectionFormat = $collectionFormat;

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
     * @return Header
     */
    public function setDefault(string $default): Header
    {
        $this->default = $default;

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
     * @return Header
     */
    public function setMaximum(int $maximum): Header
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
     * @return Header
     */
    public function setExclusiveMaximum(bool $exclusiveMaximum): Header
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
     * @return Header
     */
    public function setMinimum(int $minimum): Header
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
     * @return Header
     */
    public function setExclusiveMinimum(bool $exclusiveMinimum): Header
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
     * @return Header
     */
    public function setMaxLength(int $maxLength): Header
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
     * @return Header
     */
    public function setMinLength(int $minLength): Header
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
     * @return Header
     */
    public function setPattern(string $pattern): Header
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
     * @return Header
     */
    public function setMaxItems(int $maxItems): Header
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
     * @return Header
     */
    public function setMinItems(int $minItems): Header
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
     * @return Header
     */
    public function setUniqueItems(bool $uniqueItems): Header
    {
        $this->uniqueItems = $uniqueItems;

        return $this;
    }

    /**
     * @return array
     */
    public function getEnum(): array
    {
        return $this->enum;
    }

    /**
     * @param array $enum
     *
     * @return Header
     */
    public function setEnum(array $enum): Header
    {
        $this->enum = $enum;

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
     * @return Header
     */
    public function setMultipleOf(int $multipleOf): Header
    {
        $this->multipleOf = $multipleOf;

        return $this;
    }
}
