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

class CoinPaymentsCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('privateKey', $data)) {
            $this->setPrivateKey($data['privateKey']);
        }
        if (array_key_exists('ipnSecret', $data)) {
            $this->setIpnSecret($data['ipnSecret']);
        }
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
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

    public function getPrivateKey(): string
    {
        return $this->fields['privateKey'];
    }

    public function setPrivateKey(string $privateKey): static
    {
        $this->fields['privateKey'] = $privateKey;

        return $this;
    }

    public function getIpnSecret(): string
    {
        return $this->fields['ipnSecret'];
    }

    public function setIpnSecret(string $ipnSecret): static
    {
        $this->fields['ipnSecret'] = $ipnSecret;

        return $this;
    }

    public function getMerchantId(): ?string
    {
        return $this->fields['merchantId'] ?? null;
    }

    public function setMerchantId(null|string $merchantId): static
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('privateKey', $this->fields)) {
            $data['privateKey'] = $this->fields['privateKey'];
        }
        if (array_key_exists('ipnSecret', $this->fields)) {
            $data['ipnSecret'] = $this->fields['ipnSecret'];
        }
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }

        return $data;
    }
}
