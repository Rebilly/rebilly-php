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

class PaymentCardEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('authTransaction', $data)) {
            $this->setAuthTransaction($data['authTransaction']);
        }
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAuthTransaction(): null|object|array
    {
        return $this->fields['authTransaction'] ?? null;
    }

    public function setAuthTransaction(null|object|array $authTransaction): static
    {
        $this->fields['authTransaction'] = $authTransaction;

        return $this;
    }

    public function getCustomer(): null|object|array
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|object|array $customer): static
    {
        $this->fields['customer'] = $customer;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('authTransaction', $this->fields)) {
            $data['authTransaction'] = $this->fields['authTransaction'];
        }
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer'];
        }

        return $data;
    }
}
