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

class TruevoCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('mid', $data)) {
            $this->setMid($data['mid']);
        }
        if (array_key_exists('tid', $data)) {
            $this->setTid($data['tid']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('merchantName', $data)) {
            $this->setMerchantName($data['merchantName']);
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

    public function getMid(): string
    {
        return $this->fields['mid'];
    }

    public function setMid(string $mid): self
    {
        $this->fields['mid'] = $mid;

        return $this;
    }

    public function getTid(): string
    {
        return $this->fields['tid'];
    }

    public function setTid(string $tid): self
    {
        $this->fields['tid'] = $tid;

        return $this;
    }

    public function getToken(): string
    {
        return $this->fields['token'];
    }

    public function setToken(string $token): self
    {
        $this->fields['token'] = $token;

        return $this;
    }

    public function getMerchantName(): ?string
    {
        return $this->fields['merchantName'] ?? null;
    }

    public function setMerchantName(null|string $merchantName): self
    {
        $this->fields['merchantName'] = $merchantName;

        return $this;
    }

    public function getSftpUsername(): ?string
    {
        return $this->fields['sftpUsername'] ?? null;
    }

    public function setSftpUsername(null|string $sftpUsername): self
    {
        $this->fields['sftpUsername'] = $sftpUsername;

        return $this;
    }

    public function getSftpPrivateKey(): ?string
    {
        return $this->fields['sftpPrivateKey'] ?? null;
    }

    public function setSftpPrivateKey(null|string $sftpPrivateKey): self
    {
        $this->fields['sftpPrivateKey'] = $sftpPrivateKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('mid', $this->fields)) {
            $data['mid'] = $this->fields['mid'];
        }
        if (array_key_exists('tid', $this->fields)) {
            $data['tid'] = $this->fields['tid'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('merchantName', $this->fields)) {
            $data['merchantName'] = $this->fields['merchantName'];
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
