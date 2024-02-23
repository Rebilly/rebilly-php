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

class QuoteCreateOrderEmbedded implements JsonSerializable
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
        if (array_key_exists('order', $data)) {
            $this->setOrder($data['order']);
        }
        if (array_key_exists('invoice', $data)) {
            $this->setInvoice($data['invoice']);
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

    public function getOrder(): ?object
    {
        return $this->fields['order'] ?? null;
    }

    public function setOrder(null|object $order): static
    {
        $this->fields['order'] = $order;

        return $this;
    }

    public function getInvoice(): ?object
    {
        return $this->fields['invoice'] ?? null;
    }

    public function setInvoice(null|object $invoice): static
    {
        $this->fields['invoice'] = $invoice;

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
        if (array_key_exists('order', $this->fields)) {
            $data['order'] = $this->fields['order'];
        }
        if (array_key_exists('invoice', $this->fields)) {
            $data['invoice'] = $this->fields['invoice'];
        }

        return $data;
    }
}
