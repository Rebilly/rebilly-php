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

class EMSCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('storeId', $data)) {
            $this->setStoreId($data['storeId']);
        }
        if (array_key_exists('userId', $data)) {
            $this->setUserId($data['userId']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('privateKey', $data)) {
            $this->setPrivateKey($data['privateKey']);
        }
        if (array_key_exists('privateKeyPassword', $data)) {
            $this->setPrivateKeyPassword($data['privateKeyPassword']);
        }
        if (array_key_exists('clientCertificate', $data)) {
            $this->setClientCertificate($data['clientCertificate']);
        }
        if (array_key_exists('clientCertificatePassword', $data)) {
            $this->setClientCertificatePassword($data['clientCertificatePassword']);
        }
        if (array_key_exists('serverCertificate', $data)) {
            $this->setServerCertificate($data['serverCertificate']);
        }
        if (array_key_exists('merchantName', $data)) {
            $this->setMerchantName($data['merchantName']);
        }
        if (array_key_exists('sftpPrivateKey', $data)) {
            $this->setSftpPrivateKey($data['sftpPrivateKey']);
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

    public function getUserId(): string
    {
        return $this->fields['userId'];
    }

    public function setUserId(string $userId): static
    {
        $this->fields['userId'] = $userId;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): static
    {
        $this->fields['password'] = $password;

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

    public function getPrivateKeyPassword(): string
    {
        return $this->fields['privateKeyPassword'];
    }

    public function setPrivateKeyPassword(string $privateKeyPassword): static
    {
        $this->fields['privateKeyPassword'] = $privateKeyPassword;

        return $this;
    }

    public function getClientCertificate(): string
    {
        return $this->fields['clientCertificate'];
    }

    public function setClientCertificate(string $clientCertificate): static
    {
        $this->fields['clientCertificate'] = $clientCertificate;

        return $this;
    }

    public function getClientCertificatePassword(): string
    {
        return $this->fields['clientCertificatePassword'];
    }

    public function setClientCertificatePassword(string $clientCertificatePassword): static
    {
        $this->fields['clientCertificatePassword'] = $clientCertificatePassword;

        return $this;
    }

    public function getServerCertificate(): string
    {
        return $this->fields['serverCertificate'];
    }

    public function setServerCertificate(string $serverCertificate): static
    {
        $this->fields['serverCertificate'] = $serverCertificate;

        return $this;
    }

    public function getMerchantName(): ?string
    {
        return $this->fields['merchantName'] ?? null;
    }

    public function setMerchantName(null|string $merchantName): static
    {
        $this->fields['merchantName'] = $merchantName;

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
        if (array_key_exists('storeId', $this->fields)) {
            $data['storeId'] = $this->fields['storeId'];
        }
        if (array_key_exists('userId', $this->fields)) {
            $data['userId'] = $this->fields['userId'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('privateKey', $this->fields)) {
            $data['privateKey'] = $this->fields['privateKey'];
        }
        if (array_key_exists('privateKeyPassword', $this->fields)) {
            $data['privateKeyPassword'] = $this->fields['privateKeyPassword'];
        }
        if (array_key_exists('clientCertificate', $this->fields)) {
            $data['clientCertificate'] = $this->fields['clientCertificate'];
        }
        if (array_key_exists('clientCertificatePassword', $this->fields)) {
            $data['clientCertificatePassword'] = $this->fields['clientCertificatePassword'];
        }
        if (array_key_exists('serverCertificate', $this->fields)) {
            $data['serverCertificate'] = $this->fields['serverCertificate'];
        }
        if (array_key_exists('merchantName', $this->fields)) {
            $data['merchantName'] = $this->fields['merchantName'];
        }
        if (array_key_exists('sftpPrivateKey', $this->fields)) {
            $data['sftpPrivateKey'] = $this->fields['sftpPrivateKey'];
        }

        return $data;
    }
}
