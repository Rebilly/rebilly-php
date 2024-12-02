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

class IngenicoCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('apiKeyId', $data)) {
            $this->setApiKeyId($data['apiKeyId']);
        }
        if (array_key_exists('apiSecretKey', $data)) {
            $this->setApiSecretKey($data['apiSecretKey']);
        }
        if (array_key_exists('skipFraudService', $data)) {
            $this->setSkipFraudService($data['skipFraudService']);
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

    public function getApiKeyId(): string
    {
        return $this->fields['apiKeyId'];
    }

    public function setApiKeyId(string $apiKeyId): static
    {
        $this->fields['apiKeyId'] = $apiKeyId;

        return $this;
    }

    public function getApiSecretKey(): string
    {
        return $this->fields['apiSecretKey'];
    }

    public function setApiSecretKey(string $apiSecretKey): static
    {
        $this->fields['apiSecretKey'] = $apiSecretKey;

        return $this;
    }

    public function getSkipFraudService(): ?bool
    {
        return $this->fields['skipFraudService'] ?? null;
    }

    public function setSkipFraudService(null|bool $skipFraudService): static
    {
        $this->fields['skipFraudService'] = $skipFraudService;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('apiKeyId', $this->fields)) {
            $data['apiKeyId'] = $this->fields['apiKeyId'];
        }
        if (array_key_exists('apiSecretKey', $this->fields)) {
            $data['apiSecretKey'] = $this->fields['apiSecretKey'];
        }
        if (array_key_exists('skipFraudService', $this->fields)) {
            $data['skipFraudService'] = $this->fields['skipFraudService'];
        }

        return $data;
    }
}
