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

class BalanceTransactionEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transaction', $data)) {
            $this->setTransaction($data['transaction']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTransaction(): ?BalanceTransaction
    {
        return $this->fields['transaction'] ?? null;
    }

    public function setTransaction(null|BalanceTransaction|array $transaction): self
    {
        if ($transaction !== null && !($transaction instanceof \Rebilly\Sdk\Model\BalanceTransaction)) {
            $transaction = \Rebilly\Sdk\Model\BalanceTransaction::from($transaction);
        }

        $this->fields['transaction'] = $transaction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transaction', $this->fields)) {
            $data['transaction'] = $this->fields['transaction']?->jsonSerialize();
        }

        return $data;
    }
}
