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

class Manual extends InvoiceTax
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'calculator' => 'manual',
        ] + $data);

        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return InvoiceTaxItem[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param InvoiceTaxItem[] $items
     */
    public function setItems(array $items): self
    {
        $items = array_map(fn ($value) => $value !== null ? ($value instanceof InvoiceTaxItem ? $value : InvoiceTaxItem::from($value)) : null, $items);

        $this->fields['items'] = $items;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }

        return parent::jsonSerialize() + $data;
    }
}
