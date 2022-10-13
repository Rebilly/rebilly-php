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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class PayPalBillingAgreementFeature implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('paypalMerchantId', $data)) {
            $this->setPaypalMerchantId($data['paypalMerchantId']);
        }
        if (array_key_exists('paypalClientId', $data)) {
            $this->setPaypalClientId($data['paypalClientId']);
        }
        if (array_key_exists('billingAgreementToken', $data)) {
            $this->setBillingAgreementToken($data['billingAgreementToken']);
        }
        if (array_key_exists('expirationTime', $data)) {
            $this->setExpirationTime($data['expirationTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): PayPalBillingAgreementFeatureName
    {
        return $this->fields['name'];
    }

    public function setName(PayPalBillingAgreementFeatureName|string $name): self
    {
        if (!($name instanceof PayPalBillingAgreementFeatureName)) {
            $name = PayPalBillingAgreementFeatureName::from($name);
        }

        $this->fields['name'] = $name;

        return $this;
    }

    public function getPaypalMerchantId(): string
    {
        return $this->fields['paypalMerchantId'];
    }

    public function setPaypalMerchantId(string $paypalMerchantId): self
    {
        $this->fields['paypalMerchantId'] = $paypalMerchantId;

        return $this;
    }

    public function getPaypalClientId(): string
    {
        return $this->fields['paypalClientId'];
    }

    public function setPaypalClientId(string $paypalClientId): self
    {
        $this->fields['paypalClientId'] = $paypalClientId;

        return $this;
    }

    public function getBillingAgreementToken(): string
    {
        return $this->fields['billingAgreementToken'];
    }

    public function setBillingAgreementToken(string $billingAgreementToken): self
    {
        $this->fields['billingAgreementToken'] = $billingAgreementToken;

        return $this;
    }

    public function getExpirationTime(): DateTimeImmutable
    {
        return $this->fields['expirationTime'];
    }

    public function setExpirationTime(DateTimeImmutable|string $expirationTime): self
    {
        if (!($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name']?->value;
        }
        if (array_key_exists('paypalMerchantId', $this->fields)) {
            $data['paypalMerchantId'] = $this->fields['paypalMerchantId'];
        }
        if (array_key_exists('paypalClientId', $this->fields)) {
            $data['paypalClientId'] = $this->fields['paypalClientId'];
        }
        if (array_key_exists('billingAgreementToken', $this->fields)) {
            $data['billingAgreementToken'] = $this->fields['billingAgreementToken'];
        }
        if (array_key_exists('expirationTime', $this->fields)) {
            $data['expirationTime'] = $this->fields['expirationTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
