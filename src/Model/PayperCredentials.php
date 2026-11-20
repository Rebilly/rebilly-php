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

class PayperCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        if (array_key_exists('tokenId', $data)) {
            $this->setTokenId($data['tokenId']);
        }
        if (array_key_exists('tokenApiKey', $data)) {
            $this->setTokenApiKey($data['tokenApiKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getTokenId(): ?string
    {
        return $this->fields['tokenId'] ?? null;
    }

    public function setTokenId(null|string $tokenId): static
    {
        $this->fields['tokenId'] = $tokenId;

        return $this;
    }

    public function getTokenApiKey(): ?string
    {
        return $this->fields['tokenApiKey'] ?? null;
    }

    public function setTokenApiKey(null|string $tokenApiKey): static
    {
        $this->fields['tokenApiKey'] = $tokenApiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }
        if (array_key_exists('tokenId', $this->fields)) {
            $data['tokenId'] = $this->fields['tokenId'];
        }
        if (array_key_exists('tokenApiKey', $this->fields)) {
            $data['tokenApiKey'] = $this->fields['tokenApiKey'];
        }

        return $data;
    }
}
