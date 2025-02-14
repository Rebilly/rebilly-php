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

class CreditMemoAllocations implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transactions', $data)) {
            $this->setTransactions($data['transactions']);
        }
        if (array_key_exists('invoices', $data)) {
            $this->setInvoices($data['invoices']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|CreditMemoAllocationsTransactions[]
     */
    public function getTransactions(): ?array
    {
        return $this->fields['transactions'] ?? null;
    }

    /**
     * @param null|array[]|CreditMemoAllocationsTransactions[] $transactions
     */
    public function setTransactions(null|array $transactions): static
    {
        $transactions = $transactions !== null ? array_map(
            fn ($value) => $value instanceof CreditMemoAllocationsTransactions ? $value : CreditMemoAllocationsTransactions::from($value),
            $transactions,
        ) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    /**
     * @return null|CreditMemoInvoiceAllocation[]
     */
    public function getInvoices(): ?array
    {
        return $this->fields['invoices'] ?? null;
    }

    /**
     * @param null|array[]|CreditMemoInvoiceAllocation[] $invoices
     */
    public function setInvoices(null|array $invoices): static
    {
        $invoices = $invoices !== null ? array_map(
            fn ($value) => $value instanceof CreditMemoInvoiceAllocation ? $value : CreditMemoInvoiceAllocation::from($value),
            $invoices,
        ) : null;

        $this->fields['invoices'] = $invoices;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = $this->fields['transactions'] !== null
                ? array_map(
                    static fn (CreditMemoAllocationsTransactions $creditMemoAllocationsTransactions) => $creditMemoAllocationsTransactions->jsonSerialize(),
                    $this->fields['transactions'],
                )
                : null;
        }
        if (array_key_exists('invoices', $this->fields)) {
            $data['invoices'] = $this->fields['invoices'] !== null
                ? array_map(
                    static fn (CreditMemoInvoiceAllocation $creditMemoInvoiceAllocation) => $creditMemoInvoiceAllocation->jsonSerialize(),
                    $this->fields['invoices'],
                )
                : null;
        }

        return $data;
    }
}
