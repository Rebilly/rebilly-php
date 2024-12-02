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

class PSiGateCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('clientApiKey', $data)) {
            $this->setClientApiKey($data['clientApiKey']);
        }
        if (array_key_exists('disputeUsername', $data)) {
            $this->setDisputeUsername($data['disputeUsername']);
        }
        if (array_key_exists('disputePassword', $data)) {
            $this->setDisputePassword($data['disputePassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUsername(): string
    {
        return $this->fields['username'];
    }

    public function setUsername(string $username): static
    {
        $this->fields['username'] = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): static
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getClientId(): string
    {
        return $this->fields['clientId'];
    }

    public function setClientId(string $clientId): static
    {
        $this->fields['clientId'] = $clientId;

        return $this;
    }

    public function getClientApiKey(): string
    {
        return $this->fields['clientApiKey'];
    }

    public function setClientApiKey(string $clientApiKey): static
    {
        $this->fields['clientApiKey'] = $clientApiKey;

        return $this;
    }

    public function getDisputeUsername(): ?string
    {
        return $this->fields['disputeUsername'] ?? null;
    }

    public function setDisputeUsername(null|string $disputeUsername): static
    {
        $this->fields['disputeUsername'] = $disputeUsername;

        return $this;
    }

    public function getDisputePassword(): ?string
    {
        return $this->fields['disputePassword'] ?? null;
    }

    public function setDisputePassword(null|string $disputePassword): static
    {
        $this->fields['disputePassword'] = $disputePassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('clientApiKey', $this->fields)) {
            $data['clientApiKey'] = $this->fields['clientApiKey'];
        }
        if (array_key_exists('disputeUsername', $this->fields)) {
            $data['disputeUsername'] = $this->fields['disputeUsername'];
        }
        if (array_key_exists('disputePassword', $this->fields)) {
            $data['disputePassword'] = $this->fields['disputePassword'];
        }

        return $data;
    }
}
