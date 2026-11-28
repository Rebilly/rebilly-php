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

class BoomFiCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('orgId', $data)) {
            $this->setOrgId($data['orgId']);
        }
        if (array_key_exists('webhookPublicKey', $data)) {
            $this->setWebhookPublicKey($data['webhookPublicKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getOrgId(): string
    {
        return $this->fields['orgId'];
    }

    public function setOrgId(string $orgId): static
    {
        $this->fields['orgId'] = $orgId;

        return $this;
    }

    public function getWebhookPublicKey(): string
    {
        return $this->fields['webhookPublicKey'];
    }

    public function setWebhookPublicKey(string $webhookPublicKey): static
    {
        $this->fields['webhookPublicKey'] = $webhookPublicKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('orgId', $this->fields)) {
            $data['orgId'] = $this->fields['orgId'];
        }
        if (array_key_exists('webhookPublicKey', $this->fields)) {
            $data['webhookPublicKey'] = $this->fields['webhookPublicKey'];
        }

        return $data;
    }
}
