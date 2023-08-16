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

class AstroPayCardCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('x_login', $data)) {
            $this->setXLogin($data['x_login']);
        }
        if (array_key_exists('x_tran_key', $data)) {
            $this->setXTranKey($data['x_tran_key']);
        }
        if (array_key_exists('secret_key', $data)) {
            $this->setSecretKey($data['secret_key']);
        }
        if (array_key_exists('api_key', $data)) {
            $this->setApiKey($data['api_key']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getXLogin(): string
    {
        return $this->fields['x_login'];
    }

    public function setXLogin(string $xLogin): static
    {
        $this->fields['x_login'] = $xLogin;

        return $this;
    }

    public function getXTranKey(): string
    {
        return $this->fields['x_tran_key'];
    }

    public function setXTranKey(string $xTranKey): static
    {
        $this->fields['x_tran_key'] = $xTranKey;

        return $this;
    }

    public function getSecretKey(): string
    {
        return $this->fields['secret_key'];
    }

    public function setSecretKey(string $secretKey): static
    {
        $this->fields['secret_key'] = $secretKey;

        return $this;
    }

    public function getApiKey(): ?string
    {
        return $this->fields['api_key'] ?? null;
    }

    public function setApiKey(null|string $apiKey): static
    {
        $this->fields['api_key'] = $apiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('x_login', $this->fields)) {
            $data['x_login'] = $this->fields['x_login'];
        }
        if (array_key_exists('x_tran_key', $this->fields)) {
            $data['x_tran_key'] = $this->fields['x_tran_key'];
        }
        if (array_key_exists('secret_key', $this->fields)) {
            $data['secret_key'] = $this->fields['secret_key'];
        }
        if (array_key_exists('api_key', $this->fields)) {
            $data['api_key'] = $this->fields['api_key'];
        }

        return $data;
    }
}
