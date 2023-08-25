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

class PharosPaymentsCredentials implements JsonSerializable
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
        if (array_key_exists('merchantCode', $data)) {
            $this->setMerchantCode($data['merchantCode']);
        }
        if (array_key_exists('terminalCode', $data)) {
            $this->setTerminalCode($data['terminalCode']);
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

    public function getMerchantCode(): string
    {
        return $this->fields['merchantCode'];
    }

    public function setMerchantCode(string $merchantCode): static
    {
        $this->fields['merchantCode'] = $merchantCode;

        return $this;
    }

    public function getTerminalCode(): string
    {
        return $this->fields['terminalCode'];
    }

    public function setTerminalCode(string $terminalCode): static
    {
        $this->fields['terminalCode'] = $terminalCode;

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
        if (array_key_exists('merchantCode', $this->fields)) {
            $data['merchantCode'] = $this->fields['merchantCode'];
        }
        if (array_key_exists('terminalCode', $this->fields)) {
            $data['terminalCode'] = $this->fields['terminalCode'];
        }

        return $data;
    }
}
