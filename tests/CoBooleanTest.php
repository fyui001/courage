<?php

declare(strict_types=1);

namespace Courage\Tests;

use Courage\CoBoolean;
use PHPUnit\Framework\TestCase;

class CoBooleanTest extends TestCase
{
    public function testIsTrue()
    {
        $coBoolean = new CoBoolean(true);
        $this->assertTrue($coBoolean->isTrue());

        $coBoolean = new CoBoolean(false);
        $this->assertFalse($coBoolean->isTrue());
    }

    public function testIsFalse()
    {
        $coBoolean = new CoBoolean(false);
        $this->assertTrue($coBoolean->isFalse());

        $coBoolean = new CoBoolean(true);
        $this->assertFalse($coBoolean->isFalse());
    }

    public function testCreateTrue()
    {
        $coBoolean = CoBoolean::createTrue();
        $this->assertSame(
            true,
            $coBoolean->getRawValue(),
        );
    }

    public function testCreateFalse()
    {
        $coBoolean = CoBoolean::createFalse();
        $this->assertSame(
            false,
            $coBoolean->getRawValue(),
        );
    }
}
