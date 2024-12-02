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

class WebsiteSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('depositForm', $data)) {
            $this->setDepositForm($data['depositForm']);
        }
        if (array_key_exists('paymentForm', $data)) {
            $this->setPaymentForm($data['paymentForm']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDepositForm(): ?WebsiteSettingsDepositForm
    {
        return $this->fields['depositForm'] ?? null;
    }

    public function setDepositForm(null|WebsiteSettingsDepositForm|array $depositForm): static
    {
        if ($depositForm !== null && !($depositForm instanceof WebsiteSettingsDepositForm)) {
            $depositForm = WebsiteSettingsDepositForm::from($depositForm);
        }

        $this->fields['depositForm'] = $depositForm;

        return $this;
    }

    public function getPaymentForm(): ?WebsiteSettingsPaymentForm
    {
        return $this->fields['paymentForm'] ?? null;
    }

    public function setPaymentForm(null|WebsiteSettingsPaymentForm|array $paymentForm): static
    {
        if ($paymentForm !== null && !($paymentForm instanceof WebsiteSettingsPaymentForm)) {
            $paymentForm = WebsiteSettingsPaymentForm::from($paymentForm);
        }

        $this->fields['paymentForm'] = $paymentForm;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('depositForm', $this->fields)) {
            $data['depositForm'] = $this->fields['depositForm']?->jsonSerialize();
        }
        if (array_key_exists('paymentForm', $this->fields)) {
            $data['paymentForm'] = $this->fields['paymentForm']?->jsonSerialize();
        }

        return $data;
    }
}
