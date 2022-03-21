<?php

declare(strict_types=1);

namespace Courage\Tests;

use Courage\CoString;
use PHPUnit\Framework\TestCase;

class CoStringTest extends TestCase
{
    protected CoString $coString;

    protected int $randCoStrLength = 316;

    protected array $testValue = [
        [
            'isEqual' => [
                'value'=> '高田憂希',
                'result' => true,
            ],
            'concat' => [
                'value' => 'はかわいい',
                'result' => '高田憂希はかわいい',
            ],
            'isEmpty' => [
                'value' => '高田憂希',
                'result' => false,
            ],
        ],
        [
            'isEqual' => [
                'value'=> 'たかだゆうき',
                'result' => false,
            ],
            'concat' => [
                'value' => '',
                'result' => '高田憂希',
            ],
            'isEmpty' => [
                'value' => '',
                'result' => true,
            ],
        ],
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->coString = new CoString('高田憂希');
    }

    public function testToString(): void
    {
        $this->assertSame('高田憂希', (string)$this->coString);
    }

    public function testIsEqual(): void
    {
        foreach ($this->testValue as $key => $value) {
            $comparedValue = new CoString($value['isEqual']['value']);
            $this->assertSame(
                $value['isEqual']['result'],
                $this->coString->isEqual($comparedValue)
            );
        }
    }

    public function testConcat(): void
    {
        foreach ($this->testValue as $key => $value) {
            $concatValue = new CoString($value['concat']['value']);
            $this->assertTrue(
              $this->coString
                  ->concat($concatValue)
                  ->isEqual(new CoString($value['concat']['result']))
            );
        }
    }

    public function testIsEmpty(): void
    {
        foreach ($this->testValue as $key => $value) {
            $comparedValue = new CoString($value['isEmpty']['value']);
            $this->assertSame(
                $value['isEmpty']['result'],
                $comparedValue->isEmpty()
            );
        }
    }

    public function testLength(): void
    {
        $this->assertSame(
            $this->coString->length(),
            mb_strlen($this->coString->getRawValue())
        );
    }

    public function testMakeRandomCoStr(): void
    {
        $randCoStr = CoString::makeRandomCoStr($this->randCoStrLength);
        $this->assertTrue(
            ctype_alnum($randCoStr->getRawValue())
        );
    }
}
