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

class DepositRequestEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
        }
        if (array_key_exists('transaction', $data)) {
            $this->setTransaction($data['transaction']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomer(): ?object
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|object $customer): static
    {
        $this->fields['customer'] = $customer;

        return $this;
    }

    public function getWebsite(): ?object
    {
        return $this->fields['website'] ?? null;
    }

    public function setWebsite(null|object $website): static
    {
        $this->fields['website'] = $website;

        return $this;
    }

    public function getTransaction(): ?object
    {
        return $this->fields['transaction'] ?? null;
    }

    public function setTransaction(null|object $transaction): static
    {
        $this->fields['transaction'] = $transaction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer'];
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website'];
        }
        if (array_key_exists('transaction', $this->fields)) {
            $data['transaction'] = $this->fields['transaction'];
        }

        return $data;
    }
}
