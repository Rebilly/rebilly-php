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

class ProfileDashboard implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('dateRange', $data)) {
            $this->setDateRange($data['dateRange']);
        }
        if (array_key_exists('periodStart', $data)) {
            $this->setPeriodStart($data['periodStart']);
        }
        if (array_key_exists('periodEnd', $data)) {
            $this->setPeriodEnd($data['periodEnd']);
        }
        if (array_key_exists('tabs', $data)) {
            $this->setTabs($data['tabs']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getPeriodStart(): ?DateTimeImmutable
    {
        return $this->fields['periodStart'] ?? null;
    }

    public function getPeriodEnd(): ?DateTimeImmutable
    {
        return $this->fields['periodEnd'] ?? null;
    }

    /**
     * @return DashboardTab[]
     */
    public function getTabs(): array
    {
        return $this->fields['tabs'];
    }

    /**
     * @param array[]|DashboardTab[] $tabs
     */
    public function setTabs(array $tabs): static
    {
        $tabs = array_map(
            fn ($value) => $value instanceof DashboardTab ? $value : DashboardTab::from($value),
            $tabs,
        );

        $this->fields['tabs'] = $tabs;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('dateRange', $this->fields)) {
            $data['dateRange'] = $this->fields['dateRange'];
        }
        if (array_key_exists('periodStart', $this->fields)) {
            $data['periodStart'] = $this->fields['periodStart']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('periodEnd', $this->fields)) {
            $data['periodEnd'] = $this->fields['periodEnd']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('tabs', $this->fields)) {
            $data['tabs'] = array_map(
                static fn (DashboardTab $dashboardTab) => $dashboardTab->jsonSerialize(),
                $this->fields['tabs'],
            );
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
