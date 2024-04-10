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

class QuoteTrialConversionOrderEmbedded implements JsonSerializable
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

    public function getWebsite(): ?Website
    {
        return $this->fields['website'] ?? null;
    }

    public function setWebsite(null|Website|array $website): static
    {
        if ($website !== null && !($website instanceof Website)) {
            $website = Website::from($website);
        }

        $this->fields['website'] = $website;

        return $this;
    }

    public function getOrder(): ?SubscriptionOrOneTimeSale
    {
        return $this->fields['order'] ?? null;
    }

    public function setOrder(null|SubscriptionOrOneTimeSale|array $order): static
    {
        if ($order !== null && !($order instanceof SubscriptionOrOneTimeSale)) {
            $order = SubscriptionOrOneTimeSaleFactory::from($order);
        }

        $this->fields['order'] = $order;

        return $this;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->fields['invoice'] ?? null;
    }

    public function setInvoice(null|Invoice|array $invoice): static
    {
        if ($invoice !== null && !($invoice instanceof Invoice)) {
            $invoice = Invoice::from($invoice);
        }

        $this->fields['invoice'] = $invoice;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website']?->jsonSerialize();
        }
        if (array_key_exists('order', $this->fields)) {
            $data['order'] = $this->fields['order']?->jsonSerialize();
        }
        if (array_key_exists('invoice', $this->fields)) {
            $data['invoice'] = $this->fields['invoice']?->jsonSerialize();
        }

        return $data;
    }
}
