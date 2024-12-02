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

class RiskScoreSimulationJobEmbedded implements JsonSerializable
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
     * @return null|Transaction[]
     */
    public function getTransactions(): ?array
    {
        return $this->fields['transactions'] ?? null;
    }

    /**
     * @param null|array[]|Transaction[] $transactions
     */
    public function setTransactions(null|array $transactions): static
    {
        $transactions = $transactions !== null ? array_map(
            fn ($value) => $value instanceof Transaction ? $value : Transaction::from($value),
            $transactions,
        ) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = $this->fields['transactions'] !== null
                ? array_map(
                    static fn (Transaction $transaction) => $transaction->jsonSerialize(),
                    $this->fields['transactions'],
                )
                : null;
        }

        return $data;
    }
}
