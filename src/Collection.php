<?php

/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

namespace Rebilly\Sdk;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;
use LogicException;
use Traversable;

/**
 * @template T
 * @template-implements IteratorAggregate<array-key, T>
 * @template-implements ArrayAccess<array-key, T>
 */
class Collection implements JsonSerializable, IteratorAggregate, ArrayAccess, Countable
{
    public const HEADER_LIMIT = 'Pagination-Limit';

    public const HEADER_OFFSET = 'Pagination-Offset';

    public const HEADER_TOTAL = 'Pagination-Total';

    /**
     * @param array<T> $items
     * @param int $limit
     * @param int $offset
     * @param int $total
     */
    public function __construct(
        private array $items,
        private int $limit,
        private int $offset,
        private int $total,
    ) {
    }

    /**
     * @return Traversable<array-key, T>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function jsonSerialize(): array
    {
        return array_map(
            fn (JsonSerializable $item) => $item->jsonSerialize(),
            $this->items,
        );
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[$offset]);
    }

    /**
     * @return T
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset];
    }

    /**
     * @param T $value
     * @param mixed $offset
     */
    public function offsetSet($offset, $value): void
    {
        throw new LogicException();
    }

    public function offsetUnset($offset): void
    {
        throw new LogicException();
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getTotalItems(): int
    {
        return $this->total;
    }

    /**
     * @return T[]
     */
    public function toArray(): array
    {
        return $this->items;
    }
}
