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

namespace Rebilly\Rest;

use ArrayAccess;
use ArrayObject;
use DomainException;
use JsonSerializable;
use OutOfRangeException;

/**
 * Class Resource
 *
 */
abstract class Resource implements JsonSerializable, ArrayAccess
{
    /** @var ArrayObject */
    private $metadata;

    /** @var ArrayObject */
    private $data;

    /** @var ArrayObject */
    private $internalCache;

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
        $this->metadata = new ArrayObject();
        $this->data = new ArrayObject();
        $this->internalCache = new ArrayObject();
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
        $this->metadata = clone $this->metadata;
        $this->data = clone $this->data;
        $this->internalCache = clone $this->internalCache;
        $this->embeddedData = clone $this->embeddedData;
        $this->links = clone $this->links;
    }

    /**
     * @param array $data
     */
    final public function populate(array $data)
    {
        if (isset($data['_metadata'])) {
            $this->metadata->exchangeArray($data['_metadata']);
            unset($data['_metadata']);
        }

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

        foreach ($data as $key => $value) {
            if ($this->hasAttribute($key)) {
                $this->setAttribute($key, $value);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    final public function jsonSerialize()
    {
        return $this->data->getArrayCopy();
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    final public function getLink($name)
    {
        return isset($this->links[$name]) ? $this->links[$name] : null;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    final protected function hasAttribute($name)
    {
        return method_exists($this, 'get' . $name) || method_exists($this, 'set' . $name);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    final protected function getAttribute($name)
    {
        if (isset($this->internalCache[$name])) {
            return $this->internalCache[$name];
        }
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }

        return null;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    final protected function setAttribute($name, $value)
    {
        if ($value !== null && $this->hasAttributeValueFactory($name)) {
            $this->internalCache[$name] = $this->createAttributeValue($name, $value);

            if ($this->internalCache[$name] instanceof JsonSerializable) {
                $value = $this->internalCache[$name]->jsonSerialize();
            } elseif (is_array($this->internalCache[$name])) {
                $value = array_map(
                    function ($value) {
                        if ($value instanceof JsonSerializable) {
                            $value = $value->jsonSerialize();
                        }

                        return $value;
                    },
                    $this->internalCache[$name]
                );
            } else {
                $value = $this->internalCache[$name];
            }
        }

        $this->data[$name] = $value;

        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return JsonSerializable
     */
    private function createAttributeValue($name, $value)
    {
        $factory = "create{$name}";

        if ($value instanceof JsonSerializable) {
            $value = $value->jsonSerialize();
        }

        $value = $this->{$factory}($value);

        if (!($value instanceof JsonSerializable || is_array($value))) {
            throw new DomainException('Invalid value factory');
        }

        return $value;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    private function hasAttributeValueFactory($name)
    {
        return method_exists($this, "create{$name}");
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
        return $this->hasEmbeddedResource($name) ? $this->embeddedData[$name] : null;
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
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->hasAttribute($offset) && $this->getAttribute($offset) !== null;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        if (method_exists($this, 'get' . $offset)) {
            return call_user_func([$this, 'get' . $offset]);
        }

        if (method_exists($this, 'set' . $offset)) {
            throw new DomainException(
                sprintf('Trying to get the write-only property "%s::%s"', get_class($this), $offset)
            );
        }

        throw new OutOfRangeException(
                sprintf('The property "%s::%s" does not exist', get_class($this), $offset)
            );
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        if (method_exists($this, 'set' . $offset)) {
            return call_user_func([$this, 'set' . $offset], $value);
        }

        if (method_exists($this, 'get' . $offset)) {
            throw new DomainException(
                sprintf('Trying to set the read-only property "%s::%s"', get_class($this), $offset)
            );
        }

        throw new OutOfRangeException(
                sprintf('The property "%s::%s" does not exist', get_class($this), $offset)
            );
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        $this->offsetSet($offset, null);
    }
}
