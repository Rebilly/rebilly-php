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

class EddData implements JsonSerializable
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

    public function getOccupation(): ?EddScore
    {
        return $this->fields['occupation'] ?? null;
    }

    public function setOccupation(null|EddScore|string $occupation): static
    {
        if ($occupation !== null && !($occupation instanceof EddScore)) {
            $occupation = EddScore::from($occupation);
        }

        $this->fields['occupation'] = $occupation;

        return $this;
    }

    public function getArrest(): ?EddScore
    {
        return $this->fields['arrest'] ?? null;
    }

    public function setArrest(null|EddScore|string $arrest): static
    {
        if ($arrest !== null && !($arrest instanceof EddScore)) {
            $arrest = EddScore::from($arrest);
        }

        $this->fields['arrest'] = $arrest;

        return $this;
    }

    public function getBankruptcy(): ?EddScore
    {
        return $this->fields['bankruptcy'] ?? null;
    }

    public function setBankruptcy(null|EddScore|string $bankruptcy): static
    {
        if ($bankruptcy !== null && !($bankruptcy instanceof EddScore)) {
            $bankruptcy = EddScore::from($bankruptcy);
        }

        $this->fields['bankruptcy'] = $bankruptcy;

        return $this;
    }

    public function getFraud(): ?EddScore
    {
        return $this->fields['fraud'] ?? null;
    }

    public function setFraud(null|EddScore|string $fraud): static
    {
        if ($fraud !== null && !($fraud instanceof EddScore)) {
            $fraud = EddScore::from($fraud);
        }

        $this->fields['fraud'] = $fraud;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('occupation', $this->fields)) {
            $data['occupation'] = $this->fields['occupation']?->value;
        }
        if (array_key_exists('arrest', $this->fields)) {
            $data['arrest'] = $this->fields['arrest']?->value;
        }
        if (array_key_exists('bankruptcy', $this->fields)) {
            $data['bankruptcy'] = $this->fields['bankruptcy']?->value;
        }
        if (array_key_exists('fraud', $this->fields)) {
            $data['fraud'] = $this->fields['fraud']?->value;
        }

        return $data;
    }
}
