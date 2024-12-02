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

class PaysafeCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('storeId', $data)) {
            $this->setStoreId($data['storeId']);
        }
        if (array_key_exists('storePwd', $data)) {
            $this->setStorePwd($data['storePwd']);
        }
        if (array_key_exists('accountNum', $data)) {
            $this->setAccountNum($data['accountNum']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStoreId(): string
    {
        return $this->fields['storeId'];
    }

    public function setStoreId(string $storeId): static
    {
        $this->fields['storeId'] = $storeId;

        return $this;
    }

    public function getStorePwd(): string
    {
        return $this->fields['storePwd'];
    }

    public function setStorePwd(string $storePwd): static
    {
        $this->fields['storePwd'] = $storePwd;

        return $this;
    }

    public function getAccountNum(): string
    {
        return $this->fields['accountNum'];
    }

    public function setAccountNum(string $accountNum): static
    {
        $this->fields['accountNum'] = $accountNum;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('storeId', $this->fields)) {
            $data['storeId'] = $this->fields['storeId'];
        }
        if (array_key_exists('storePwd', $this->fields)) {
            $data['storePwd'] = $this->fields['storePwd'];
        }
        if (array_key_exists('accountNum', $this->fields)) {
            $data['accountNum'] = $this->fields['accountNum'];
        }

        return $data;
    }
}
