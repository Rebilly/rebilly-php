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

class EddScore implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('occupation', $data)) {
            $this->setOccupation($data['occupation']);
        }
        if (array_key_exists('arrest', $data)) {
            $this->setArrest($data['arrest']);
        }
        if (array_key_exists('bankruptcy', $data)) {
            $this->setBankruptcy($data['bankruptcy']);
        }
        if (array_key_exists('fraud', $data)) {
            $this->setFraud($data['fraud']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOccupation(): ?string
    {
        return $this->fields['occupation'] ?? null;
    }

    public function setOccupation(null|string $occupation): static
    {
        $this->fields['occupation'] = $occupation;

        return $this;
    }

    public function getArrest(): ?string
    {
        return $this->fields['arrest'] ?? null;
    }

    public function setArrest(null|string $arrest): static
    {
        $this->fields['arrest'] = $arrest;

        return $this;
    }

    public function getBankruptcy(): ?string
    {
        return $this->fields['bankruptcy'] ?? null;
    }

    public function setBankruptcy(null|string $bankruptcy): static
    {
        $this->fields['bankruptcy'] = $bankruptcy;

        return $this;
    }

    public function getFraud(): ?string
    {
        return $this->fields['fraud'] ?? null;
    }

    public function setFraud(null|string $fraud): static
    {
        $this->fields['fraud'] = $fraud;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('occupation', $this->fields)) {
            $data['occupation'] = $this->fields['occupation'];
        }
        if (array_key_exists('arrest', $this->fields)) {
            $data['arrest'] = $this->fields['arrest'];
        }
        if (array_key_exists('bankruptcy', $this->fields)) {
            $data['bankruptcy'] = $this->fields['bankruptcy'];
        }
        if (array_key_exists('fraud', $this->fields)) {
            $data['fraud'] = $this->fields['fraud'];
        }

        return $data;
    }
}
