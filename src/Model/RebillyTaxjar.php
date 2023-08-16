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

class RebillyTaxjar extends InvoiceTax
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'calculator' => 'rebilly-taxjar',
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
     * @return null|InvoiceTaxItem[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }

        return parent::jsonSerialize() + $data;
    }

    /**
     * @param null|InvoiceTaxItem[] $items
     */
    private function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof InvoiceTaxItem ? $value : InvoiceTaxItem::from($value)) : null, $items) : null;

        $this->fields['items'] = $items;

        return $this;
    }
}
