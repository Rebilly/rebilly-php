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

class PayeezyCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('merchantToken', $data)) {
            $this->setMerchantToken($data['merchantToken']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('apiSecret', $data)) {
            $this->setApiSecret($data['apiSecret']);
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

    public function setMerchantId(string $merchantId): self
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getMerchantToken(): string
    {
        return $this->fields['merchantToken'];
    }

    public function setMerchantToken(string $merchantToken): self
    {
        $this->fields['merchantToken'] = $merchantToken;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): self
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function getApiSecret(): string
    {
        return $this->fields['apiSecret'];
    }

    public function setApiSecret(string $apiSecret): self
    {
        $this->fields['apiSecret'] = $apiSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('merchantToken', $this->fields)) {
            $data['merchantToken'] = $this->fields['merchantToken'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('apiSecret', $this->fields)) {
            $data['apiSecret'] = $this->fields['apiSecret'];
        }

        return $data;
    }
}
