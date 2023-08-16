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

class DropaymentCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('login', $data)) {
            $this->setLogin($data['login']);
        }
        if (array_key_exists('endpointId', $data)) {
            $this->setEndpointId($data['endpointId']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
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

    public function getEndpointId(): string
    {
        return $this->fields['endpointId'];
    }

    public function setEndpointId(string $endpointId): static
    {
        $this->fields['endpointId'] = $endpointId;

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
        if (array_key_exists('login', $this->fields)) {
            $data['login'] = $this->fields['login'];
        }
        if (array_key_exists('endpointId', $this->fields)) {
            $data['endpointId'] = $this->fields['endpointId'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }

        return $data;
    }
}
