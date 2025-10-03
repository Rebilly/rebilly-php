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

class RecurringOrderEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('activationInvoice', $data)) {
            $this->setActivationInvoice($data['activationInvoice']);
        }
        if (array_key_exists('recentInvoice', $data)) {
            $this->setRecentInvoice($data['recentInvoice']);
        }
        if (array_key_exists('upcomingInvoice', $data)) {
            $this->setUpcomingInvoice($data['upcomingInvoice']);
        }
        if (array_key_exists('paymentInstrument', $data)) {
            $this->setPaymentInstrument($data['paymentInstrument']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
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

    public function getActivationInvoice(): ?Invoice
    {
        return $this->fields['activationInvoice'] ?? null;
    }

    public function setActivationInvoice(null|Invoice|array $activationInvoice): static
    {
        if ($activationInvoice !== null && !($activationInvoice instanceof Invoice)) {
            $activationInvoice = Invoice::from($activationInvoice);
        }

        $this->fields['activationInvoice'] = $activationInvoice;

        return $this;
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }
        if (array_key_exists('activationInvoice', $this->fields)) {
            $data['activationInvoice'] = $this->fields['activationInvoice']?->jsonSerialize();
        }
        if (array_key_exists('recentInvoice', $this->fields)) {
            $data['recentInvoice'] = $this->fields['recentInvoice']?->jsonSerialize();
        }
        if (array_key_exists('upcomingInvoice', $this->fields)) {
            $data['upcomingInvoice'] = $this->fields['upcomingInvoice']?->jsonSerialize();
        }
        if (array_key_exists('paymentInstrument', $this->fields)) {
            $data['paymentInstrument'] = $this->fields['paymentInstrument']?->jsonSerialize();
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website']?->jsonSerialize();
        }

        return $data;
    }
}
