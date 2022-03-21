<?php

declare(strict_types=1);

namespace Courage\Tests\CoFloat;

use Courage\CoFloat\CoPositiveFloat;
use Courage\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CoPositiveFloatTest extends TestCase
{
    public function testCoPositiveFloatWithInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new CoPositiveFloat(-31.6);
    }

    public function testMakeZero(): void
    {
        $coPositiveFloat = CoPositiveFloat::makeZero();
        $this->assertSame(0.0, $coPositiveFloat->getRawValue());
    }
}
