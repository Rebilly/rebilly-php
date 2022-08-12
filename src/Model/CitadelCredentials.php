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

class CitadelCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('storeName', $data)) {
            $this->setStoreName($data['storeName']);
        }
        if (array_key_exists('storeId', $data)) {
            $this->setStoreId($data['storeId']);
        }
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStoreName(): string
    {
        return $this->fields['storeName'];
    }

    public function setStoreName(string $storeName): self
    {
        $this->fields['storeName'] = $storeName;

        return $this;
    }

    public function getStoreId(): string
    {
        return $this->fields['storeId'];
    }

    public function setStoreId(string $storeId): self
    {
        $this->fields['storeId'] = $storeId;

        return $this;
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('storeName', $this->fields)) {
            $data['storeName'] = $this->fields['storeName'];
        }
        if (array_key_exists('storeId', $this->fields)) {
            $data['storeId'] = $this->fields['storeId'];
        }
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }

        return $data;
    }
}
