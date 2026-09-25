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
use Rebilly\Sdk\Trait\HasMetadata;

class DashboardTile implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('metric', $data)) {
            $this->setMetric($data['metric']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('dateRange', $data)) {
            $this->setDateRange($data['dateRange']);
        }
        if (array_key_exists('columnsWidth', $data)) {
            $this->setColumnsWidth($data['columnsWidth']);
        }
        if (array_key_exists('periodStart', $data)) {
            $this->setPeriodStart($data['periodStart']);
        }
        if (array_key_exists('periodEnd', $data)) {
            $this->setPeriodEnd($data['periodEnd']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMetric(): string
    {
        return $this->fields['metric'];
    }

    public function setMetric(string $metric): static
    {
        $this->fields['metric'] = $metric;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): static
    {
        $this->fields['title'] = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getDateRange(): ?string
    {
        return $this->fields['dateRange'] ?? null;
    }

    public function setDateRange(null|string $dateRange): static
    {
        $this->fields['dateRange'] = $dateRange;

        return $this;
    }

    public function getColumnsWidth(): ?int
    {
        return $this->fields['columnsWidth'] ?? null;
    }

    public function setColumnsWidth(null|int $columnsWidth): static
    {
        $this->fields['columnsWidth'] = $columnsWidth;

        return $this;
    }

    public function getPeriodStart(): ?DateTimeImmutable
    {
        return $this->fields['periodStart'] ?? null;
    }

    public function getPeriodEnd(): ?DateTimeImmutable
    {
        return $this->fields['periodEnd'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('metric', $this->fields)) {
            $data['metric'] = $this->fields['metric'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('dateRange', $this->fields)) {
            $data['dateRange'] = $this->fields['dateRange'];
        }
        if (array_key_exists('columnsWidth', $this->fields)) {
            $data['columnsWidth'] = $this->fields['columnsWidth'];
        }
        if (array_key_exists('periodStart', $this->fields)) {
            $data['periodStart'] = $this->fields['periodStart']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('periodEnd', $this->fields)) {
            $data['periodEnd'] = $this->fields['periodEnd']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setPeriodStart(null|DateTimeImmutable|string $periodStart): static
    {
        if ($periodStart !== null && !($periodStart instanceof DateTimeImmutable)) {
            $periodStart = new DateTimeImmutable($periodStart);
        }

        $this->fields['periodStart'] = $periodStart;

        return $this;
    }

    private function setPeriodEnd(null|DateTimeImmutable|string $periodEnd): static
    {
        if ($periodEnd !== null && !($periodEnd instanceof DateTimeImmutable)) {
            $periodEnd = new DateTimeImmutable($periodEnd);
        }

        $this->fields['periodEnd'] = $periodEnd;

        return $this;
    }
}
