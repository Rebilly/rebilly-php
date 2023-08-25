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

class OneTimeOrderEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('recentInvoice', $data)) {
            $this->setRecentInvoice($data['recentInvoice']);
        }
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
        }
        if (array_key_exists('leadSource', $data)) {
            $this->setLeadSource($data['leadSource']);
        }
        if (array_key_exists('shippingRate', $data)) {
            $this->setShippingRate($data['shippingRate']);
        }
        if (array_key_exists('paymentInstrument', $data)) {
            $this->setPaymentInstrument($data['paymentInstrument']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRecentInvoice(): ?object
    {
        return $this->fields['recentInvoice'] ?? null;
    }

    public function setRecentInvoice(null|object $recentInvoice): static
    {
        $this->fields['recentInvoice'] = $recentInvoice;

        return $this;
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

    public function getLeadSource(): ?object
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|object $leadSource): static
    {
        $this->fields['leadSource'] = $leadSource;

        return $this;
    }

    public function getShippingRate(): ?object
    {
        return $this->fields['shippingRate'] ?? null;
    }

    public function setShippingRate(null|object $shippingRate): static
    {
        $this->fields['shippingRate'] = $shippingRate;

        return $this;
    }

    public function getPaymentInstrument(): ?object
    {
        return $this->fields['paymentInstrument'] ?? null;
    }

    public function setPaymentInstrument(null|object $paymentInstrument): static
    {
        $this->fields['paymentInstrument'] = $paymentInstrument;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('recentInvoice', $this->fields)) {
            $data['recentInvoice'] = $this->fields['recentInvoice'];
        }
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer'];
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website'];
        }
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource'];
        }
        if (array_key_exists('shippingRate', $this->fields)) {
            $data['shippingRate'] = $this->fields['shippingRate'];
        }
        if (array_key_exists('paymentInstrument', $this->fields)) {
            $data['paymentInstrument'] = $this->fields['paymentInstrument'];
        }

        return $data;
    }
}
