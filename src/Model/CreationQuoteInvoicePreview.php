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

class CreationQuoteInvoicePreview implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('initialAmounts', $data)) {
            $this->setInitialAmounts($data['initialAmounts']);
        }
        if (array_key_exists('recurringAmounts', $data)) {
            $this->setRecurringAmounts($data['recurringAmounts']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getInitialAmounts(): ?CreationQuoteInvoicePreviewInitialAmounts
    {
        return $this->fields['initialAmounts'] ?? null;
    }

    public function setInitialAmounts(null|CreationQuoteInvoicePreviewInitialAmounts|array $initialAmounts): static
    {
        if ($initialAmounts !== null && !($initialAmounts instanceof CreationQuoteInvoicePreviewInitialAmounts)) {
            $initialAmounts = CreationQuoteInvoicePreviewInitialAmounts::from($initialAmounts);
        }

        $this->fields['initialAmounts'] = $initialAmounts;

        return $this;
    }

    public function getRecurringAmounts(): ?CreationQuoteInvoicePreviewRecurringAmounts
    {
        return $this->fields['recurringAmounts'] ?? null;
    }

    public function setRecurringAmounts(null|CreationQuoteInvoicePreviewRecurringAmounts|array $recurringAmounts): static
    {
        if ($recurringAmounts !== null && !($recurringAmounts instanceof CreationQuoteInvoicePreviewRecurringAmounts)) {
            $recurringAmounts = CreationQuoteInvoicePreviewRecurringAmounts::from($recurringAmounts);
        }

        $this->fields['recurringAmounts'] = $recurringAmounts;

        return $this;
    }

    /**
     * @return null|CreationQuoteInvoicePreviewItems[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @param null|array[]|CreationQuoteInvoicePreviewItems[] $items
     */
    public function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(
            fn ($value) => $value instanceof CreationQuoteInvoicePreviewItems ? $value : CreationQuoteInvoicePreviewItems::from($value),
            $items,
        ) : null;

        $this->fields['items'] = $items;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('initialAmounts', $this->fields)) {
            $data['initialAmounts'] = $this->fields['initialAmounts']?->jsonSerialize();
        }
        if (array_key_exists('recurringAmounts', $this->fields)) {
            $data['recurringAmounts'] = $this->fields['recurringAmounts']?->jsonSerialize();
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'] !== null
                ? array_map(
                    static fn (CreationQuoteInvoicePreviewItems $creationQuoteInvoicePreviewItems) => $creationQuoteInvoicePreviewItems->jsonSerialize(),
                    $this->fields['items'],
                )
                : null;
        }

        return $data;
    }
}
