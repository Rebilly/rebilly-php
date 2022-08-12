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

class FinraxCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('businessId', $data)) {
            $this->setBusinessId($data['businessId']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('apiSecret', $data)) {
            $this->setApiSecret($data['apiSecret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getBusinessId(): string
    {
        return $this->fields['businessId'];
    }

    public function setBusinessId(string $businessId): self
    {
        $this->fields['businessId'] = $businessId;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): self
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function getApiSecret(): string
    {
        return $this->fields['apiSecret'];
    }

    public function setApiSecret(string $apiSecret): self
    {
        $this->fields['apiSecret'] = $apiSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('businessId', $this->fields)) {
            $data['businessId'] = $this->fields['businessId'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('apiSecret', $this->fields)) {
            $data['apiSecret'] = $this->fields['apiSecret'];
        }

        return $data;
    }
}
