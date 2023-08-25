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

class EzeebillCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('accessId', $data)) {
            $this->setAccessId($data['accessId']);
        }
        if (array_key_exists('terminalId', $data)) {
            $this->setTerminalId($data['terminalId']);
        }
        if (array_key_exists('operatorId', $data)) {
            $this->setOperatorId($data['operatorId']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('hashKey', $data)) {
            $this->setHashKey($data['hashKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantId(): string
    {
        return $this->fields['merchantId'];
    }

    public function setMerchantId(string $merchantId): static
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getAccessId(): string
    {
        return $this->fields['accessId'];
    }

    public function setAccessId(string $accessId): static
    {
        $this->fields['accessId'] = $accessId;

        return $this;
    }

    public function getTerminalId(): string
    {
        return $this->fields['terminalId'];
    }

    public function setTerminalId(string $terminalId): static
    {
        $this->fields['terminalId'] = $terminalId;

        return $this;
    }

    public function getOperatorId(): string
    {
        return $this->fields['operatorId'];
    }

    public function setOperatorId(string $operatorId): static
    {
        $this->fields['operatorId'] = $operatorId;

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

    public function getHashKey(): string
    {
        return $this->fields['hashKey'];
    }

    public function setHashKey(string $hashKey): static
    {
        $this->fields['hashKey'] = $hashKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('accessId', $this->fields)) {
            $data['accessId'] = $this->fields['accessId'];
        }
        if (array_key_exists('terminalId', $this->fields)) {
            $data['terminalId'] = $this->fields['terminalId'];
        }
        if (array_key_exists('operatorId', $this->fields)) {
            $data['operatorId'] = $this->fields['operatorId'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('hashKey', $this->fields)) {
            $data['hashKey'] = $this->fields['hashKey'];
        }

        return $data;
    }
}
