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

class PaybiltCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('tokenId', $data)) {
            $this->setTokenId($data['tokenId']);
        }
        if (array_key_exists('tokenApiKey', $data)) {
            $this->setTokenApiKey($data['tokenApiKey']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getTokenId(): string
    {
        return $this->fields['tokenId'];
    }

    public function setTokenId(string $tokenId): static
    {
        $this->fields['tokenId'] = $tokenId;

        return $this;
    }

    public function getTokenApiKey(): string
    {
        return $this->fields['tokenApiKey'];
    }

    public function setTokenApiKey(string $tokenApiKey): static
    {
        $this->fields['tokenApiKey'] = $tokenApiKey;

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
        if (array_key_exists('tokenId', $this->fields)) {
            $data['tokenId'] = $this->fields['tokenId'];
        }
        if (array_key_exists('tokenApiKey', $this->fields)) {
            $data['tokenApiKey'] = $this->fields['tokenApiKey'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }

        return $data;
    }
}
