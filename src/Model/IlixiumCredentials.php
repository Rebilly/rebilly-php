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

class IlixiumCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('accountId', $data)) {
            $this->setAccountId($data['accountId']);
        }
        if (array_key_exists('digestPassword', $data)) {
            $this->setDigestPassword($data['digestPassword']);
        }
        if (array_key_exists('sftpUsername', $data)) {
            $this->setSftpUsername($data['sftpUsername']);
        }
        if (array_key_exists('sftpPrivateKey', $data)) {
            $this->setSftpPrivateKey($data['sftpPrivateKey']);
        }
        if (array_key_exists('sftpKeyPassphrase', $data)) {
            $this->setSftpKeyPassphrase($data['sftpKeyPassphrase']);
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

    public function getAccountId(): string
    {
        return $this->fields['accountId'];
    }

    public function setAccountId(string $accountId): static
    {
        $this->fields['accountId'] = $accountId;

        return $this;
    }

    public function getDigestPassword(): string
    {
        return $this->fields['digestPassword'];
    }

    public function setDigestPassword(string $digestPassword): static
    {
        $this->fields['digestPassword'] = $digestPassword;

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

    public function getSftpKeyPassphrase(): ?string
    {
        return $this->fields['sftpKeyPassphrase'] ?? null;
    }

    public function setSftpKeyPassphrase(null|string $sftpKeyPassphrase): static
    {
        $this->fields['sftpKeyPassphrase'] = $sftpKeyPassphrase;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('accountId', $this->fields)) {
            $data['accountId'] = $this->fields['accountId'];
        }
        if (array_key_exists('digestPassword', $this->fields)) {
            $data['digestPassword'] = $this->fields['digestPassword'];
        }
        if (array_key_exists('sftpUsername', $this->fields)) {
            $data['sftpUsername'] = $this->fields['sftpUsername'];
        }
        if (array_key_exists('sftpPrivateKey', $this->fields)) {
            $data['sftpPrivateKey'] = $this->fields['sftpPrivateKey'];
        }
        if (array_key_exists('sftpKeyPassphrase', $this->fields)) {
            $data['sftpKeyPassphrase'] = $this->fields['sftpKeyPassphrase'];
        }

        return $data;
    }
}
