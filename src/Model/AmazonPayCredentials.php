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

class AmazonPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('storeId', $data)) {
            $this->setStoreId($data['storeId']);
        }
        if (array_key_exists('publicKeyId', $data)) {
            $this->setPublicKeyId($data['publicKeyId']);
        }
        if (array_key_exists('privateKey', $data)) {
            $this->setPrivateKey($data['privateKey']);
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

    public function setMerchantId(string $merchantId): self
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getStoreId(): string
    {
        return $this->fields['storeId'];
    }

    public function setStoreId(string $storeId): self
    {
        $this->fields['storeId'] = $storeId;

        return $this;
    }

    public function getPublicKeyId(): string
    {
        return $this->fields['publicKeyId'];
    }

    public function setPublicKeyId(string $publicKeyId): self
    {
        $this->fields['publicKeyId'] = $publicKeyId;

        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->fields['privateKey'];
    }

    public function setPrivateKey(string $privateKey): self
    {
        $this->fields['privateKey'] = $privateKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('storeId', $this->fields)) {
            $data['storeId'] = $this->fields['storeId'];
        }
        if (array_key_exists('publicKeyId', $this->fields)) {
            $data['publicKeyId'] = $this->fields['publicKeyId'];
        }
        if (array_key_exists('privateKey', $this->fields)) {
            $data['privateKey'] = $this->fields['privateKey'];
        }

        return $data;
    }
}
