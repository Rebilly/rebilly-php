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

class PayCashCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('emisor', $data)) {
            $this->setEmisor($data['emisor']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEmisor(): string
    {
        return $this->fields['emisor'];
    }

    public function setEmisor(string $emisor): self
    {
        $this->fields['emisor'] = $emisor;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('emisor', $this->fields)) {
            $data['emisor'] = $this->fields['emisor'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }

        return $data;
    }
}
