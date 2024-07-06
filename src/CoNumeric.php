<?php

declare(strict_types=1);

namespace Courage;

abstract class CoNumeric
{
    protected int|float $value;

    protected function __construct(int|float$value)
    {
        $this->value = $value;
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
     * @param CoNumeric|int|float $value
     * @return bool
     */
    public function isEqual(self|int|float $value): bool
    {
        if ($value instanceof self) {
            return $this->value === $value->getRawValue();
        }

        return $this->value === $value;
    }

    /**
     * Greater than or equal to the CoNumeric value passed.
     *
     * @param CoNumeric|int|float $value
     * @return bool
     */
    public function isGreaterOrEqualThan(self|int|float $value): bool
    {
        if ($value instanceof self) {
            return $this->value >= $value->getRawValue();
        }

        return $this->value >= $value;
    }

    /**
     * Greater than to the CoNumeric value passed.
     *
     * @param CoNumeric|int|float $value
     * @return bool
     */
    public function isGreaterThan(self|int|float $value): bool
    {
        if ($value instanceof self) {
            return $this->value > $value->getRawValue();
        }

        return $this->value > $value;
    }

    /**
     * Less than or equal to the CoNumeric value passed.
     *
     * @param CoNumeric|int|float $value
     * @return bool
     */
    public function isLessOrEqualThan(self|int|float $value): bool
    {
        if ($value instanceof self) {
            return $this->value <= $value->getRawValue();
        }

        return $this->value <= $value;
    }

    /**
     * Less than to the CoNumeric value passed.
     *
     * @param CoNumeric|int|float $value
     * @return bool
     */
    public function isLessThan(self|int|float $value): bool
    {
        if ($value instanceof self) {
            return $this->value < $value->getRawValue();
        }

        return $this->value < $value;
    }
}
