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

class MiFinityCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('mifinityAccountNumber', $data)) {
            $this->setMifinityAccountNumber($data['mifinityAccountNumber']);
        }
        if (array_key_exists('accountHolderId', $data)) {
            $this->setAccountHolderId($data['accountHolderId']);
        }
        if (array_key_exists('brandId', $data)) {
            $this->setBrandId($data['brandId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function getMifinityAccountNumber(): string
    {
        return $this->fields['mifinityAccountNumber'];
    }

    public function setMifinityAccountNumber(string $mifinityAccountNumber): static
    {
        $this->fields['mifinityAccountNumber'] = $mifinityAccountNumber;

        return $this;
    }

    public function getAccountHolderId(): string
    {
        return $this->fields['accountHolderId'];
    }

    public function setAccountHolderId(string $accountHolderId): static
    {
        $this->fields['accountHolderId'] = $accountHolderId;

        return $this;
    }

    public function getBrandId(): ?string
    {
        return $this->fields['brandId'] ?? null;
    }

    public function setBrandId(null|string $brandId): static
    {
        $this->fields['brandId'] = $brandId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('mifinityAccountNumber', $this->fields)) {
            $data['mifinityAccountNumber'] = $this->fields['mifinityAccountNumber'];
        }
        if (array_key_exists('accountHolderId', $this->fields)) {
            $data['accountHolderId'] = $this->fields['accountHolderId'];
        }
        if (array_key_exists('brandId', $this->fields)) {
            $data['brandId'] = $this->fields['brandId'];
        }

        return $data;
    }
}
