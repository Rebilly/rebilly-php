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

class EcoPayzTurkeyCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('paymentPageId', $data)) {
            $this->setPaymentPageId($data['paymentPageId']);
        }
        if (array_key_exists('merchantAccountNumber', $data)) {
            $this->setMerchantAccountNumber($data['merchantAccountNumber']);
        }
        if (array_key_exists('merchantPassword', $data)) {
            $this->setMerchantPassword($data['merchantPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPaymentPageId(): string
    {
        return $this->fields['paymentPageId'];
    }

    public function setPaymentPageId(string $paymentPageId): static
    {
        $this->fields['paymentPageId'] = $paymentPageId;

        return $this;
    }

    public function getMerchantAccountNumber(): string
    {
        return $this->fields['merchantAccountNumber'];
    }

    public function setMerchantAccountNumber(string $merchantAccountNumber): static
    {
        $this->fields['merchantAccountNumber'] = $merchantAccountNumber;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentPageId', $this->fields)) {
            $data['paymentPageId'] = $this->fields['paymentPageId'];
        }
        if (array_key_exists('merchantAccountNumber', $this->fields)) {
            $data['merchantAccountNumber'] = $this->fields['merchantAccountNumber'];
        }
        if (array_key_exists('merchantPassword', $this->fields)) {
            $data['merchantPassword'] = $this->fields['merchantPassword'];
        }

        return $data;
    }
}
