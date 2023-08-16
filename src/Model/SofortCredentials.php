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

class SofortCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('configKey', $data)) {
            $this->setConfigKey($data['configKey']);
        }
        if (array_key_exists('nuaPayApiKey', $data)) {
            $this->setNuaPayApiKey($data['nuaPayApiKey']);
        }
        if (array_key_exists('nuaPayAccountId', $data)) {
            $this->setNuaPayAccountId($data['nuaPayAccountId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getConfigKey(): string
    {
        return $this->fields['configKey'];
    }

    public function setConfigKey(string $configKey): static
    {
        $this->fields['configKey'] = $configKey;

        return $this;
    }

    public function getNuaPayApiKey(): ?string
    {
        return $this->fields['nuaPayApiKey'] ?? null;
    }

    public function setNuaPayApiKey(null|string $nuaPayApiKey): static
    {
        $this->fields['nuaPayApiKey'] = $nuaPayApiKey;

        return $this;
    }

    public function getNuaPayAccountId(): ?string
    {
        return $this->fields['nuaPayAccountId'] ?? null;
    }

    public function setNuaPayAccountId(null|string $nuaPayAccountId): static
    {
        $this->fields['nuaPayAccountId'] = $nuaPayAccountId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('configKey', $this->fields)) {
            $data['configKey'] = $this->fields['configKey'];
        }
        if (array_key_exists('nuaPayApiKey', $this->fields)) {
            $data['nuaPayApiKey'] = $this->fields['nuaPayApiKey'];
        }
        if (array_key_exists('nuaPayAccountId', $this->fields)) {
            $data['nuaPayAccountId'] = $this->fields['nuaPayAccountId'];
        }

        return $data;
    }
}
