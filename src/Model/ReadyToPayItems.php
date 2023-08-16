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

namespace Rebilly\Sdk\Model;

use JsonSerializable;

class ReadyToPayItems implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return ReadyToPayItemsItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param ReadyToPayItemsItems[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(fn ($value) => $value !== null ? ($value instanceof ReadyToPayItemsItems ? $value : ReadyToPayItemsItems::from($value)) : null, $items);

        $this->fields['items'] = $items;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }

        return $data;
    }
}
