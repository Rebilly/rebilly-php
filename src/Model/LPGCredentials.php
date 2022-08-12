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

class LPGCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('secureKey', $data)) {
            $this->setSecureKey($data['secureKey']);
        }
        if (array_key_exists('payoutUsername', $data)) {
            $this->setPayoutUsername($data['payoutUsername']);
        }
        if (array_key_exists('payoutPassword', $data)) {
            $this->setPayoutPassword($data['payoutPassword']);
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

    public function setPublicKey(string $publicKey): self
    {
        $this->fields['publicKey'] = $publicKey;

        return $this;
    }

    public function getSecureKey(): string
    {
        return $this->fields['secureKey'];
    }

    public function setSecureKey(string $secureKey): self
    {
        $this->fields['secureKey'] = $secureKey;

        return $this;
    }

    public function getPayoutUsername(): ?string
    {
        return $this->fields['payoutUsername'] ?? null;
    }

    public function setPayoutUsername(null|string $payoutUsername): self
    {
        $this->fields['payoutUsername'] = $payoutUsername;

        return $this;
    }

    public function getPayoutPassword(): ?string
    {
        return $this->fields['payoutPassword'] ?? null;
    }

    public function setPayoutPassword(null|string $payoutPassword): self
    {
        $this->fields['payoutPassword'] = $payoutPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('secureKey', $this->fields)) {
            $data['secureKey'] = $this->fields['secureKey'];
        }
        if (array_key_exists('payoutUsername', $this->fields)) {
            $data['payoutUsername'] = $this->fields['payoutUsername'];
        }
        if (array_key_exists('payoutPassword', $this->fields)) {
            $data['payoutPassword'] = $this->fields['payoutPassword'];
        }

        return $data;
    }
}
