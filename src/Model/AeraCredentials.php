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

class AeraCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('ipnSecret', $data)) {
            $this->setIpnSecret($data['ipnSecret']);
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

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

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
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('ipnSecret', $this->fields)) {
            $data['ipnSecret'] = $this->fields['ipnSecret'];
        }

        return $data;
    }
}
