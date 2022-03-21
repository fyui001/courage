<?php

declare(strict_types=1);

namespace Courage\CoInt;

use Courage\CoNumeric;

class CoInteger extends CoNumeric
{
    public function __construct(int $value)
    {
        parent::__construct($value);
    }

    public function isNumberFormat(): string
    {
        return number_format($this->value);
    }
}
