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

class Pay4FunCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('merchantSecret', $data)) {
            $this->setMerchantSecret($data['merchantSecret']);
        }
        if (array_key_exists('merchantKey', $data)) {
            $this->setMerchantKey($data['merchantKey']);
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

    public function getMerchantSecret(): string
    {
        return $this->fields['merchantSecret'];
    }

    public function setMerchantSecret(string $merchantSecret): static
    {
        $this->fields['merchantSecret'] = $merchantSecret;

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
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('merchantSecret', $this->fields)) {
            $data['merchantSecret'] = $this->fields['merchantSecret'];
        }
        if (array_key_exists('merchantKey', $this->fields)) {
            $data['merchantKey'] = $this->fields['merchantKey'];
        }

        return $data;
    }
}
