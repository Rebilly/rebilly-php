<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Resource;

use ArrayIterator;
use ArrayAccess;
use Countable;
use Iterator;
use LogicException;
use IteratorAggregate;
use JsonSerializable;
use Serializable;

/**
 * Class Collection.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class Collection implements Serializable, JsonSerializable, IteratorAggregate, ArrayAccess, Countable
{
    /** @var Resource */
    private $prototype;

    /** @var Resource[] */
    private $items = [];

    public function __construct(Resource $prototype, $items = [])
    {
        $this->prototype = $prototype;

        if (!empty($items)) {
            $this->populate($items);
        }
    }

    /**
     * @param array $items
     */
    final public function populate(array $items)
    {
        $this->items = [];

        foreach ($items as $data) {
            $item = clone $this->prototype;
            $item->populate($data);
            $this->items[] = $item;
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return Iterator|Resource[]
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
    function jsonSerialize()
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
    final public function serialize()
    {
        return json_encode($this);
    }

    /**
     * {@inheritdoc}
     */
    final public function unserialize($serialized)
    {
        return json_decode($serialized, true);
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
}
