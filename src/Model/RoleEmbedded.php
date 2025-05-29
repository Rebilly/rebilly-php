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

class RoleEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('juniors', $data)) {
            $this->setJuniors($data['juniors']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getJuniors(): ?array
    {
        return $this->fields['juniors'] ?? null;
    }

    public function setJuniors(null|array $juniors): static
    {
        $this->fields['juniors'] = $juniors;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('juniors', $this->fields)) {
            $data['juniors'] = $this->fields['juniors'];
        }

        return $data;
    }
}
