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

class FinraxCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('businessId', $data)) {
            $this->setBusinessId($data['businessId']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('apiSecret', $data)) {
            $this->setApiSecret($data['apiSecret']);
        }
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getBusinessId(): string
    {
        return $this->fields['businessId'];
    }

    public function setBusinessId(string $businessId): static
    {
        $this->fields['businessId'] = $businessId;

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

    public function getPublicKey(): ?string
    {
        return $this->fields['publicKey'] ?? null;
    }

    public function setPublicKey(null|string $publicKey): static
    {
        $this->fields['publicKey'] = $publicKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('businessId', $this->fields)) {
            $data['businessId'] = $this->fields['businessId'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('apiSecret', $this->fields)) {
            $data['apiSecret'] = $this->fields['apiSecret'];
        }
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }

        return $data;
    }
}
