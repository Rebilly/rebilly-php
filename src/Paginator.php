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

use Closure;
use Countable;
use Iterator;
use LogicException;
use OutOfBoundsException;

/**
 * @template T
 * @implements  Iterator<array-key, Collection<T>>
 */
final class Paginator implements Iterator, Countable
{
    public const DEFAULT_SIZE = 100;

    private int $limit;

    private int $offset;

    private ?int $total;

    /**
     * @param null|Collection<T> $currentSegment
     * @param Closure(?int,?int): Collection<T> $query
     */
    public function __construct(
        private ?Collection $currentSegment,
        private readonly Closure $query,
    ) {
        $this->limit = $this->currentSegment?->getLimit() ?? self::DEFAULT_SIZE;
        $this->offset = $this->currentSegment?->getOffset() ?? 0;
        $this->total = $this->currentSegment?->getTotalItems();
    }

    /**
     * @return Collection<T>
     */
    public function current(): mixed
    {
        if ($this->currentSegment === null) {
            if (!$this->valid()) {
                throw new OutOfBoundsException('Cannot load segment, invalid offset');
            }

            $this->load();
        }
        if ($this->currentSegment === null) {
            throw new LogicException();
        }

        return $this->currentSegment;
    }

    public function next(): void
    {
        $this->currentSegment = null;
        $this->offset += $this->limit;
    }

    public function previous(): void
    {
        $this->currentSegment = null;
        $this->offset -= $this->limit;
    }

    public function key(): int
    {
        return (int) ceil($this->offset / $this->limit);
    }

    public function valid(): bool
    {
        return $this->offset >= 0 && ($this->total === null || $this->offset <= $this->total);
    }

    public function rewind(): void
    {
        $this->currentSegment = null;
        $this->offset = 0;
    }

    public function count(): int
    {
        if ($this->total === null) {
            throw new LogicException('Lazy paginator has no segments loaded yet');
        }

        return (int) ceil($this->total / $this->limit);
    }

    public function isFirst(): bool
    {
        return $this->offset === 0;
    }

    public function isLast(): bool
    {
        return $this->total !== null && $this->offset + $this->limit >= $this->total;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    private function load(): void
    {
        $this->currentSegment = ($this->query)($this->limit, $this->offset);

        $this->total = $this->currentSegment->getTotalItems();
        $this->offset = $this->currentSegment->getOffset();
        $this->limit = $this->currentSegment->getLimit();
    }
}
