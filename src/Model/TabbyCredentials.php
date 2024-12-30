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

class TabbyCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        if (array_key_exists('merchantCode', $data)) {
            $this->setMerchantCode($data['merchantCode']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPublicKey(): string
    {
        return $this->fields['publicKey'];
    }

    public function setPublicKey(string $publicKey): static
    {
        $this->fields['publicKey'] = $publicKey;

        return $this;
    }

    public function getSecretKey(): ?string
    {
        return $this->fields['secretKey'] ?? null;
    }

    public function setSecretKey(null|string $secretKey): static
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }
        if (array_key_exists('merchantCode', $this->fields)) {
            $data['merchantCode'] = $this->fields['merchantCode'];
        }

        return $data;
    }
}
