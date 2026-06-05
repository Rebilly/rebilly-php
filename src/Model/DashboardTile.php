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
        if (array_key_exists('dateRange', $data)) {
            $this->setDateRange($data['dateRange']);
        }
        if (array_key_exists('columnsWidth', $data)) {
            $this->setColumnsWidth($data['columnsWidth']);
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('metric', $this->fields)) {
            $data['metric'] = $this->fields['metric'];
        }
        if (array_key_exists('dateRange', $this->fields)) {
            $data['dateRange'] = $this->fields['dateRange'];
        }
        if (array_key_exists('columnsWidth', $this->fields)) {
            $data['columnsWidth'] = $this->fields['columnsWidth'];
        }

        return $data;
    }
}
