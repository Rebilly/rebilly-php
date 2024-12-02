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

class CashToCodeCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('cashToCodeUsername', $data)) {
            $this->setCashToCodeUsername($data['cashToCodeUsername']);
        }
        if (array_key_exists('cashToCodePassword', $data)) {
            $this->setCashToCodePassword($data['cashToCodePassword']);
        }
        if (array_key_exists('merchantUsername', $data)) {
            $this->setMerchantUsername($data['merchantUsername']);
        }
        if (array_key_exists('merchantPassword', $data)) {
            $this->setMerchantPassword($data['merchantPassword']);
        }
        if (array_key_exists('mid', $data)) {
            $this->setMid($data['mid']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCashToCodeUsername(): string
    {
        return $this->fields['cashToCodeUsername'];
    }

    public function setCashToCodeUsername(string $cashToCodeUsername): static
    {
        $this->fields['cashToCodeUsername'] = $cashToCodeUsername;

        return $this;
    }

    public function getCashToCodePassword(): string
    {
        return $this->fields['cashToCodePassword'];
    }

    public function setCashToCodePassword(string $cashToCodePassword): static
    {
        $this->fields['cashToCodePassword'] = $cashToCodePassword;

        return $this;
    }

    public function getMerchantUsername(): string
    {
        return $this->fields['merchantUsername'];
    }

    public function setMerchantUsername(string $merchantUsername): static
    {
        $this->fields['merchantUsername'] = $merchantUsername;

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

    public function getMid(): ?string
    {
        return $this->fields['mid'] ?? null;
    }

    public function setMid(null|string $mid): static
    {
        $this->fields['mid'] = $mid;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('cashToCodeUsername', $this->fields)) {
            $data['cashToCodeUsername'] = $this->fields['cashToCodeUsername'];
        }
        if (array_key_exists('cashToCodePassword', $this->fields)) {
            $data['cashToCodePassword'] = $this->fields['cashToCodePassword'];
        }
        if (array_key_exists('merchantUsername', $this->fields)) {
            $data['merchantUsername'] = $this->fields['merchantUsername'];
        }
        if (array_key_exists('merchantPassword', $this->fields)) {
            $data['merchantPassword'] = $this->fields['merchantPassword'];
        }
        if (array_key_exists('mid', $this->fields)) {
            $data['mid'] = $this->fields['mid'];
        }

        return $data;
    }
}
