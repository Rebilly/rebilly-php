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

class CCAvenueCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('accessCode', $data)) {
            $this->setAccessCode($data['accessCode']);
        }
        if (array_key_exists('workingKey', $data)) {
            $this->setWorkingKey($data['workingKey']);
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

    public function getAccessCode(): string
    {
        return $this->fields['accessCode'];
    }

    public function setAccessCode(string $accessCode): static
    {
        $this->fields['accessCode'] = $accessCode;

        return $this;
    }

    public function getWorkingKey(): string
    {
        return $this->fields['workingKey'];
    }

    public function setWorkingKey(string $workingKey): static
    {
        $this->fields['workingKey'] = $workingKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('accessCode', $this->fields)) {
            $data['accessCode'] = $this->fields['accessCode'];
        }
        if (array_key_exists('workingKey', $this->fields)) {
            $data['workingKey'] = $this->fields['workingKey'];
        }

        return $data;
    }
}
