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

class WorldpayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantCode', $data)) {
            $this->setMerchantCode($data['merchantCode']);
        }
        if (array_key_exists('merchantPassword', $data)) {
            $this->setMerchantPassword($data['merchantPassword']);
        }
        if (array_key_exists('payoutMerchantCode', $data)) {
            $this->setPayoutMerchantCode($data['payoutMerchantCode']);
        }
        if (array_key_exists('payoutMerchantPassword', $data)) {
            $this->setPayoutMerchantPassword($data['payoutMerchantPassword']);
        }
        if (array_key_exists('alternativePaymentsUsername', $data)) {
            $this->setAlternativePaymentsUsername($data['alternativePaymentsUsername']);
        }
        if (array_key_exists('alternativePaymentsPassword', $data)) {
            $this->setAlternativePaymentsPassword($data['alternativePaymentsPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantCode(): string
    {
        return $this->fields['merchantCode'];
    }

    public function setMerchantCode(string $merchantCode): static
    {
        $this->fields['merchantCode'] = $merchantCode;

        return $this;
    }

    public function getMerchantPassword(): string
    {
        return $this->fields['merchantPassword'];
    }

    public function setMerchantPassword(string $merchantPassword): static
    {
        $this->fields['merchantPassword'] = $merchantPassword;

        return $this;
    }

    public function getPayoutMerchantCode(): ?string
    {
        return $this->fields['payoutMerchantCode'] ?? null;
    }

    public function setPayoutMerchantCode(null|string $payoutMerchantCode): static
    {
        $this->fields['payoutMerchantCode'] = $payoutMerchantCode;

        return $this;
    }

    public function getPayoutMerchantPassword(): ?string
    {
        return $this->fields['payoutMerchantPassword'] ?? null;
    }

    public function setPayoutMerchantPassword(null|string $payoutMerchantPassword): static
    {
        $this->fields['payoutMerchantPassword'] = $payoutMerchantPassword;

        return $this;
    }

    public function getAlternativePaymentsUsername(): ?string
    {
        return $this->fields['alternativePaymentsUsername'] ?? null;
    }

    public function setAlternativePaymentsUsername(null|string $alternativePaymentsUsername): static
    {
        $this->fields['alternativePaymentsUsername'] = $alternativePaymentsUsername;

        return $this;
    }

    public function getAlternativePaymentsPassword(): ?string
    {
        return $this->fields['alternativePaymentsPassword'] ?? null;
    }

    public function setAlternativePaymentsPassword(null|string $alternativePaymentsPassword): static
    {
        $this->fields['alternativePaymentsPassword'] = $alternativePaymentsPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantCode', $this->fields)) {
            $data['merchantCode'] = $this->fields['merchantCode'];
        }
        if (array_key_exists('merchantPassword', $this->fields)) {
            $data['merchantPassword'] = $this->fields['merchantPassword'];
        }
        if (array_key_exists('payoutMerchantCode', $this->fields)) {
            $data['payoutMerchantCode'] = $this->fields['payoutMerchantCode'];
        }
        if (array_key_exists('payoutMerchantPassword', $this->fields)) {
            $data['payoutMerchantPassword'] = $this->fields['payoutMerchantPassword'];
        }
        if (array_key_exists('alternativePaymentsUsername', $this->fields)) {
            $data['alternativePaymentsUsername'] = $this->fields['alternativePaymentsUsername'];
        }
        if (array_key_exists('alternativePaymentsPassword', $this->fields)) {
            $data['alternativePaymentsPassword'] = $this->fields['alternativePaymentsPassword'];
        }

        return $data;
    }
}
