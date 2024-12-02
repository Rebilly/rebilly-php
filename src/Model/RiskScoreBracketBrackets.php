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

class RiskScoreBracketBrackets implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('start', $data)) {
            $this->setStart($data['start']);
        }
        if (array_key_exists('end', $data)) {
            $this->setEnd($data['end']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStart(): int
    {
        return $this->fields['start'];
    }

    public function setStart(int $start): static
    {
        $this->fields['start'] = $start;

        return $this;
    }

    public function getEnd(): int
    {
        return $this->fields['end'];
    }

    public function setEnd(int $end): static
    {
        $this->fields['end'] = $end;

        return $this;
    }

    public function getValue(): int
    {
        return $this->fields['value'];
    }

    public function setValue(int $value): static
    {
        $this->fields['value'] = $value;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('start', $this->fields)) {
            $data['start'] = $this->fields['start'];
        }
        if (array_key_exists('end', $this->fields)) {
            $data['end'] = $this->fields['end'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }

        return $data;
    }
}
