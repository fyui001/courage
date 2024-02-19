<?php

declare(strict_types=1);

namespace Courage\Tests\CoInt;

use Courage\CoInt\CoInteger;
use PHPUnit\Framework\TestCase;

class CoIntegerTest extends TestCase
{
    protected CoInteger $coInteger;
    protected array $testValue = [
        [
            'comparedValue' => 316,
            'isEqual' => true,
            'isGreaterOrEqualThan' => true,
            'isGreaterThan' => false,
            'isLessOrEqualThan' => true,
            'isLessThan' => false,
        ],
        [
            'comparedValue' => 3160,
            'isEqual' => false,
            'isGreaterOrEqualThan' => false,
            'isGreaterThan' => false,
            'isLessOrEqualThan' => true,
            'isLessThan' => true,
        ],
        [
            'comparedValue' => 100,
            'isEqual' => false,
            'isGreaterOrEqualThan' => true,
            'isGreaterThan' => true,
            'isLessOrEqualThan' => false,
            'isLessThan' => false,
        ]
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->coInteger = new CoInteger(316);
    }

    public function testIsNumberFormat(): void
    {
        $this->assertIsString($this->coInteger->isNumberFormat());
    }

    public function testToString(): void
    {
        $this->assertSame('316', "{$this->coInteger}");
    }

    public function testToInt(): void
    {
        $this->assertIsInt($this->coInteger->toInt());
    }

    public function testIsEqual(): void
    {
        foreach ($this->testValue as $key => $value) {
            $comparedValue = $key !== 2
                ? new CoInteger($value['comparedValue'])
                : $value['comparedValue'];
            $this->assertSame(
                $value['isEqual'],
                $this->coInteger->isEqual($comparedValue)
            );
        }
    }

    public function testIsGreaterOrEqualThan(): void
    {
        foreach ($this->testValue as $key => $value) {
            $comparedValue = $key !== 2
                ? new CoInteger($value['comparedValue'])
                : $value['comparedValue'];
            $this->assertSame(
                $value['isGreaterOrEqualThan'],
                $this->coInteger->isGreaterOrEqualThan($comparedValue)
            );
        }
    }

    public function testIsGreaterThan(): void
    {
        foreach ($this->testValue as $key => $value) {
            $comparedValue = $key !== 2
                ? new CoInteger($value['comparedValue'])
                : $value['comparedValue'];
            $this->assertSame(
                $value['isGreaterThan'],
                $this->coInteger->isGreaterThan($comparedValue)
            );
        }
    }

    public function testIsLessOrEqualThan(): void
    {
        foreach ($this->testValue as $key => $value) {
            $comparedValue = $key !== 2
                ? new CoInteger($value['comparedValue'])
                : $value['comparedValue'];
            $this->assertSame(
                $value['isLessOrEqualThan'],
                $this->coInteger->isLessOrEqualThan($comparedValue)
            );
        }
    }

    public function testIsLessThan(): void
    {
        foreach ($this->testValue as $key => $value) {
            $comparedValue = $key !== 2
                ? new CoInteger($value['comparedValue'])
                : $value['comparedValue'];
            $this->assertSame(
                $value['isLessThan'],
                $this->coInteger->isLessThan($comparedValue)
            );
        }
    }
}
