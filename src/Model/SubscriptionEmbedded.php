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

class SubscriptionEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('recentInvoice', $data)) {
            $this->setRecentInvoice($data['recentInvoice']);
        }
        if (array_key_exists('initialInvoice', $data)) {
            $this->setInitialInvoice($data['initialInvoice']);
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
        if (array_key_exists('upcomingInvoice', $data)) {
            $this->setUpcomingInvoice($data['upcomingInvoice']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRecentInvoice(): ?Invoice
    {
        return $this->fields['recentInvoice'] ?? null;
    }

    public function setRecentInvoice(null|Invoice|array $recentInvoice): static
    {
        if ($recentInvoice !== null && !($recentInvoice instanceof Invoice)) {
            $recentInvoice = Invoice::from($recentInvoice);
        }

        $this->fields['recentInvoice'] = $recentInvoice;

        return $this;
    }

    public function getInitialInvoice(): ?Invoice
    {
        return $this->fields['initialInvoice'] ?? null;
    }

    public function setInitialInvoice(null|Invoice|array $initialInvoice): static
    {
        if ($initialInvoice !== null && !($initialInvoice instanceof Invoice)) {
            $initialInvoice = Invoice::from($initialInvoice);
        }

        $this->fields['initialInvoice'] = $initialInvoice;

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

    public function getLeadSource(): ?LeadSource
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|LeadSource|array $leadSource): static
    {
        if ($leadSource !== null && !($leadSource instanceof LeadSource)) {
            $leadSource = LeadSource::from($leadSource);
        }

        $this->fields['leadSource'] = $leadSource;

        return $this;
    }

    public function getShippingRate(): ?ShippingRate
    {
        return $this->fields['shippingRate'] ?? null;
    }

    public function setShippingRate(null|ShippingRate|array $shippingRate): static
    {
        if ($shippingRate !== null && !($shippingRate instanceof ShippingRate)) {
            $shippingRate = ShippingRate::from($shippingRate);
        }

        $this->fields['shippingRate'] = $shippingRate;

        return $this;
    }

    public function getPaymentInstrument(): ?PaymentInstrument
    {
        return $this->fields['paymentInstrument'] ?? null;
    }

    public function setPaymentInstrument(null|PaymentInstrument|array $paymentInstrument): static
    {
        if ($paymentInstrument !== null && !($paymentInstrument instanceof PaymentInstrument)) {
            $paymentInstrument = PaymentInstrumentFactory::from($paymentInstrument);
        }

        $this->fields['paymentInstrument'] = $paymentInstrument;

        return $this;
    }

    public function getUpcomingInvoice(): ?UpcomingInvoice
    {
        return $this->fields['upcomingInvoice'] ?? null;
    }

    public function setUpcomingInvoice(null|UpcomingInvoice|array $upcomingInvoice): static
    {
        if ($upcomingInvoice !== null && !($upcomingInvoice instanceof UpcomingInvoice)) {
            $upcomingInvoice = UpcomingInvoice::from($upcomingInvoice);
        }

        $this->fields['upcomingInvoice'] = $upcomingInvoice;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('recentInvoice', $this->fields)) {
            $data['recentInvoice'] = $this->fields['recentInvoice']?->jsonSerialize();
        }
        if (array_key_exists('initialInvoice', $this->fields)) {
            $data['initialInvoice'] = $this->fields['initialInvoice']?->jsonSerialize();
        }
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website']?->jsonSerialize();
        }
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource']?->jsonSerialize();
        }
        if (array_key_exists('shippingRate', $this->fields)) {
            $data['shippingRate'] = $this->fields['shippingRate']?->jsonSerialize();
        }
        if (array_key_exists('paymentInstrument', $this->fields)) {
            $data['paymentInstrument'] = $this->fields['paymentInstrument']?->jsonSerialize();
        }
        if (array_key_exists('upcomingInvoice', $this->fields)) {
            $data['upcomingInvoice'] = $this->fields['upcomingInvoice']?->jsonSerialize();
        }

        return $data;
    }
}
