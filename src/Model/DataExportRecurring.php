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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class DataExportRecurring implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('instruction', $data)) {
            $this->setInstruction($data['instruction']);
        }
        if (array_key_exists('start', $data)) {
            $this->setStart($data['start']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getInstruction(): string
    {
        return $this->fields['instruction'];
    }

    public function setInstruction(string $instruction): static
    {
        $this->fields['instruction'] = $instruction;

        return $this;
    }

    public function getStart(): ?DateTimeImmutable
    {
        return $this->fields['start'] ?? null;
    }

    public function setStart(null|DateTimeImmutable|string $start): static
    {
        if ($start !== null && !($start instanceof DateTimeImmutable)) {
            $start = new DateTimeImmutable($start);
        }

        $this->fields['start'] = $start;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('instruction', $this->fields)) {
            $data['instruction'] = $this->fields['instruction'];
        }
        if (array_key_exists('start', $this->fields)) {
            $data['start'] = $this->fields['start']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
