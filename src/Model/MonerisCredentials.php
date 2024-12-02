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

class MonerisCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiToken', $data)) {
            $this->setApiToken($data['apiToken']);
        }
        if (array_key_exists('storeId', $data)) {
            $this->setStoreId($data['storeId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiToken(): string
    {
        return $this->fields['apiToken'];
    }

    public function setApiToken(string $apiToken): static
    {
        $this->fields['apiToken'] = $apiToken;

        return $this;
    }

    public function getStoreId(): string
    {
        return $this->fields['storeId'];
    }

    public function setStoreId(string $storeId): static
    {
        $this->fields['storeId'] = $storeId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiToken', $this->fields)) {
            $data['apiToken'] = $this->fields['apiToken'];
        }
        if (array_key_exists('storeId', $this->fields)) {
            $data['storeId'] = $this->fields['storeId'];
        }

        return $data;
    }
}
