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

class PayflowCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('user', $data)) {
            $this->setUser($data['user']);
        }
        if (array_key_exists('vendor', $data)) {
            $this->setVendor($data['vendor']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUser(): string
    {
        return $this->fields['user'];
    }

    public function setUser(string $user): static
    {
        $this->fields['user'] = $user;

        return $this;
    }

    public function getVendor(): string
    {
        return $this->fields['vendor'];
    }

    public function setVendor(string $vendor): static
    {
        $this->fields['vendor'] = $vendor;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('user', $this->fields)) {
            $data['user'] = $this->fields['user'];
        }
        if (array_key_exists('vendor', $this->fields)) {
            $data['vendor'] = $this->fields['vendor'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }

        return $data;
    }
}
