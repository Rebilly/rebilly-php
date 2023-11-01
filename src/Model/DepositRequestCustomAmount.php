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

class DepositRequestCustomAmount implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('minimum', $data)) {
            $this->setMinimum($data['minimum']);
        }
        if (array_key_exists('multipleOf', $data)) {
            $this->setMultipleOf($data['multipleOf']);
        }
        if (array_key_exists('maximum', $data)) {
            $this->setMaximum($data['maximum']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMinimum(): float
    {
        return $this->fields['minimum'];
    }

    public function setMinimum(float|string $minimum): static
    {
        if (is_string($minimum)) {
            $minimum = (float) $minimum;
        }

        $this->fields['minimum'] = $minimum;

        return $this;
    }

    public function getMultipleOf(): float
    {
        return $this->fields['multipleOf'];
    }

    public function setMultipleOf(float|string $multipleOf): static
    {
        if (is_string($multipleOf)) {
            $multipleOf = (float) $multipleOf;
        }

        $this->fields['multipleOf'] = $multipleOf;

        return $this;
    }

    public function getMaximum(): float
    {
        return $this->fields['maximum'];
    }

    public function setMaximum(float|string $maximum): static
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
        if (array_key_exists('multipleOf', $this->fields)) {
            $data['multipleOf'] = $this->fields['multipleOf'];
        }
        if (array_key_exists('maximum', $this->fields)) {
            $data['maximum'] = $this->fields['maximum'];
        }

        return $data;
    }
}
