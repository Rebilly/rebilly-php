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

class PandaGatewayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantCode', $data)) {
            $this->setMerchantCode($data['merchantCode']);
        }
        if (array_key_exists('apiCode', $data)) {
            $this->setApiCode($data['apiCode']);
        }
        if (array_key_exists('signKey', $data)) {
            $this->setSignKey($data['signKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantCode(): string
    {
        return $this->fields['merchantCode'];
    }

    public function setMerchantCode(string $merchantCode): static
    {
        $this->fields['merchantCode'] = $merchantCode;

        return $this;
    }

    public function getApiCode(): string
    {
        return $this->fields['apiCode'];
    }

    public function setApiCode(string $apiCode): static
    {
        $this->fields['apiCode'] = $apiCode;

        return $this;
    }

    public function getSignKey(): string
    {
        return $this->fields['signKey'];
    }

    public function setSignKey(string $signKey): static
    {
        $this->fields['signKey'] = $signKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantCode', $this->fields)) {
            $data['merchantCode'] = $this->fields['merchantCode'];
        }
        if (array_key_exists('apiCode', $this->fields)) {
            $data['apiCode'] = $this->fields['apiCode'];
        }
        if (array_key_exists('signKey', $this->fields)) {
            $data['signKey'] = $this->fields['signKey'];
        }

        return $data;
    }
}
