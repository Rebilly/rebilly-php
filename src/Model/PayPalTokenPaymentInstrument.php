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

class PayPalTokenPaymentInstrument implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('paypalMerchantId', $data)) {
            $this->setPaypalMerchantId($data['paypalMerchantId']);
        }
        if (array_key_exists('billingAgreementToken', $data)) {
            $this->setBillingAgreementToken($data['billingAgreementToken']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getBillingAgreementToken(): string
    {
        return $this->fields['billingAgreementToken'];
    }

    public function setBillingAgreementToken(string $billingAgreementToken): self
    {
        $this->fields['billingAgreementToken'] = $billingAgreementToken;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paypalMerchantId', $this->fields)) {
            $data['paypalMerchantId'] = $this->fields['paypalMerchantId'];
        }
        if (array_key_exists('billingAgreementToken', $this->fields)) {
            $data['billingAgreementToken'] = $this->fields['billingAgreementToken'];
        }

        return $data;
    }
}
