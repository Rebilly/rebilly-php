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

class PayPalAccountEmbedded implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('authTransaction', $data)) {
            $this->setAuthTransaction($data['authTransaction']);
        }
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAuthTransaction(): ?Transaction
    {
        return $this->fields['authTransaction'] ?? null;
    }

    public function setAuthTransaction(null|Transaction|array $authTransaction): static
    {
        if ($authTransaction !== null && !($authTransaction instanceof Transaction)) {
            $authTransaction = Transaction::from($authTransaction);
        }

        $this->fields['authTransaction'] = $authTransaction;

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
        if (array_key_exists('authTransaction', $this->fields)) {
            $data['authTransaction'] = $this->fields['authTransaction']?->jsonSerialize();
        }
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }

        return $data;
    }
}
