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

class DashboardResponseSegments implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
        if (array_key_exists('previousValue', $data)) {
            $this->setPreviousValue($data['previousValue']);
        }
        if (array_key_exists('humanValue', $data)) {
            $this->setHumanValue($data['humanValue']);
        }
        if (array_key_exists('changeRatio', $data)) {
            $this->setChangeRatio($data['changeRatio']);
        }
        if (array_key_exists('humanChangeRatio', $data)) {
            $this->setHumanChangeRatio($data['humanChangeRatio']);
        }
        if (array_key_exists('timeseries', $data)) {
            $this->setTimeseries($data['timeseries']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->fields['value'] ?? null;
    }

    public function setValue(null|float|string $value): static
    {
        if (is_string($value)) {
            $value = (float) $value;
        }

        $this->fields['value'] = $value;

        return $this;
    }

    public function getPreviousValue(): ?float
    {
        return $this->fields['previousValue'] ?? null;
    }

    public function setPreviousValue(null|float|string $previousValue): static
    {
        if (is_string($previousValue)) {
            $previousValue = (float) $previousValue;
        }

        $this->fields['previousValue'] = $previousValue;

        return $this;
    }

    public function getHumanValue(): ?string
    {
        return $this->fields['humanValue'] ?? null;
    }

    public function setHumanValue(null|string $humanValue): static
    {
        $this->fields['humanValue'] = $humanValue;

        return $this;
    }

    public function getChangeRatio(): ?float
    {
        return $this->fields['changeRatio'] ?? null;
    }

    public function setChangeRatio(null|float|string $changeRatio): static
    {
        if (is_string($changeRatio)) {
            $changeRatio = (float) $changeRatio;
        }

        $this->fields['changeRatio'] = $changeRatio;

        return $this;
    }

    public function getHumanChangeRatio(): ?string
    {
        return $this->fields['humanChangeRatio'] ?? null;
    }

    public function setHumanChangeRatio(null|string $humanChangeRatio): static
    {
        $this->fields['humanChangeRatio'] = $humanChangeRatio;

        return $this;
    }

    /**
     * @return null|DashboardResponseSegmentsTimeseries[]
     */
    public function getTimeseries(): ?array
    {
        return $this->fields['timeseries'] ?? null;
    }

    /**
     * @param null|array[]|DashboardResponseSegmentsTimeseries[] $timeseries
     */
    public function setTimeseries(null|array $timeseries): static
    {
        $timeseries = $timeseries !== null ? array_map(
            fn ($value) => $value instanceof DashboardResponseSegmentsTimeseries ? $value : DashboardResponseSegmentsTimeseries::from($value),
            $timeseries,
        ) : null;

        $this->fields['timeseries'] = $timeseries;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }
        if (array_key_exists('previousValue', $this->fields)) {
            $data['previousValue'] = $this->fields['previousValue'];
        }
        if (array_key_exists('humanValue', $this->fields)) {
            $data['humanValue'] = $this->fields['humanValue'];
        }
        if (array_key_exists('changeRatio', $this->fields)) {
            $data['changeRatio'] = $this->fields['changeRatio'];
        }
        if (array_key_exists('humanChangeRatio', $this->fields)) {
            $data['humanChangeRatio'] = $this->fields['humanChangeRatio'];
        }
        if (array_key_exists('timeseries', $this->fields)) {
            $data['timeseries'] = $this->fields['timeseries'] !== null
                ? array_map(
                    static fn (DashboardResponseSegmentsTimeseries $dashboardResponseSegmentsTimeseries) => $dashboardResponseSegmentsTimeseries->jsonSerialize(),
                    $this->fields['timeseries'],
                )
                : null;
        }

        return $data;
    }
}
