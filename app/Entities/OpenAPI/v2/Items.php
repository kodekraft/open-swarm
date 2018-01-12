<?php

namespace KodeKraft\OpenSwarm\Entities\OpenAPI\v2;

/**
 * Class Items
 *
 * @package KodeKraft\OpenSwarm\Entities\OpenAPI\v2
 */
class Items
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $format;

    /**
     * @var array
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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Items
     */
    public function setType(string $type): Items
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
     * @return Items
     */
    public function setFormat(string $format): Items
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
     * @return Items
     */
    public function setItems(array $items): Items
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
     * @return Items
     */
    public function setCollectionFormat(string $collectionFormat): Items
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
     * @return Items
     */
    public function setDefault(string $default): Items
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
     * @return Items
     */
    public function setMaximum(int $maximum): Items
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
     * @return Items
     */
    public function setExclusiveMaximum(bool $exclusiveMaximum): Items
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
     * @return Items
     */
    public function setMinimum(int $minimum): Items
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
     * @return Items
     */
    public function setExclusiveMinimum(bool $exclusiveMinimum): Items
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
     * @return Items
     */
    public function setMaxLength(int $maxLength): Items
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
     * @return Items
     */
    public function setMinLength(int $minLength): Items
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
     * @return Items
     */
    public function setPattern(string $pattern): Items
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
     * @return Items
     */
    public function setMaxItems(int $maxItems): Items
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
     * @return Items
     */
    public function setMinItems(int $minItems): Items
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
     * @return Items
     */
    public function setUniqueItems(bool $uniqueItems): Items
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
     * @return Items
     */
    public function setEnum(array $enum): Items
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
     * @return Items
     */
    public function setMultipleOf(int $multipleOf): Items
    {
        $this->multipleOf = $multipleOf;

        return $this;
    }
}
