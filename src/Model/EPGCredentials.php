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

class EPGCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('productId', $data)) {
            $this->setProductId($data['productId']);
        }
        if (array_key_exists('merchantPassword', $data)) {
            $this->setMerchantPassword($data['merchantPassword']);
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

    public function getProductId(): string
    {
        return $this->fields['productId'];
    }

    public function setProductId(string $productId): static
    {
        $this->fields['productId'] = $productId;

        return $this;
    }

    public function getMerchantPassword(): string
    {
        return $this->fields['merchantPassword'];
    }

    public function setMerchantPassword(string $merchantPassword): static
    {
        $this->fields['merchantPassword'] = $merchantPassword;

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
        if (array_key_exists('productId', $this->fields)) {
            $data['productId'] = $this->fields['productId'];
        }
        if (array_key_exists('merchantPassword', $this->fields)) {
            $data['merchantPassword'] = $this->fields['merchantPassword'];
        }
        if (array_key_exists('merchantKey', $this->fields)) {
            $data['merchantKey'] = $this->fields['merchantKey'];
        }

        return $data;
    }
}
