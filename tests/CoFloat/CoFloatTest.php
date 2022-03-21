<?php

declare(strict_types=1);

namespace Courage\Tests\CoFloat;

use Courage\CoFloat\CoFloat;
use PHPUnit\Framework\TestCase;

class CoFloatTest extends TestCase
{
    protected CoFloat $coFloat;

    public function setUp(): void
    {
        parent::setUp();
        $this->coFloat = new CoFloat(31.6);
    }

    public function testCeil(): void
    {
        $this->assertSame(
            32.0,
            $this->coFloat->ceil()->toFloat()
        );
    }

    public function testFloor(): void
    {
        $this->assertSame(
            31.0,
            $this->coFloat->floor()->toFloat()
        );
    }

    public function testRound(): void
    {
        $this->assertSame(
            32.0,
            $this->coFloat->round()->toFloat()
        );
    }
}
