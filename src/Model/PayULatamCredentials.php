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

class PayULatamCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('accountId', $data)) {
            $this->setAccountId($data['accountId']);
        }
        if (array_key_exists('apiLogin', $data)) {
            $this->setApiLogin($data['apiLogin']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantId(): string
    {
        return $this->fields['merchantId'];
    }

    public function setMerchantId(string $merchantId): static
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getAccountId(): string
    {
        return $this->fields['accountId'];
    }

    public function setAccountId(string $accountId): static
    {
        $this->fields['accountId'] = $accountId;

        return $this;
    }

    public function getApiLogin(): string
    {
        return $this->fields['apiLogin'];
    }

    public function setApiLogin(string $apiLogin): static
    {
        $this->fields['apiLogin'] = $apiLogin;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('accountId', $this->fields)) {
            $data['accountId'] = $this->fields['accountId'];
        }
        if (array_key_exists('apiLogin', $this->fields)) {
            $data['apiLogin'] = $this->fields['apiLogin'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }

        return $data;
    }
}
