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

class PagsmileCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('appId', $data)) {
            $this->setAppId($data['appId']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        if (array_key_exists('apiSecretKey', $data)) {
            $this->setApiSecretKey($data['apiSecretKey']);
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

    public function getAppId(): string
    {
        return $this->fields['appId'];
    }

    public function setAppId(string $appId): static
    {
        $this->fields['appId'] = $appId;

        return $this;
    }

    public function getSecretKey(): string
    {
        return $this->fields['secretKey'];
    }

    public function setSecretKey(string $secretKey): static
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
    }

    public function getApiSecretKey(): ?string
    {
        return $this->fields['apiSecretKey'] ?? null;
    }

    public function setApiSecretKey(null|string $apiSecretKey): static
    {
        $this->fields['apiSecretKey'] = $apiSecretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('appId', $this->fields)) {
            $data['appId'] = $this->fields['appId'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }
        if (array_key_exists('apiSecretKey', $this->fields)) {
            $data['apiSecretKey'] = $this->fields['apiSecretKey'];
        }

        return $data;
    }
}
