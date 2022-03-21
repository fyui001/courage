<?php

declare(strict_types=1);

namespace Courage\CoInt;

use Courage\Exceptions\InvalidArgumentException;

class CoPositiveInteger extends CoInteger
{
    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new InvalidArgumentException();
        }
        parent::__construct($value);
    }

    public static function makeZero(): self
    {
        return new static(0);
    }
}
