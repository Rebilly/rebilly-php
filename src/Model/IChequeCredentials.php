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

class IChequeCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('secretWord', $data)) {
            $this->setSecretWord($data['secretWord']);
        }
        if (array_key_exists('apiUserId', $data)) {
            $this->setApiUserId($data['apiUserId']);
        }
        if (array_key_exists('apiSecurityToken', $data)) {
            $this->setApiSecurityToken($data['apiSecurityToken']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getSecretWord(): string
    {
        return $this->fields['secretWord'];
    }

    public function setSecretWord(string $secretWord): static
    {
        $this->fields['secretWord'] = $secretWord;

        return $this;
    }

    public function getApiUserId(): ?string
    {
        return $this->fields['apiUserId'] ?? null;
    }

    public function setApiUserId(null|string $apiUserId): static
    {
        $this->fields['apiUserId'] = $apiUserId;

        return $this;
    }

    public function getApiSecurityToken(): ?string
    {
        return $this->fields['apiSecurityToken'] ?? null;
    }

    public function setApiSecurityToken(null|string $apiSecurityToken): static
    {
        $this->fields['apiSecurityToken'] = $apiSecurityToken;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('secretWord', $this->fields)) {
            $data['secretWord'] = $this->fields['secretWord'];
        }
        if (array_key_exists('apiUserId', $this->fields)) {
            $data['apiUserId'] = $this->fields['apiUserId'];
        }
        if (array_key_exists('apiSecurityToken', $this->fields)) {
            $data['apiSecurityToken'] = $this->fields['apiSecurityToken'];
        }

        return $data;
    }
}
