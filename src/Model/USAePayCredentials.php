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

class USAePayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('sourceKey', $data)) {
            $this->setSourceKey($data['sourceKey']);
        }
        if (array_key_exists('pin', $data)) {
            $this->setPin($data['pin']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSourceKey(): string
    {
        return $this->fields['sourceKey'];
    }

    public function setSourceKey(string $sourceKey): static
    {
        $this->fields['sourceKey'] = $sourceKey;

        return $this;
    }

    public function getPin(): string
    {
        return $this->fields['pin'];
    }

    public function setPin(string $pin): static
    {
        $this->fields['pin'] = $pin;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sourceKey', $this->fields)) {
            $data['sourceKey'] = $this->fields['sourceKey'];
        }
        if (array_key_exists('pin', $this->fields)) {
            $data['pin'] = $this->fields['pin'];
        }

        return $data;
    }
}
