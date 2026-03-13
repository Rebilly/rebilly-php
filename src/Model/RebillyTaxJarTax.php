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

use Rebilly\Sdk\Trait\HasMetadata;

class RebillyTaxJarTax implements Taxes
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCalculator(): string
    {
        return 'rebilly-taxjar';
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    /**
     * @return null|TaxItem[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @param null|array[]|TaxItem[] $items
     */
    public function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(
            fn ($value) => $value instanceof TaxItem ? $value : TaxItem::from($value),
            $items,
        ) : null;

        $this->fields['items'] = $items;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'calculator' => 'rebilly-taxjar',
        ];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'] !== null
                ? array_map(
                    static fn (TaxItem $taxItem) => $taxItem->jsonSerialize(),
                    $this->fields['items'],
                )
                : null;
        }

        return $data;
    }

    private function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }
}
