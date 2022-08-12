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

class A1GatewayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('accountId', $data)) {
            $this->setAccountId($data['accountId']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAccountId(): string
    {
        return $this->fields['accountId'];
    }

    public function setAccountId(string $accountId): self
    {
        $this->fields['accountId'] = $accountId;

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
        if (array_key_exists('accountId', $this->fields)) {
            $data['accountId'] = $this->fields['accountId'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }

        return $data;
    }
}
