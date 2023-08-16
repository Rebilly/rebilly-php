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

class WirecardCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantUsername', $data)) {
            $this->setMerchantUsername($data['merchantUsername']);
        }
        if (array_key_exists('merchantPassword', $data)) {
            $this->setMerchantPassword($data['merchantPassword']);
        }
        if (array_key_exists('businessSignature', $data)) {
            $this->setBusinessSignature($data['businessSignature']);
        }
        if (array_key_exists('delay', $data)) {
            $this->setDelay($data['delay']);
        }
        if (array_key_exists('sftpUsername', $data)) {
            $this->setSftpUsername($data['sftpUsername']);
        }
        if (array_key_exists('sftpPrivateKey', $data)) {
            $this->setSftpPrivateKey($data['sftpPrivateKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getBusinessSignature(): string
    {
        return $this->fields['businessSignature'];
    }

    public function setBusinessSignature(string $businessSignature): static
    {
        $this->fields['businessSignature'] = $businessSignature;

        return $this;
    }

    public function getDelay(): int
    {
        return $this->fields['delay'];
    }

    public function setDelay(int $delay): static
    {
        $this->fields['delay'] = $delay;

        return $this;
    }

    public function getSftpUsername(): ?string
    {
        return $this->fields['sftpUsername'] ?? null;
    }

    public function setSftpUsername(null|string $sftpUsername): static
    {
        $this->fields['sftpUsername'] = $sftpUsername;

        return $this;
    }

    public function getSftpPrivateKey(): ?string
    {
        return $this->fields['sftpPrivateKey'] ?? null;
    }

    public function setSftpPrivateKey(null|string $sftpPrivateKey): static
    {
        $this->fields['sftpPrivateKey'] = $sftpPrivateKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantUsername', $this->fields)) {
            $data['merchantUsername'] = $this->fields['merchantUsername'];
        }
        if (array_key_exists('merchantPassword', $this->fields)) {
            $data['merchantPassword'] = $this->fields['merchantPassword'];
        }
        if (array_key_exists('businessSignature', $this->fields)) {
            $data['businessSignature'] = $this->fields['businessSignature'];
        }
        if (array_key_exists('delay', $this->fields)) {
            $data['delay'] = $this->fields['delay'];
        }
        if (array_key_exists('sftpUsername', $this->fields)) {
            $data['sftpUsername'] = $this->fields['sftpUsername'];
        }
        if (array_key_exists('sftpPrivateKey', $this->fields)) {
            $data['sftpPrivateKey'] = $this->fields['sftpPrivateKey'];
        }

        return $data;
    }
}
