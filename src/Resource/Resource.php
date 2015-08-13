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

use ArrayAccess;
use ArrayObject;
use JsonSerializable;
use Serializable;
use InvalidArgumentException;
use RuntimeException;

/**
 * Class Resource.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
abstract class Resource implements Serializable, JsonSerializable, ArrayAccess
{
    /** @var ArrayObject */
    private $data;

    /** @var ArrayObject */
    private $embeddedData;

    /** @var ArrayObject */
    private $links;

    /**
     * Create new entity.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = new ArrayObject();
        $this->embeddedData = new ArrayObject();
        $this->links = new ArrayObject();

        if (!empty($data)) {
            $this->populate($data);
        }
    }

    /**
     * Clone private objects on entity clone.
     */
    public function __clone()
    {
        $this->data = clone $this->data;
        $this->embeddedData = clone $this->embeddedData;
        $this->links = clone $this->links;
    }

    /**
     * {@inheritdoc}
     */
    public function __get($name)
    {
        if (method_exists($this, 'get' . $name)) {
            return call_user_func([$this, 'get' . $name]);
        }

        if (method_exists($this, 'set' . $name)) {
            throw new RuntimeException(sprintf('Trying to set the read-only property "%"', $name));
        } else {
            throw new InvalidArgumentException(sprintf('The property "%" does not exist', $name));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function __set($name, $value)
    {
        if (method_exists($this, 'set' . $name)) {
            return call_user_func([$this, 'set' . $name], $value);
        }

        if (method_exists($this, 'get' . $name)) {
            throw new RuntimeException(sprintf('Trying to get the write-only property "%"', $name));
        } else {
            throw new InvalidArgumentException(sprintf('The property "%" does not exist', $name));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function __isset($name)
    {
        return method_exists($this, 'get' . $name) || method_exists($this, 'set' . $name);
    }

    /**
     * {@inheritdoc}
     */
    public function __unset($name)
    {
        $this->__set($name, null);
    }

    /**
     * @param array $data
     */
    final public function populate(array $data)
    {
        if (isset($data['_embedded'])) {
            $this->embeddedData->exchangeArray($data['_embedded']);
            unset($data['_embedded']);
        }

        if (isset($data['_links'])) {
            foreach ($data['_links'] as $link) {
                $this->links[$link['rel']] = $link['href'];
            }

            unset($data['_links']);
        }

        $this->data->exchangeArray($data);
    }

    /**
     * {@inheritdoc}
     */
    final public function jsonSerialize()
    {
        return $this->data->getArrayCopy();
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
     * @param string $name
     *
     * @return mixed
     */
    final protected function getAttribute($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    final protected function setAttribute($name, $value)
    {
        $this->data[$name] = $value;
        return $this;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    final protected function hasEmbeddedResource($name)
    {
        return isset($this->embeddedData[$name]);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    final protected function getEmbeddedResource($name)
    {
        return isset($this->embeddedData[$name]) ? $this->embeddedData[$name] : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    final protected function setEmbeddedResource($name, $value)
    {
        $this->embeddedData[$name] = $value;
        return $this;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    final protected function getLink($name)
    {
        return isset($this->links[$name]) ? $this->links[$name] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
