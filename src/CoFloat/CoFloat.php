<?php

declare(strict_types=1);

namespace Courage\CoFloat;

use Courage\CoNumeric;

class CoFloat extends CoNumeric
{
    public function __construct(float $value)
    {
        parent::__construct($value);
    }

    public function getRawValue(): float
    {
        return $this->value;
    }

    public function ceil(): self
    {
        return new static(ceil($this->value));
    }

    public function floor(): self
    {
        return new static(floor($this->value));
    }

    public function round(): self
    {
        return new static(round($this->value));
    }
}
