<?php

declare(strict_types=1);

namespace Courage;

abstract class CoNumeric
{
    /** @var int|float $value */
    protected $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    public function getRawValue()
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    /**
     * Convert to integer
     *
     * @return int
     */
    public function toInt(): int
    {
        return (int)$this->value;
    }

    /**
     * Convert to float
     *
     * @return float
     */
    public function toFloat(): float
    {
        return (float)$this->value;
    }

    /**
     * Returns the result of an equivalence comparison with the CoNumeric value passed.
     *
     * @param CoNumeric $value
     * @return bool
     */
    public function isEqual(self $value): bool
    {
        return $this->value === $value->getRawValue();
    }

    /**
     * Greater than or equal to the CoNumeric value passed.
     *
     * @param CoNumeric $value
     * @return bool
     */
    public function isGreaterOrEqualThan(self $value): bool
    {
        return $this->value >= $value->getRawValue();
    }

    /**
     * Greater than to the CoNumeric value passed.
     *
     * @param CoNumeric $value
     * @return bool
     */
    public function isGreaterThan(self $value): bool
    {
        return $this->value > $value->getRawValue();
    }

    /**
     * Less than or equal to the CoNumeric value passed.
     *
     * @param CoNumeric $value
     * @return bool
     */
    public function isLessOrEqualThan(self $value): bool
    {
        return $this->value <= $value->getRawValue();
    }

    /**
     * Less than to the CoNumeric value passed.
     *
     * @param CoNumeric $value
     * @return bool
     */
    public function isLessThan(self $value): bool
    {
        return $this->value < $value->getRawValue();
    }
}
