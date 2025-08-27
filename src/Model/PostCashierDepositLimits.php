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

class PostCashierDepositLimits implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('minimum', $data)) {
            $this->setMinimum($data['minimum']);
        }
        if (array_key_exists('maximum', $data)) {
            $this->setMaximum($data['maximum']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMinimum(): ?float
    {
        return $this->fields['minimum'] ?? null;
    }

    public function setMinimum(null|float|string $minimum): static
    {
        if (is_string($minimum)) {
            $minimum = (float) $minimum;
        }

        $this->fields['minimum'] = $minimum;

        return $this;
    }

    public function getMaximum(): ?float
    {
        return $this->fields['maximum'] ?? null;
    }

    public function setMaximum(null|float|string $maximum): static
    {
        if (is_string($maximum)) {
            $maximum = (float) $maximum;
        }

        $this->fields['maximum'] = $maximum;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('minimum', $this->fields)) {
            $data['minimum'] = $this->fields['minimum'];
        }
        if (array_key_exists('maximum', $this->fields)) {
            $data['maximum'] = $this->fields['maximum'];
        }

        return $data;
    }
}
