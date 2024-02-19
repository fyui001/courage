<?php

declare(strict_types=1);

namespace Courage;

use \ArrayIterator;
use Courage\CoInt\CoInteger;
use Courage\Exceptions\InvalidArgumentException;
use RuntimeException;

class CoList implements \ArrayAccess, \Countable, \IteratorAggregate
{
    protected array $value;

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    public function toArray(): array
    {
        return $this->value;
    }

    /**
     * Applies the callback to the elements.
     *
     * @param callable $callable
     * @return self
     */
    public function map(callable $callable): static
    {
        return new static(
            array_values(
                array_map($callable, $this->value)
            )
        );
    }

    public function filter(callable $closure): static
    {
        return new static(
            array_values(
                array_filter(
                    $this->value, $closure
                )
            )
        );
    }

    public function some(callable $closure): bool
    {
        return array_reduce($this->value, function ($callback, $item) use ($closure) {
            return $callback || $closure($item);
        }, false);
    }

    /**
     * Returns length of list.
     *
     * @return CoInteger
     */
    public function length(): int
    {
        return count($this->value);
    }

    /**
     * Returns length of list.
     *
     * @return int
     */
    public function count(): int
    {
        return $this->length();
    }

    /**
     * Whether a offset exists
     *
     * @param int|string $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->value[$offset]);
    }

    /**
     * Retrieve for value of offset
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (!isset($this->value[$offset])) {
            throw new InvalidArgumentException('Does not exist offset was specified.');
        }

        return $this->value[$offset];
    }

    /**
     * Offset to set
     *
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (
            is_null($offset) ||
            is_array($offset) ||
            $offset === ''
        ) {
            throw new RuntimeException('Invalid offset.');
        }

        $this->value[$offset] = $value;
    }

    /**
     * Offset to unset
     *
     * @param int|string $offset
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->value[$offset]);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->value);
    }
}
