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

class KhelocardCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('referrer', $data)) {
            $this->setReferrer($data['referrer']);
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

    public function setMerchantId(string $merchantId): static
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getReferrer(): string
    {
        return $this->fields['referrer'];
    }

    public function setReferrer(string $referrer): static
    {
        $this->fields['referrer'] = $referrer;

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

    public function getApiSecret(): string
    {
        return $this->fields['apiSecret'];
    }

    public function setApiSecret(string $apiSecret): static
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
        if (array_key_exists('referrer', $this->fields)) {
            $data['referrer'] = $this->fields['referrer'];
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
