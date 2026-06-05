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

class WebsiteSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('depositForm', $data)) {
            $this->setDepositForm($data['depositForm']);
        }
        if (array_key_exists('paymentForm', $data)) {
            $this->setPaymentForm($data['paymentForm']);
        }
        if (array_key_exists('amplitude', $data)) {
            $this->setAmplitude($data['amplitude']);
        }
        if (array_key_exists('payoutRequest', $data)) {
            $this->setPayoutRequest($data['payoutRequest']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getAmplitude(): ?WebsiteSettingsAmplitude
    {
        return $this->fields['amplitude'] ?? null;
    }

    public function setAmplitude(null|WebsiteSettingsAmplitude|array $amplitude): static
    {
        if ($amplitude !== null && !($amplitude instanceof WebsiteSettingsAmplitude)) {
            $amplitude = WebsiteSettingsAmplitude::from($amplitude);
        }

        $this->fields['amplitude'] = $amplitude;

        return $this;
    }

    public function getPayoutRequest(): ?WebsiteSettingsPayoutRequest
    {
        return $this->fields['payoutRequest'] ?? null;
    }

    public function setPayoutRequest(null|WebsiteSettingsPayoutRequest|array $payoutRequest): static
    {
        if ($payoutRequest !== null && !($payoutRequest instanceof WebsiteSettingsPayoutRequest)) {
            $payoutRequest = WebsiteSettingsPayoutRequest::from($payoutRequest);
        }

        $this->fields['payoutRequest'] = $payoutRequest;

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
        if (array_key_exists('amplitude', $this->fields)) {
            $data['amplitude'] = $this->fields['amplitude']?->jsonSerialize();
        }
        if (array_key_exists('payoutRequest', $this->fields)) {
            $data['payoutRequest'] = $this->fields['payoutRequest']?->jsonSerialize();
        }

        return $data;
    }
}
