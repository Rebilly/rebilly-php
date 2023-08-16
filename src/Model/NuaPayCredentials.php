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

class NuaPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('nuaPayCommonName', $data)) {
            $this->setNuaPayCommonName($data['nuaPayCommonName']);
        }
        if (array_key_exists('nuaPaySerialNumber', $data)) {
            $this->setNuaPaySerialNumber($data['nuaPaySerialNumber']);
        }
        if (array_key_exists('nuaPayAccountId', $data)) {
            $this->setNuaPayAccountId($data['nuaPayAccountId']);
        }
        if (array_key_exists('nuaPayOriginatorIban', $data)) {
            $this->setNuaPayOriginatorIban($data['nuaPayOriginatorIban']);
        }
        if (array_key_exists('nuaPayApiKey', $data)) {
            $this->setNuaPayApiKey($data['nuaPayApiKey']);
        }
        if (array_key_exists('nuaPayPrivateKey', $data)) {
            $this->setNuaPayPrivateKey($data['nuaPayPrivateKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getNuaPayCommonName(): string
    {
        return $this->fields['nuaPayCommonName'];
    }

    public function setNuaPayCommonName(string $nuaPayCommonName): static
    {
        $this->fields['nuaPayCommonName'] = $nuaPayCommonName;

        return $this;
    }

    public function getNuaPaySerialNumber(): string
    {
        return $this->fields['nuaPaySerialNumber'];
    }

    public function setNuaPaySerialNumber(string $nuaPaySerialNumber): static
    {
        $this->fields['nuaPaySerialNumber'] = $nuaPaySerialNumber;

        return $this;
    }

    public function getNuaPayAccountId(): string
    {
        return $this->fields['nuaPayAccountId'];
    }

    public function setNuaPayAccountId(string $nuaPayAccountId): static
    {
        $this->fields['nuaPayAccountId'] = $nuaPayAccountId;

        return $this;
    }

    public function getNuaPayOriginatorIban(): string
    {
        return $this->fields['nuaPayOriginatorIban'];
    }

    public function setNuaPayOriginatorIban(string $nuaPayOriginatorIban): static
    {
        $this->fields['nuaPayOriginatorIban'] = $nuaPayOriginatorIban;

        return $this;
    }

    public function getNuaPayApiKey(): string
    {
        return $this->fields['nuaPayApiKey'];
    }

    public function setNuaPayApiKey(string $nuaPayApiKey): static
    {
        $this->fields['nuaPayApiKey'] = $nuaPayApiKey;

        return $this;
    }

    public function getNuaPayPrivateKey(): string
    {
        return $this->fields['nuaPayPrivateKey'];
    }

    public function setNuaPayPrivateKey(string $nuaPayPrivateKey): static
    {
        $this->fields['nuaPayPrivateKey'] = $nuaPayPrivateKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('nuaPayCommonName', $this->fields)) {
            $data['nuaPayCommonName'] = $this->fields['nuaPayCommonName'];
        }
        if (array_key_exists('nuaPaySerialNumber', $this->fields)) {
            $data['nuaPaySerialNumber'] = $this->fields['nuaPaySerialNumber'];
        }
        if (array_key_exists('nuaPayAccountId', $this->fields)) {
            $data['nuaPayAccountId'] = $this->fields['nuaPayAccountId'];
        }
        if (array_key_exists('nuaPayOriginatorIban', $this->fields)) {
            $data['nuaPayOriginatorIban'] = $this->fields['nuaPayOriginatorIban'];
        }
        if (array_key_exists('nuaPayApiKey', $this->fields)) {
            $data['nuaPayApiKey'] = $this->fields['nuaPayApiKey'];
        }
        if (array_key_exists('nuaPayPrivateKey', $this->fields)) {
            $data['nuaPayPrivateKey'] = $this->fields['nuaPayPrivateKey'];
        }

        return $data;
    }
}
