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

class DisputeEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transaction', $data)) {
            $this->setTransaction($data['transaction']);
        }
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTransaction(): ?Transaction
    {
        return $this->fields['transaction'] ?? null;
    }

    public function setTransaction(null|Transaction|array $transaction): static
    {
        if ($transaction !== null && !($transaction instanceof Transaction)) {
            $transaction = Transaction::from($transaction);
        }

        $this->fields['transaction'] = $transaction;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|Customer|array $customer): static
    {
        if ($customer !== null && !($customer instanceof Customer)) {
            $customer = Customer::from($customer);
        }

        $this->fields['customer'] = $customer;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transaction', $this->fields)) {
            $data['transaction'] = $this->fields['transaction']?->jsonSerialize();
        }
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }

        return $data;
    }
}
