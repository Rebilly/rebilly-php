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

class UnlimitCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('terminalId', $data)) {
            $this->setTerminalId($data['terminalId']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('ipnSecret', $data)) {
            $this->setIpnSecret($data['ipnSecret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): static
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getIpnSecret(): string
    {
        return $this->fields['ipnSecret'];
    }

    public function setIpnSecret(string $ipnSecret): static
    {
        $this->fields['ipnSecret'] = $ipnSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('terminalId', $this->fields)) {
            $data['terminalId'] = $this->fields['terminalId'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('ipnSecret', $this->fields)) {
            $data['ipnSecret'] = $this->fields['ipnSecret'];
        }

        return $data;
    }
}
