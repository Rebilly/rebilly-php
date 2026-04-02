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
use Rebilly\Sdk\Trait\HasMetadata;

class KonnektiveCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('loginId', $data)) {
            $this->setLoginId($data['loginId']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getLoginId(): string
    {
        return $this->fields['loginId'];
    }

    public function setLoginId(string $loginId): static
    {
        $this->fields['loginId'] = $loginId;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('loginId', $this->fields)) {
            $data['loginId'] = $this->fields['loginId'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }

        return $data;
    }
}
