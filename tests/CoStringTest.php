<?php

declare(strict_types=1);

namespace Courage\Tests;

use Courage\CoInt\CoInteger;
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
            'subString' => [
                'startIndex' => 0,
                'endLength' => 2,
                'value' => '高田憂希',
                'result' => '高田',
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
            'subString' => [
                'startIndex' => 3,
                'endLength' => null,
                'value' => 'たかだゆうき',
                'result' => 'ゆうき',
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
            $comparedValue = $key !== 1
                ? new CoString($value['isEqual']['value'])
                : $value['isEqual']['value'];
            $this->assertSame(
                $value['isEqual']['result'],
                $this->coString->isEqual($comparedValue)
            );
        }
    }

    public function testConcat(): void
    {
        foreach ($this->testValue as $key => $value) {
            $concatValue = $key !== 1
                ? new CoString($value['concat']['value'])
                : $value['concat']['value'];
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
        $testValue = mb_strlen($this->coString->getRawValue());
        $this->assertSame(
            $this->coString->length(),
            $testValue
        );
    }

    public function testSubString(): void
    {
        foreach ($this->testValue as $key => $value) {
            $comparedValue = new CoString($value['subString']['value']);
            $this->assertSame(
                $value['subString']['result'],
                $comparedValue->subString(
                    $value['subString']['startIndex'],
                    $value['subString']['endLength']
                )->getRawValue()
            );
        }
    }

    public function testMakeRandomCoStr(): void
    {
        $randCoStr = CoString::makeRandomCoStr($this->randCoStrLength);
        $this->assertTrue(
            ctype_alnum($randCoStr->getRawValue())
        );
    }
}
