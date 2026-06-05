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
use Rebilly\Sdk\Trait\HasMetadata;

class InvoiceCreditMemoAllocationResponse implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('invoiceId', $data)) {
            $this->setInvoiceId($data['invoiceId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('appliedCreditMemos', $data)) {
            $this->setAppliedCreditMemos($data['appliedCreditMemos']);
        }
        if (array_key_exists('remainingInvoiceAmount', $data)) {
            $this->setRemainingInvoiceAmount($data['remainingInvoiceAmount']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getInvoiceId(): string
    {
        return $this->fields['invoiceId'];
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    /**
     * @return InvoiceAppliedCreditMemoAllocation[]
     */
    public function getAppliedCreditMemos(): array
    {
        return $this->fields['appliedCreditMemos'];
    }

    public function getRemainingInvoiceAmount(): float
    {
        return $this->fields['remainingInvoiceAmount'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('invoiceId', $this->fields)) {
            $data['invoiceId'] = $this->fields['invoiceId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('appliedCreditMemos', $this->fields)) {
            $data['appliedCreditMemos'] = array_map(
                static fn (InvoiceAppliedCreditMemoAllocation $invoiceAppliedCreditMemoAllocation) => $invoiceAppliedCreditMemoAllocation->jsonSerialize(),
                $this->fields['appliedCreditMemos'],
            );
        }
        if (array_key_exists('remainingInvoiceAmount', $this->fields)) {
            $data['remainingInvoiceAmount'] = $this->fields['remainingInvoiceAmount'];
        }

        return $data;
    }

    private function setInvoiceId(string $invoiceId): static
    {
        $this->fields['invoiceId'] = $invoiceId;

        return $this;
    }

    private function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    /**
     * @param array[]|InvoiceAppliedCreditMemoAllocation[] $appliedCreditMemos
     */
    private function setAppliedCreditMemos(array $appliedCreditMemos): static
    {
        $appliedCreditMemos = array_map(
            fn ($value) => $value instanceof InvoiceAppliedCreditMemoAllocation ? $value : InvoiceAppliedCreditMemoAllocation::from($value),
            $appliedCreditMemos,
        );

        $this->fields['appliedCreditMemos'] = $appliedCreditMemos;

        return $this;
    }

    private function setRemainingInvoiceAmount(float|string $remainingInvoiceAmount): static
    {
        if (is_string($remainingInvoiceAmount)) {
            $remainingInvoiceAmount = (float) $remainingInvoiceAmount;
        }

        $this->fields['remainingInvoiceAmount'] = $remainingInvoiceAmount;

        return $this;
    }
}
