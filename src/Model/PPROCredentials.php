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

class PPROCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('login', $data)) {
            $this->setLogin($data['login']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('contractId', $data)) {
            $this->setContractId($data['contractId']);
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
        if (array_key_exists('serverCertificate', $data)) {
            $this->setServerCertificate($data['serverCertificate']);
        }
        if (array_key_exists('notificationSecret', $data)) {
            $this->setNotificationSecret($data['notificationSecret']);
        }
        if (array_key_exists('sharedSecret', $data)) {
            $this->setSharedSecret($data['sharedSecret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getLogin(): string
    {
        return $this->fields['login'];
    }

    public function setLogin(string $login): static
    {
        $this->fields['login'] = $login;

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

    public function getContractId(): string
    {
        return $this->fields['contractId'];
    }

    public function setContractId(string $contractId): static
    {
        $this->fields['contractId'] = $contractId;

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

    public function getServerCertificate(): string
    {
        return $this->fields['serverCertificate'];
    }

    public function setServerCertificate(string $serverCertificate): static
    {
        $this->fields['serverCertificate'] = $serverCertificate;

        return $this;
    }

    public function getNotificationSecret(): string
    {
        return $this->fields['notificationSecret'];
    }

    public function setNotificationSecret(string $notificationSecret): static
    {
        $this->fields['notificationSecret'] = $notificationSecret;

        return $this;
    }

    public function getSharedSecret(): string
    {
        return $this->fields['sharedSecret'];
    }

    public function setSharedSecret(string $sharedSecret): static
    {
        $this->fields['sharedSecret'] = $sharedSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('login', $this->fields)) {
            $data['login'] = $this->fields['login'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('contractId', $this->fields)) {
            $data['contractId'] = $this->fields['contractId'];
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
        if (array_key_exists('serverCertificate', $this->fields)) {
            $data['serverCertificate'] = $this->fields['serverCertificate'];
        }
        if (array_key_exists('notificationSecret', $this->fields)) {
            $data['notificationSecret'] = $this->fields['notificationSecret'];
        }
        if (array_key_exists('sharedSecret', $this->fields)) {
            $data['sharedSecret'] = $this->fields['sharedSecret'];
        }

        return $data;
    }
}
