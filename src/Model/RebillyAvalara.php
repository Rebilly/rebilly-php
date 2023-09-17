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

class RebillyAvalara implements InvoiceTax, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCalculator(): string
    {
        return 'rebilly-avalara';
    }

    public function getAmount(): ?int
    {
        return $this->fields['amount'] ?? null;
    }

    /**
     * @return null|InvoiceTaxItem[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @param null|array[]|InvoiceTaxItem[] $items
     */
    public function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof InvoiceTaxItem ? $value : InvoiceTaxItem::from($value)) : null,
            $items,
        ) : null;

        $this->fields['items'] = $items;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'calculator' => 'rebilly-avalara',
        ];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }

        return $data;
    }

    private function setAmount(null|int $amount): static
    {
        $this->fields['amount'] = $amount;

        return $this;
    }
}
