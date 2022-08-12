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

class RealexCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        if (array_key_exists('rebatePassword', $data)) {
            $this->setRebatePassword($data['rebatePassword']);
        }
        if (array_key_exists('account', $data)) {
            $this->setAccount($data['account']);
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

    public function getSecretKey(): string
    {
        return $this->fields['secretKey'];
    }

    public function setSecretKey(string $secretKey): self
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
    }

    public function getRebatePassword(): string
    {
        return $this->fields['rebatePassword'];
    }

    public function setRebatePassword(string $rebatePassword): self
    {
        $this->fields['rebatePassword'] = $rebatePassword;

        return $this;
    }

    public function getAccount(): string
    {
        return $this->fields['account'];
    }

    public function setAccount(string $account): self
    {
        $this->fields['account'] = $account;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }
        if (array_key_exists('rebatePassword', $this->fields)) {
            $data['rebatePassword'] = $this->fields['rebatePassword'];
        }
        if (array_key_exists('account', $this->fields)) {
            $data['account'] = $this->fields['account'];
        }

        return $data;
    }
}
