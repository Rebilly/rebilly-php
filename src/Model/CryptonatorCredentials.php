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

class CryptonatorCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchant_id', $data)) {
            $this->setMerchantId($data['merchant_id']);
        }
        if (array_key_exists('secret', $data)) {
            $this->setSecret($data['secret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantId(): string
    {
        return $this->fields['merchant_id'];
    }

    public function setMerchantId(string $merchantId): static
    {
        $this->fields['merchant_id'] = $merchantId;

        return $this;
    }

    public function getSecret(): string
    {
        return $this->fields['secret'];
    }

    public function setSecret(string $secret): static
    {
        $this->fields['secret'] = $secret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchant_id', $this->fields)) {
            $data['merchant_id'] = $this->fields['merchant_id'];
        }
        if (array_key_exists('secret', $this->fields)) {
            $data['secret'] = $this->fields['secret'];
        }

        return $data;
    }
}
