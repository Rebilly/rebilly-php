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

class CashflowsCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('authId', $data)) {
            $this->setAuthId($data['authId']);
        }
        if (array_key_exists('authPassword', $data)) {
            $this->setAuthPassword($data['authPassword']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAuthId(): string
    {
        return $this->fields['authId'];
    }

    public function setAuthId(string $authId): static
    {
        $this->fields['authId'] = $authId;

        return $this;
    }

    public function getAuthPassword(): string
    {
        return $this->fields['authPassword'];
    }

    public function setAuthPassword(string $authPassword): static
    {
        $this->fields['authPassword'] = $authPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('authId', $this->fields)) {
            $data['authId'] = $this->fields['authId'];
        }
        if (array_key_exists('authPassword', $this->fields)) {
            $data['authPassword'] = $this->fields['authPassword'];
        }

        return $data;
    }
}
