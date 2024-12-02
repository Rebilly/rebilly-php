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

class PostFinanceCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('pspId', $data)) {
            $this->setPspId($data['pspId']);
        }
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('sftpUsername', $data)) {
            $this->setSftpUsername($data['sftpUsername']);
        }
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('privateKey', $data)) {
            $this->setPrivateKey($data['privateKey']);
        }
        if (array_key_exists('keyPassphrase', $data)) {
            $this->setKeyPassphrase($data['keyPassphrase']);
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

    public function getPspId(): string
    {
        return $this->fields['pspId'];
    }

    public function setPspId(string $pspId): static
    {
        $this->fields['pspId'] = $pspId;

        return $this;
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

    public function getSftpUsername(): string
    {
        return $this->fields['sftpUsername'];
    }

    public function setSftpUsername(string $sftpUsername): static
    {
        $this->fields['sftpUsername'] = $sftpUsername;

        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->fields['publicKey'];
    }

    public function setPublicKey(string $publicKey): static
    {
        $this->fields['publicKey'] = $publicKey;

        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->fields['privateKey'];
    }

    public function setPrivateKey(string $privateKey): static
    {
        $this->fields['privateKey'] = $privateKey;

        return $this;
    }

    public function getKeyPassphrase(): string
    {
        return $this->fields['keyPassphrase'];
    }

    public function setKeyPassphrase(string $keyPassphrase): static
    {
        $this->fields['keyPassphrase'] = $keyPassphrase;

        return $this;
    }

    public function getSftpPrivateKey(): string
    {
        return $this->fields['sftpPrivateKey'];
    }

    public function setSftpPrivateKey(string $sftpPrivateKey): static
    {
        $this->fields['sftpPrivateKey'] = $sftpPrivateKey;

        return $this;
    }

    public function getSftpKeyPassphrase(): string
    {
        return $this->fields['sftpKeyPassphrase'];
    }

    public function setSftpKeyPassphrase(string $sftpKeyPassphrase): static
    {
        $this->fields['sftpKeyPassphrase'] = $sftpKeyPassphrase;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('pspId', $this->fields)) {
            $data['pspId'] = $this->fields['pspId'];
        }
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('sftpUsername', $this->fields)) {
            $data['sftpUsername'] = $this->fields['sftpUsername'];
        }
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('privateKey', $this->fields)) {
            $data['privateKey'] = $this->fields['privateKey'];
        }
        if (array_key_exists('keyPassphrase', $this->fields)) {
            $data['keyPassphrase'] = $this->fields['keyPassphrase'];
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
