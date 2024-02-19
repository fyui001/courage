<?php

declare(strict_types=1);

namespace Courage;

class CoBoolean
{
    public const TRUE = true;
    public const FALSE = false;

    final public function __construct(
        readonly private bool $bool
    ) {
    }

    public function isTrue(): bool
    {
        return $this->bool;
    }

    public function isFalse(): bool
    {
        return !$this->isTrue();
    }

    public static function createTrue(): static
    {
        return new static(static::TRUE);
    }

    public static function createFalse(): static
    {
        return new static(static::FALSE);
    }

    public function getRawValue(): bool
    {
        return $this->bool;
    }
}
