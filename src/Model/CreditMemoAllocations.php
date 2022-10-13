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
     * @param null|CreditMemoAllocationsTransactions[] $transactions
     */
    public function setTransactions(null|array $transactions): self
    {
        $transactions = $transactions !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CreditMemoAllocationsTransactions ? $value : CreditMemoAllocationsTransactions::from($value)) : null, $transactions) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = $this->fields['transactions'];
        }

        return $data;
    }
}
