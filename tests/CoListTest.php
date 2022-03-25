<?php

declare(strict_types=1);

namespace Courage\Tests;

use Courage\CoList;
use Courage\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CoListTest extends TestCase
{
    protected CoList $coList;

    public function setUp(): void
    {
        parent::setUp();

        $this->coList = new CoList([
            '高田憂希',
            '松井恵理子',
            '桑原由気',
        ]);
    }

    public function testToArray(): void
    {
        $this->assertIsArray($this->coList->toArray());
    }

    public function testMap(): void
    {
        $mappedArr = $this->coList->map(fn(string $value) => $value)->toArray();

        $this->assertSame(
            ['高田憂希', '松井恵理子', '桑原由気'],
            $mappedArr
        );
    }

    public function testLength(): void
    {
        $this->assertSame(3, $this->coList->length()->toInt());
    }

    public function testCount(): void
    {
        $this->assertSame(3, $this->coList->count());
    }

    public function testOffsetExists(): void
    {
        $this->assertTrue(isset($this->coList[0]));
        $this->assertFalse(isset($this->coList[316]));
    }

    public function testOffsetGet(): void
    {
        $this->assertSame('桑原由気', $this->coList[2]);
        $this->expectException(InvalidArgumentException::class);
        $this->coList[316];
    }

    public function testOffsetSet(): void
    {
        $value = 'たかだゆうき';
        $offset = 'takada-yuki';

        $this->coList[$offset] = $value;
        $this->assertSame($value, $this->coList[$offset]);

        $this->expectException(\RuntimeException::class);
        $this->coList[''] = $value;
    }

    public function testOffsetUnset(): void
    {
        $testArr = new CoList($this->coList->toArray());
        unset($testArr[0]);
        $this->assertNotSame($testArr, $this->coList);
    }

    public function testGetIterator(): void
    {
        $testArr = $this->coList->toArray();
        foreach ($this->coList as $key => $value) {
            $this->assertSame($testArr[$key], $value);
        }
    }
}