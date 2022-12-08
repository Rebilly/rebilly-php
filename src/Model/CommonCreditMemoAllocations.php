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

class CommonCreditMemoAllocations implements JsonSerializable
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
     * @return null|CommonCreditMemoAllocationsTransactions[]
     */
    public function getTransactions(): ?array
    {
        return $this->fields['transactions'] ?? null;
    }

    /**
     * @param null|CommonCreditMemoAllocationsTransactions[] $transactions
     */
    public function setTransactions(null|array $transactions): self
    {
        $transactions = $transactions !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CommonCreditMemoAllocationsTransactions ? $value : CommonCreditMemoAllocationsTransactions::from($value)) : null, $transactions) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    /**
     * @return null|CommonCreditMemoAllocationsInvoices[]
     */
    public function getInvoices(): ?array
    {
        return $this->fields['invoices'] ?? null;
    }

    /**
     * @param null|CommonCreditMemoAllocationsInvoices[] $invoices
     */
    public function setInvoices(null|array $invoices): self
    {
        $invoices = $invoices !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CommonCreditMemoAllocationsInvoices ? $value : CommonCreditMemoAllocationsInvoices::from($value)) : null, $invoices) : null;

        $this->fields['invoices'] = $invoices;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = $this->fields['transactions'];
        }
        if (array_key_exists('invoices', $this->fields)) {
            $data['invoices'] = $this->fields['invoices'];
        }

        return $data;
    }
}
