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

class QuoteChangeOrderInvoicePreview implements JsonSerializable
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

    public function getInitialAmounts(): ?QuoteChangeOrderInvoicePreviewInitialAmounts
    {
        return $this->fields['initialAmounts'] ?? null;
    }

    public function setInitialAmounts(null|QuoteChangeOrderInvoicePreviewInitialAmounts|array $initialAmounts): static
    {
        if ($initialAmounts !== null && !($initialAmounts instanceof QuoteChangeOrderInvoicePreviewInitialAmounts)) {
            $initialAmounts = QuoteChangeOrderInvoicePreviewInitialAmounts::from($initialAmounts);
        }

        $this->fields['initialAmounts'] = $initialAmounts;

        return $this;
    }

    public function getRecurringAmounts(): ?QuoteChangeOrderInvoicePreviewRecurringAmounts
    {
        return $this->fields['recurringAmounts'] ?? null;
    }

    public function setRecurringAmounts(null|QuoteChangeOrderInvoicePreviewRecurringAmounts|array $recurringAmounts): static
    {
        if ($recurringAmounts !== null && !($recurringAmounts instanceof QuoteChangeOrderInvoicePreviewRecurringAmounts)) {
            $recurringAmounts = QuoteChangeOrderInvoicePreviewRecurringAmounts::from($recurringAmounts);
        }

        $this->fields['recurringAmounts'] = $recurringAmounts;

        return $this;
    }

    /**
     * @return null|QuoteChangeOrderInvoicePreviewItems[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @param null|array[]|QuoteChangeOrderInvoicePreviewItems[] $items
     */
    public function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(
            fn ($value) => $value instanceof QuoteChangeOrderInvoicePreviewItems ? $value : QuoteChangeOrderInvoicePreviewItems::from($value),
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
                    static fn (QuoteChangeOrderInvoicePreviewItems $quoteChangeOrderInvoicePreviewItems) => $quoteChangeOrderInvoicePreviewItems->jsonSerialize(),
                    $this->fields['items'],
                )
                : null;
        }

        return $data;
    }
}
