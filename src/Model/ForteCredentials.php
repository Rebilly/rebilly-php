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

class ForteCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('accountId', $data)) {
            $this->setAccountId($data['accountId']);
        }
        if (array_key_exists('locationId', $data)) {
            $this->setLocationId($data['locationId']);
        }
        if (array_key_exists('apiAccessId', $data)) {
            $this->setApiAccessId($data['apiAccessId']);
        }
        if (array_key_exists('apiSecretKey', $data)) {
            $this->setApiSecretKey($data['apiSecretKey']);
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

    public function setAccountId(string $accountId): static
    {
        $this->fields['accountId'] = $accountId;

        return $this;
    }

    public function getLocationId(): string
    {
        return $this->fields['locationId'];
    }

    public function setLocationId(string $locationId): static
    {
        $this->fields['locationId'] = $locationId;

        return $this;
    }

    public function getApiAccessId(): string
    {
        return $this->fields['apiAccessId'];
    }

    public function setApiAccessId(string $apiAccessId): static
    {
        $this->fields['apiAccessId'] = $apiAccessId;

        return $this;
    }

    public function getApiSecretKey(): string
    {
        return $this->fields['apiSecretKey'];
    }

    public function setApiSecretKey(string $apiSecretKey): static
    {
        $this->fields['apiSecretKey'] = $apiSecretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accountId', $this->fields)) {
            $data['accountId'] = $this->fields['accountId'];
        }
        if (array_key_exists('locationId', $this->fields)) {
            $data['locationId'] = $this->fields['locationId'];
        }
        if (array_key_exists('apiAccessId', $this->fields)) {
            $data['apiAccessId'] = $this->fields['apiAccessId'];
        }
        if (array_key_exists('apiSecretKey', $this->fields)) {
            $data['apiSecretKey'] = $this->fields['apiSecretKey'];
        }

        return $data;
    }
}
