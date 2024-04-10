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

class BVNKCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('hawkAuthId', $data)) {
            $this->setHawkAuthId($data['hawkAuthId']);
        }
        if (array_key_exists('hawkAuthKey', $data)) {
            $this->setHawkAuthKey($data['hawkAuthKey']);
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

    public function getHawkAuthId(): string
    {
        return $this->fields['hawkAuthId'];
    }

    public function setHawkAuthId(string $hawkAuthId): static
    {
        $this->fields['hawkAuthId'] = $hawkAuthId;

        return $this;
    }

    public function getHawkAuthKey(): string
    {
        return $this->fields['hawkAuthKey'];
    }

    public function setHawkAuthKey(string $hawkAuthKey): static
    {
        $this->fields['hawkAuthKey'] = $hawkAuthKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('hawkAuthId', $this->fields)) {
            $data['hawkAuthId'] = $this->fields['hawkAuthId'];
        }
        if (array_key_exists('hawkAuthKey', $this->fields)) {
            $data['hawkAuthKey'] = $this->fields['hawkAuthKey'];
        }

        return $data;
    }
}
