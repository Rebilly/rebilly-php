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

class QuoteCreateOrderInvoicePreviewRecurringAmounts implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('subtotalAmount', $data)) {
            $this->setSubtotalAmount($data['subtotalAmount']);
        }
        if (array_key_exists('discountAmount', $data)) {
            $this->setDiscountAmount($data['discountAmount']);
        }
        if (array_key_exists('shippingAmount', $data)) {
            $this->setShippingAmount($data['shippingAmount']);
        }
        if (array_key_exists('taxAmount', $data)) {
            $this->setTaxAmount($data['taxAmount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getSubtotalAmount(): ?float
    {
        return $this->fields['subtotalAmount'] ?? null;
    }

    public function setSubtotalAmount(null|float|string $subtotalAmount): static
    {
        if (is_string($subtotalAmount)) {
            $subtotalAmount = (float) $subtotalAmount;
        }

        $this->fields['subtotalAmount'] = $subtotalAmount;

        return $this;
    }

    public function getDiscountAmount(): ?float
    {
        return $this->fields['discountAmount'] ?? null;
    }

    public function setDiscountAmount(null|float|string $discountAmount): static
    {
        if (is_string($discountAmount)) {
            $discountAmount = (float) $discountAmount;
        }

        $this->fields['discountAmount'] = $discountAmount;

        return $this;
    }

    public function getShippingAmount(): ?float
    {
        return $this->fields['shippingAmount'] ?? null;
    }

    public function setShippingAmount(null|float|string $shippingAmount): static
    {
        if (is_string($shippingAmount)) {
            $shippingAmount = (float) $shippingAmount;
        }

        $this->fields['shippingAmount'] = $shippingAmount;

        return $this;
    }

    public function getTaxAmount(): ?float
    {
        return $this->fields['taxAmount'] ?? null;
    }

    public function setTaxAmount(null|float|string $taxAmount): static
    {
        if (is_string($taxAmount)) {
            $taxAmount = (float) $taxAmount;
        }

        $this->fields['taxAmount'] = $taxAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('subtotalAmount', $this->fields)) {
            $data['subtotalAmount'] = $this->fields['subtotalAmount'];
        }
        if (array_key_exists('discountAmount', $this->fields)) {
            $data['discountAmount'] = $this->fields['discountAmount'];
        }
        if (array_key_exists('shippingAmount', $this->fields)) {
            $data['shippingAmount'] = $this->fields['shippingAmount'];
        }
        if (array_key_exists('taxAmount', $this->fields)) {
            $data['taxAmount'] = $this->fields['taxAmount'];
        }

        return $data;
    }
}
