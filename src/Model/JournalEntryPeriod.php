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
use JsonSerializable;

class JournalEntryPeriod implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('startDate', $data)) {
            $this->setStartDate($data['startDate']);
        }
        if (array_key_exists('endDate', $data)) {
            $this->setEndDate($data['endDate']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStartDate(): ?DateTimeImmutable
    {
        return $this->fields['startDate'] ?? null;
    }

    public function setStartDate(null|DateTimeImmutable|string $startDate): static
    {
        if ($startDate !== null && !($startDate instanceof DateTimeImmutable)) {
            $startDate = new DateTimeImmutable($startDate);
        }

        $this->fields['startDate'] = $startDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeImmutable
    {
        return $this->fields['endDate'] ?? null;
    }

    public function setEndDate(null|DateTimeImmutable|string $endDate): static
    {
        if ($endDate !== null && !($endDate instanceof DateTimeImmutable)) {
            $endDate = new DateTimeImmutable($endDate);
        }

        $this->fields['endDate'] = $endDate;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('startDate', $this->fields)) {
            $data['startDate'] = $this->fields['startDate']?->format('Y-m-d');
        }
        if (array_key_exists('endDate', $this->fields)) {
            $data['endDate'] = $this->fields['endDate']?->format('Y-m-d');
        }

        return $data;
    }
}
