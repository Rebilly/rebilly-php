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

class InvoicesDataExportDateRange implements JsonSerializable
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
        if (array_key_exists('field', $data)) {
            $this->setField($data['field']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStart(): string
    {
        return $this->fields['start'];
    }

    public function setStart(string $start): static
    {
        $this->fields['start'] = $start;

        return $this;
    }

    public function getEnd(): string
    {
        return $this->fields['end'];
    }

    public function setEnd(string $end): static
    {
        $this->fields['end'] = $end;

        return $this;
    }

    public function getField(): ?string
    {
        return $this->fields['field'] ?? null;
    }

    public function setField(null|string $field): static
    {
        $this->fields['field'] = $field;

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
        if (array_key_exists('field', $this->fields)) {
            $data['field'] = $this->fields['field'];
        }

        return $data;
    }
}
