<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly;

use ArrayObject;
use Countable;
use Iterator;
use RuntimeException;
use OutOfBoundsException;

/**
 * Class Paginator.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Paginator implements Iterator, Countable
{
    const DEFAULT_SIZE = 100;

    /** @var Client */
    private $client;

    /** @var string */
    private $uri;

    /** @var array */
    private $params = [];

    /** @var int */
    private $limit = self::DEFAULT_SIZE;

    /** @var int */
    private $offset = 0;

    /** @var int */
    private $totalItems;

    /** @var Rest\Collection */
    private $currentSegment;

    /**
     * @param Client $client
     * @param string $uri
     * @param array|ArrayObject $params
     */
    public function __construct(Client $client, $uri, $params = [])
    {
        $this->client = $client;
        $this->uri = $uri;
        $this->params = (array) $params + ['limit' => $this->limit, 'offset' => $this->offset];

        if ($this->params['offset'] % $this->params['limit'] !== 0) {
            throw new RuntimeException('Not relevant segment offset and limit');
        }

        $this->load($this->params);
    }

    /**
     * @param array $params
     */
    private function load(array $params)
    {
        $this->currentSegment = $this->client->get($this->uri, $params);

        $this->totalItems = $this->currentSegment->getTotalItems();
        $this->offset = $this->currentSegment->getOffset();
        $this->limit = $this->currentSegment->getLimit();
    }

    /**
     * {@inheritdoc}
     *
     * @return Rest\Collection
     */
    public function current()
    {
        if ($this->currentSegment === null) {
            if (!$this->valid()) {
                throw new OutOfBoundsException('Cannot load segment, invalid offset');
            }

            $this->load(['offset' => $this->offset] + $this->params);
        }

        return $this->currentSegment;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->currentSegment = null;
        $this->offset += $this->limit;
    }

    /**
     * Move backward to previous page.
     */
    public function previous()
    {
        $this->currentSegment = null;
        $this->offset -= $this->limit;
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return (int) ceil($this->offset / $this->limit);
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->offset >= 0 && $this->offset <= $this->totalItems;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->currentSegment = null;
        $this->offset = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return (int) ceil($this->totalItems / $this->limit);
    }

    /**
     * @return bool
     */
    public function isFirst()
    {
        return $this->offset === 0;
    }

    /**
     * @return bool
     */
    public function isLast()
    {
        return $this->offset + $this->limit >= $this->totalItems;
    }

    /**
     * @return int
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }
}
