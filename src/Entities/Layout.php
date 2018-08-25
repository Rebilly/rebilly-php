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

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Layout
 *
 * ```json
 * {
 *   "id",
 *   "name",
 *   "items"
 * }
 * ```
 *
 */
final class Layout extends Entity
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return array|LayoutItem[]
     */
    public function getItems()
    {
        $items = $this->getAttribute('items') ?: [];

        foreach ($items as $i => $item) {
            $items[$i] = new LayoutItem($item);
        }

        return $items;
    }

    /**
     * @param array|LayoutItem[] $values
     *
     * @return $this
     */
    public function setItems($values)
    {
        $this->setAttribute('items', []);

        foreach ($values as $value) {
            $this->addItem($value);
        }

        return $this;
    }

    /**
     * @param array|LayoutItem $value
     *
     * @throws DomainException
     *
     * @return $this
     */
    public function addItem($value)
    {
        if ($value instanceof LayoutItem) {
            $value = $value->jsonSerialize();
        } elseif (!is_array($value)) {
            throw new DomainException('Invalid layout item');
        }

        $items = $this->getAttribute('items') ?: [];
        $items[] = $value;

        return $this->setAttribute('items', $items);
    }
}
