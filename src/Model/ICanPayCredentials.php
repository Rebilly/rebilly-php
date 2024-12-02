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

class ICanPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('authenticateId', $data)) {
            $this->setAuthenticateId($data['authenticateId']);
        }
        if (array_key_exists('authenticatePw', $data)) {
            $this->setAuthenticatePw($data['authenticatePw']);
        }
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAuthenticateId(): string
    {
        return $this->fields['authenticateId'];
    }

    public function setAuthenticateId(string $authenticateId): static
    {
        $this->fields['authenticateId'] = $authenticateId;

        return $this;
    }

    public function getAuthenticatePw(): string
    {
        return $this->fields['authenticatePw'];
    }

    public function setAuthenticatePw(string $authenticatePw): static
    {
        $this->fields['authenticatePw'] = $authenticatePw;

        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->fields['publicKey'];
    }

    public function setPublicKey(string $publicKey): static
    {
        $this->fields['publicKey'] = $publicKey;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('authenticateId', $this->fields)) {
            $data['authenticateId'] = $this->fields['authenticateId'];
        }
        if (array_key_exists('authenticatePw', $this->fields)) {
            $data['authenticatePw'] = $this->fields['authenticatePw'];
        }
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }

        return $data;
    }
}
