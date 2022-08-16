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

class ZotapayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('endpointId', $data)) {
            $this->setEndpointId($data['endpointId']);
        }
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('merchantSecretKey', $data)) {
            $this->setMerchantSecretKey($data['merchantSecretKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEndpointId(): string
    {
        return $this->fields['endpointId'];
    }

    public function setEndpointId(string $endpointId): self
    {
        $this->fields['endpointId'] = $endpointId;

        return $this;
    }

    public function getMerchantId(): string
    {
        return $this->fields['merchantId'];
    }

    public function setMerchantId(string $merchantId): self
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getMerchantSecretKey(): string
    {
        return $this->fields['merchantSecretKey'];
    }

    public function setMerchantSecretKey(string $merchantSecretKey): self
    {
        $this->fields['merchantSecretKey'] = $merchantSecretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('endpointId', $this->fields)) {
            $data['endpointId'] = $this->fields['endpointId'];
        }
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('merchantSecretKey', $this->fields)) {
            $data['merchantSecretKey'] = $this->fields['merchantSecretKey'];
        }

        return $data;
    }
}