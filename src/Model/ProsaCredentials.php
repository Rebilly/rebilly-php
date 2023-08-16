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

class ProsaCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('entityId', $data)) {
            $this->setEntityId($data['entityId']);
        }
        if (array_key_exists('accessToken', $data)) {
            $this->setAccessToken($data['accessToken']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEntityId(): string
    {
        return $this->fields['entityId'];
    }

    public function setEntityId(string $entityId): static
    {
        $this->fields['entityId'] = $entityId;

        return $this;
    }

    public function getAccessToken(): string
    {
        return $this->fields['accessToken'];
    }

    public function setAccessToken(string $accessToken): static
    {
        $this->fields['accessToken'] = $accessToken;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('entityId', $this->fields)) {
            $data['entityId'] = $this->fields['entityId'];
        }
        if (array_key_exists('accessToken', $this->fields)) {
            $data['accessToken'] = $this->fields['accessToken'];
        }

        return $data;
    }
}
