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

class LimepayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('xLogin', $data)) {
            $this->setXLogin($data['xLogin']);
        }
        if (array_key_exists('xTransKey', $data)) {
            $this->setXTransKey($data['xTransKey']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getXLogin(): string
    {
        return $this->fields['xLogin'];
    }

    public function setXLogin(string $xLogin): static
    {
        $this->fields['xLogin'] = $xLogin;

        return $this;
    }

    public function getXTransKey(): string
    {
        return $this->fields['xTransKey'];
    }

    public function setXTransKey(string $xTransKey): static
    {
        $this->fields['xTransKey'] = $xTransKey;

        return $this;
    }

    public function getSecretKey(): string
    {
        return $this->fields['secretKey'];
    }

    public function setSecretKey(string $secretKey): static
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('xLogin', $this->fields)) {
            $data['xLogin'] = $this->fields['xLogin'];
        }
        if (array_key_exists('xTransKey', $this->fields)) {
            $data['xTransKey'] = $this->fields['xTransKey'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }

        return $data;
    }
}
