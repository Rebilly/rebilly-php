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

class CheckoutComCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        if (array_key_exists('signatureKey', $data)) {
            $this->setSignatureKey($data['signatureKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSecretKey(): string
    {
        return $this->fields['secretKey'];
    }

    public function setSecretKey(string $secretKey): static
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
    }

    public function getSignatureKey(): ?string
    {
        return $this->fields['signatureKey'] ?? null;
    }

    public function setSignatureKey(null|string $signatureKey): static
    {
        $this->fields['signatureKey'] = $signatureKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }
        if (array_key_exists('signatureKey', $this->fields)) {
            $data['signatureKey'] = $this->fields['signatureKey'];
        }

        return $data;
    }
}
