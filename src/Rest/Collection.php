<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Rest;

use ArrayAccess;
use ArrayIterator;
use ArrayObject;
use Countable;
use Iterator;
use IteratorAggregate;
use JsonSerializable;
use LogicException;
use Rebilly\Rest\Resource as ApiResource;

/**
 * Class Collection
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class Collection implements JsonSerializable, IteratorAggregate, ArrayAccess, Countable
{
    /** @var ArrayObject */
    private $metadata;

    /** @var Resource */
    private $prototype;

    /** @var ApiResource[]|Entity[] */
    private $items = [];

    public function __construct(ApiResource $prototype, $items = [])
    {
        $this->metadata = new ArrayObject();

        $this->prototype = $prototype;

        if (!empty($items)) {
            $this->populate($items);
        }
    }

    /**
     * Clone private objects on entity clone.
     */
    public function __clone()
    {
        $this->metadata = clone $this->metadata;

        foreach ($this->items as $index => $item) {
            $this->items[$index] = clone $item;
        }
    }

    /**
     * @param array $data
     */
    final public function populate(array $data)
    {
        $this->items = [];

        if (isset($data['_metadata'])) {
            $this->metadata->exchangeArray($data['_metadata']);
            unset($data['_metadata']);
        }

        if (isset($data['data'])) {
            $data = $data['data'];
        }

        foreach ($data as $row) {
            $item = clone $this->prototype;
            $item->populate($row);
            $this->items[] = $item;
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return Iterator|ApiResource[]
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array_map(
            function (JsonSerializable $item) {
                return $item->jsonSerialize();
            },
            $this->items
        );
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        throw new LogicException();
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        throw new LogicException();
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    final protected function getMetadata($name)
    {
        return isset($this->metadata[$name]) ? $this->metadata[$name] : null;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->getMetadata('offset');
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->getMetadata('limit');
    }

    /**
     * @return int
     */
    public function getTotalItems()
    {
        return $this->getMetadata('total');
    }
}
