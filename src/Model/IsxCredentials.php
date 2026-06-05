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
use Rebilly\Sdk\Trait\HasMetadata;

class IsxCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('workflow', $data)) {
            $this->setWorkflow($data['workflow']);
        }
        if (array_key_exists('apiClient', $data)) {
            $this->setApiClient($data['apiClient']);
        }
        if (array_key_exists('apiToken', $data)) {
            $this->setApiToken($data['apiToken']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getWorkflow(): string
    {
        return $this->fields['workflow'];
    }

    public function setWorkflow(string $workflow): static
    {
        $this->fields['workflow'] = $workflow;

        return $this;
    }

    public function getApiClient(): string
    {
        return $this->fields['apiClient'];
    }

    public function setApiClient(string $apiClient): static
    {
        $this->fields['apiClient'] = $apiClient;

        return $this;
    }

    public function getApiToken(): string
    {
        return $this->fields['apiToken'];
    }

    public function setApiToken(string $apiToken): static
    {
        $this->fields['apiToken'] = $apiToken;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('workflow', $this->fields)) {
            $data['workflow'] = $this->fields['workflow'];
        }
        if (array_key_exists('apiClient', $this->fields)) {
            $data['apiClient'] = $this->fields['apiClient'];
        }
        if (array_key_exists('apiToken', $this->fields)) {
            $data['apiToken'] = $this->fields['apiToken'];
        }

        return $data;
    }
}
