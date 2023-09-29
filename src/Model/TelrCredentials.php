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

class TelrCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('storeId', $data)) {
            $this->setStoreId($data['storeId']);
        }
        if (array_key_exists('hostedPageAuthenticationKey', $data)) {
            $this->setHostedPageAuthenticationKey($data['hostedPageAuthenticationKey']);
        }
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('serviceApiKey', $data)) {
            $this->setServiceApiKey($data['serviceApiKey']);
        }
        if (array_key_exists('remoteApiKey', $data)) {
            $this->setRemoteApiKey($data['remoteApiKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStoreId(): string
    {
        return $this->fields['storeId'];
    }

    public function setStoreId(string $storeId): static
    {
        $this->fields['storeId'] = $storeId;

        return $this;
    }

    public function getHostedPageAuthenticationKey(): string
    {
        return $this->fields['hostedPageAuthenticationKey'];
    }

    public function setHostedPageAuthenticationKey(string $hostedPageAuthenticationKey): static
    {
        $this->fields['hostedPageAuthenticationKey'] = $hostedPageAuthenticationKey;

        return $this;
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

    public function getServiceApiKey(): string
    {
        return $this->fields['serviceApiKey'];
    }

    public function setServiceApiKey(string $serviceApiKey): static
    {
        $this->fields['serviceApiKey'] = $serviceApiKey;

        return $this;
    }

    public function getRemoteApiKey(): ?string
    {
        return $this->fields['remoteApiKey'] ?? null;
    }

    public function setRemoteApiKey(null|string $remoteApiKey): static
    {
        $this->fields['remoteApiKey'] = $remoteApiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('storeId', $this->fields)) {
            $data['storeId'] = $this->fields['storeId'];
        }
        if (array_key_exists('hostedPageAuthenticationKey', $this->fields)) {
            $data['hostedPageAuthenticationKey'] = $this->fields['hostedPageAuthenticationKey'];
        }
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('serviceApiKey', $this->fields)) {
            $data['serviceApiKey'] = $this->fields['serviceApiKey'];
        }
        if (array_key_exists('remoteApiKey', $this->fields)) {
            $data['remoteApiKey'] = $this->fields['remoteApiKey'];
        }

        return $data;
    }
}
