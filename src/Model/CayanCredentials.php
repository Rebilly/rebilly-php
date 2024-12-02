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

class CayanCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantSiteId', $data)) {
            $this->setMerchantSiteId($data['merchantSiteId']);
        }
        if (array_key_exists('merchantName', $data)) {
            $this->setMerchantName($data['merchantName']);
        }
        if (array_key_exists('merchantKey', $data)) {
            $this->setMerchantKey($data['merchantKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantSiteId(): string
    {
        return $this->fields['merchantSiteId'];
    }

    public function setMerchantSiteId(string $merchantSiteId): static
    {
        $this->fields['merchantSiteId'] = $merchantSiteId;

        return $this;
    }

    public function getMerchantName(): string
    {
        return $this->fields['merchantName'];
    }

    public function setMerchantName(string $merchantName): static
    {
        $this->fields['merchantName'] = $merchantName;

        return $this;
    }

    public function getMerchantKey(): string
    {
        return $this->fields['merchantKey'];
    }

    public function setMerchantKey(string $merchantKey): static
    {
        $this->fields['merchantKey'] = $merchantKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantSiteId', $this->fields)) {
            $data['merchantSiteId'] = $this->fields['merchantSiteId'];
        }
        if (array_key_exists('merchantName', $this->fields)) {
            $data['merchantName'] = $this->fields['merchantName'];
        }
        if (array_key_exists('merchantKey', $this->fields)) {
            $data['merchantKey'] = $this->fields['merchantKey'];
        }

        return $data;
    }
}
