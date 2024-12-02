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

class IntuitCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('clientSecret', $data)) {
            $this->setClientSecret($data['clientSecret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getClientId(): string
    {
        return $this->fields['clientId'];
    }

    public function setClientId(string $clientId): static
    {
        $this->fields['clientId'] = $clientId;

        return $this;
    }

    public function getClientSecret(): string
    {
        return $this->fields['clientSecret'];
    }

    public function setClientSecret(string $clientSecret): static
    {
        $this->fields['clientSecret'] = $clientSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('clientSecret', $this->fields)) {
            $data['clientSecret'] = $this->fields['clientSecret'];
        }

        return $data;
    }
}
