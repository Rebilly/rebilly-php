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

    public function getRecentInvoice(): null|object|array
    {
        return $this->fields['recentInvoice'] ?? null;
    }

    public function setRecentInvoice(null|object|array $recentInvoice): static
    {
        $this->fields['recentInvoice'] = $recentInvoice;

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

    public function getWebsite(): null|object|array
    {
        return $this->fields['website'] ?? null;
    }

    public function setWebsite(null|object|array $website): static
    {
        $this->fields['website'] = $website;

        return $this;
    }

    public function getLeadSource(): null|object|array
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|object|array $leadSource): static
    {
        $this->fields['leadSource'] = $leadSource;

        return $this;
    }

    public function getShippingRate(): null|object|array
    {
        return $this->fields['shippingRate'] ?? null;
    }

    public function setShippingRate(null|object|array $shippingRate): static
    {
        $this->fields['shippingRate'] = $shippingRate;

        return $this;
    }

    public function getPaymentInstrument(): null|object|array
    {
        return $this->fields['paymentInstrument'] ?? null;
    }

    public function setPaymentInstrument(null|object|array $paymentInstrument): static
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
