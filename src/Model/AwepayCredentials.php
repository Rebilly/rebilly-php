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

class AwepayCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('sid', $data)) {
            $this->setSid($data['sid']);
        }
        if (array_key_exists('rcode', $data)) {
            $this->setRcode($data['rcode']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('privateKey', $data)) {
            $this->setPrivateKey($data['privateKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getSid(): string
    {
        return $this->fields['sid'];
    }

    public function setSid(string $sid): static
    {
        $this->fields['sid'] = $sid;

        return $this;
    }

    public function getRcode(): string
    {
        return $this->fields['rcode'];
    }

    public function setRcode(string $rcode): static
    {
        $this->fields['rcode'] = $rcode;

        return $this;
    }

    public function getSecretKey(): ?string
    {
        return $this->fields['secretKey'] ?? null;
    }

    public function setSecretKey(null|string $secretKey): static
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
    }

    public function getApiKey(): ?string
    {
        return $this->fields['apiKey'] ?? null;
    }

    public function setApiKey(null|string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

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

    public function getPrivateKey(): ?string
    {
        return $this->fields['privateKey'] ?? null;
    }

    public function setPrivateKey(null|string $privateKey): static
    {
        $this->fields['privateKey'] = $privateKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sid', $this->fields)) {
            $data['sid'] = $this->fields['sid'];
        }
        if (array_key_exists('rcode', $this->fields)) {
            $data['rcode'] = $this->fields['rcode'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('privateKey', $this->fields)) {
            $data['privateKey'] = $this->fields['privateKey'];
        }

        return $data;
    }
}
