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

class Pin4PayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('requestOrigin', $data)) {
            $this->setRequestOrigin($data['requestOrigin']);
        }
        if (array_key_exists('codigoCliente', $data)) {
            $this->setCodigoCliente($data['codigoCliente']);
        }
        if (array_key_exists('keyValue', $data)) {
            $this->setKeyValue($data['keyValue']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUsername(): string
    {
        return $this->fields['username'];
    }

    public function setUsername(string $username): self
    {
        $this->fields['username'] = $username;

        return $this;
    }

    public function getRequestOrigin(): string
    {
        return $this->fields['requestOrigin'];
    }

    public function setRequestOrigin(string $requestOrigin): self
    {
        $this->fields['requestOrigin'] = $requestOrigin;

        return $this;
    }

    public function getCodigoCliente(): string
    {
        return $this->fields['codigoCliente'];
    }

    public function setCodigoCliente(string $codigoCliente): self
    {
        $this->fields['codigoCliente'] = $codigoCliente;

        return $this;
    }

    public function getKeyValue(): string
    {
        return $this->fields['keyValue'];
    }

    public function setKeyValue(string $keyValue): self
    {
        $this->fields['keyValue'] = $keyValue;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('requestOrigin', $this->fields)) {
            $data['requestOrigin'] = $this->fields['requestOrigin'];
        }
        if (array_key_exists('codigoCliente', $this->fields)) {
            $data['codigoCliente'] = $this->fields['codigoCliente'];
        }
        if (array_key_exists('keyValue', $this->fields)) {
            $data['keyValue'] = $this->fields['keyValue'];
        }

        return $data;
    }
}
