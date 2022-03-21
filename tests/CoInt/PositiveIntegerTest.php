<?php

declare(strict_types=1);

namespace Courage\Tests\CoInt;

use Courage\CoInt\CoPositiveInteger;
use Courage\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PositiveIntegerTest extends TestCase
{
    public function testCoPositiveIntegerWithInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new CoPositiveInteger(-316);
    }

    public function testMakeZero(): void
    {
        $coPositiveInteger = CoPositiveInteger::makeZero();
        $this->assertSame(0, $coPositiveInteger->getRawValue());
    }
}
