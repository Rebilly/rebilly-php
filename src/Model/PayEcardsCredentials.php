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

class PayEcardsCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('clientKey', $data)) {
            $this->setClientKey($data['clientKey']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('paymentUrl', $data)) {
            $this->setPaymentUrl($data['paymentUrl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getClientKey(): string
    {
        return $this->fields['clientKey'];
    }

    public function setClientKey(string $clientKey): static
    {
        $this->fields['clientKey'] = $clientKey;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): static
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getPaymentUrl(): string
    {
        return $this->fields['paymentUrl'];
    }

    public function setPaymentUrl(string $paymentUrl): static
    {
        $this->fields['paymentUrl'] = $paymentUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('clientKey', $this->fields)) {
            $data['clientKey'] = $this->fields['clientKey'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('paymentUrl', $this->fields)) {
            $data['paymentUrl'] = $this->fields['paymentUrl'];
        }

        return $data;
    }
}
