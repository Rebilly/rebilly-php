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

class SubscriptionSummaryMetrics implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('invoicedAmount', $data)) {
            $this->setInvoicedAmount($data['invoicedAmount']);
        }
        if (array_key_exists('collectedAmount', $data)) {
            $this->setCollectedAmount($data['collectedAmount']);
        }
        if (array_key_exists('invoiceCount', $data)) {
            $this->setInvoiceCount($data['invoiceCount']);
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

    public function getInvoicedAmount(): ?float
    {
        return $this->fields['invoicedAmount'] ?? null;
    }

    public function getCollectedAmount(): ?float
    {
        return $this->fields['collectedAmount'] ?? null;
    }

    public function getInvoiceCount(): ?int
    {
        return $this->fields['invoiceCount'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('invoicedAmount', $this->fields)) {
            $data['invoicedAmount'] = $this->fields['invoicedAmount'];
        }
        if (array_key_exists('collectedAmount', $this->fields)) {
            $data['collectedAmount'] = $this->fields['collectedAmount'];
        }
        if (array_key_exists('invoiceCount', $this->fields)) {
            $data['invoiceCount'] = $this->fields['invoiceCount'];
        }

        return $data;
    }

    private function setCurrency(null|string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    private function setInvoicedAmount(null|float|string $invoicedAmount): self
    {
        if (is_string($invoicedAmount)) {
            $invoicedAmount = (float) $invoicedAmount;
        }

        $this->fields['invoicedAmount'] = $invoicedAmount;

        return $this;
    }

    private function setCollectedAmount(null|float|string $collectedAmount): self
    {
        if (is_string($collectedAmount)) {
            $collectedAmount = (float) $collectedAmount;
        }

        $this->fields['collectedAmount'] = $collectedAmount;

        return $this;
    }

    private function setInvoiceCount(null|int $invoiceCount): self
    {
        $this->fields['invoiceCount'] = $invoiceCount;

        return $this;
    }
}
