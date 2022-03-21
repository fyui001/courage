<?php

declare(strict_types=1);

namespace Courage;

use Courage\CoInt\CoInteger;

class CoString
{
    protected string $value;

    const RANDOM_STR_CHAR_SET = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getRawValue(): string
    {
        return $this->value;
    }

    /**
     * Returns the result of an equivalence comparison with the CoString value passed.
     *
     * @param CoString $value
     * @return bool
     */
    public function isEqual(self $value): bool
    {
        return $this->value === $value->getRawValue();
    }

    /**
     * Concat specified value and return new CoString instance.
     *
     * @param CoString $value
     * @return $this
     */
    public function concat(self $value): self
    {
        return new static($this->value . $value->getRawValue());
    }

    /**
     * Returns whether or not the string is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->value === '';
    }

    /**
     *  Returns the length of string.
     *
     * @return CoInteger
     */
    public function length(): CoInteger
    {
        return new CoInteger(mb_strlen($this->value));
    }

    /**
     * Returns a substring that starts at the specified startIndex and continues to the end of the string.
     *
     * @param CoInteger $startIndex
     * @param CoInteger|null $endLength
     * @return $this
     */
    public function subString(CoInteger $startIndex, ?CoInteger $endLength = null): self
    {
        return new static(
            mb_substr($this->value, $startIndex->getRawValue(), $endLength->getRawValue())
        );
    }

    /**
     * Returns a CoString instance composed of a random string
     *
     * @param int $length
     * @return static
     */
    public static function makeRandomCoStr(int $length): self
    {
        return new static(self::makeRandStr($length, self::RANDOM_STR_CHAR_SET));
    }

    protected static function makeRandStr(int $length, string $charSet): string
    {
        $retStr = '';
        $randMax =  strlen($charSet) - 1;
        for ($i = 0; $i < $length; ++$i) {
            $retStr .= $charSet[rand(0, $randMax)];
        }
        return $retStr;
    }
}
