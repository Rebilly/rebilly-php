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

class MercadoPagoCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('accessToken', $data)) {
            $this->setAccessToken($data['accessToken']);
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

    public function getAccessToken(): string
    {
        return $this->fields['accessToken'];
    }

    public function setAccessToken(string $accessToken): self
    {
        $this->fields['accessToken'] = $accessToken;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('accessToken', $this->fields)) {
            $data['accessToken'] = $this->fields['accessToken'];
        }

        return $data;
    }
}
