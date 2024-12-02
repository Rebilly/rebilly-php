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

class CardknoxCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('xKey', $data)) {
            $this->setXKey($data['xKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getXKey(): string
    {
        return $this->fields['xKey'];
    }

    public function setXKey(string $xKey): static
    {
        $this->fields['xKey'] = $xKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('xKey', $this->fields)) {
            $data['xKey'] = $this->fields['xKey'];
        }

        return $data;
    }
}
