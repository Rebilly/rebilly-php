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

class ParamountEftCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchant_id', $data)) {
            $this->setMerchantId($data['merchant_id']);
        }
        if (array_key_exists('merchant_pass', $data)) {
            $this->setMerchantPass($data['merchant_pass']);
        }
        if (array_key_exists('payee', $data)) {
            $this->setPayee($data['payee']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantId(): string
    {
        return $this->fields['merchant_id'];
    }

    public function setMerchantId(string $merchantId): static
    {
        $this->fields['merchant_id'] = $merchantId;

        return $this;
    }

    public function getMerchantPass(): string
    {
        return $this->fields['merchant_pass'];
    }

    public function setMerchantPass(string $merchantPass): static
    {
        $this->fields['merchant_pass'] = $merchantPass;

        return $this;
    }

    public function getPayee(): string
    {
        return $this->fields['payee'];
    }

    public function setPayee(string $payee): static
    {
        $this->fields['payee'] = $payee;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchant_id', $this->fields)) {
            $data['merchant_id'] = $this->fields['merchant_id'];
        }
        if (array_key_exists('merchant_pass', $this->fields)) {
            $data['merchant_pass'] = $this->fields['merchant_pass'];
        }
        if (array_key_exists('payee', $this->fields)) {
            $data['payee'] = $this->fields['payee'];
        }

        return $data;
    }
}
