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

class BlueSnapCredentials implements JsonSerializable
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
        if (array_key_exists('dataProtectionKey', $data)) {
            $this->setDataProtectionKey($data['dataProtectionKey']);
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

    public function setUsername(string $username): self
    {
        $this->fields['username'] = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): self
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getDataProtectionKey(): ?string
    {
        return $this->fields['dataProtectionKey'] ?? null;
    }

    public function setDataProtectionKey(null|string $dataProtectionKey): self
    {
        $this->fields['dataProtectionKey'] = $dataProtectionKey;

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
        if (array_key_exists('dataProtectionKey', $this->fields)) {
            $data['dataProtectionKey'] = $this->fields['dataProtectionKey'];
        }

        return $data;
    }
}
