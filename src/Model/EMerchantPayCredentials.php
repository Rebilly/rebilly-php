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

class EMerchantPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getClientId(): ?string
    {
        return $this->fields['clientId'] ?? null;
    }

    public function setClientId(null|string $clientId): static
    {
        $this->fields['clientId'] = $clientId;

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

    public function getUsername(): ?string
    {
        return $this->fields['username'] ?? null;
    }

    public function setUsername(null|string $username): static
    {
        $this->fields['username'] = $username;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function setToken(null|string $token): static
    {
        $this->fields['token'] = $token;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->fields['password'] ?? null;
    }

    public function setPassword(null|string $password): static
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }

        return $data;
    }
}
