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

class RPNCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('mid', $data)) {
            $this->setMid($data['mid']);
        }
        if (array_key_exists('key', $data)) {
            $this->setKey($data['key']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMid(): string
    {
        return $this->fields['mid'];
    }

    public function setMid(string $mid): static
    {
        $this->fields['mid'] = $mid;

        return $this;
    }

    public function getKey(): string
    {
        return $this->fields['key'];
    }

    public function setKey(string $key): static
    {
        $this->fields['key'] = $key;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('mid', $this->fields)) {
            $data['mid'] = $this->fields['mid'];
        }
        if (array_key_exists('key', $this->fields)) {
            $data['key'] = $this->fields['key'];
        }

        return $data;
    }
}
