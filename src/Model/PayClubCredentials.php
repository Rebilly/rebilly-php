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
use Rebilly\Sdk\Trait\HasMetadata;

class PayClubCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('accountNumber', $data)) {
            $this->setAccountNumber($data['accountNumber']);
        }
        if (array_key_exists('signKey', $data)) {
            $this->setSignKey($data['signKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getAccountNumber(): string
    {
        return $this->fields['accountNumber'];
    }

    public function setAccountNumber(string $accountNumber): static
    {
        $this->fields['accountNumber'] = $accountNumber;

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
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('accountNumber', $this->fields)) {
            $data['accountNumber'] = $this->fields['accountNumber'];
        }
        if (array_key_exists('signKey', $this->fields)) {
            $data['signKey'] = $this->fields['signKey'];
        }

        return $data;
    }
}
