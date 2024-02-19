<?php

declare(strict_types=1);

namespace Courage\CoFloat;

use Courage\Exceptions\InvalidArgumentException;

class CoPositiveFloat extends CoFloat
{
    public function __construct(float $value)
    {
        if ($value < 0.0) {
            throw new InvalidArgumentException();
        }
        parent::__construct($value);
    }

    public static function makeZero(): static
    {
        return new static(0.0);
    }
}
