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

class DccMarkupData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationValue', $data)) {
            $this->setAggregationValue($data['aggregationValue']);
        }
        if (array_key_exists('selectedCount', $data)) {
            $this->setSelectedCount($data['selectedCount']);
        }
        if (array_key_exists('selectedSum', $data)) {
            $this->setSelectedSum($data['selectedSum']);
        }
        if (array_key_exists('rejectedCount', $data)) {
            $this->setRejectedCount($data['rejectedCount']);
        }
        if (array_key_exists('rejectedSum', $data)) {
            $this->setRejectedSum($data['rejectedSum']);
        }
        if (array_key_exists('unknownCount', $data)) {
            $this->setUnknownCount($data['unknownCount']);
        }
        if (array_key_exists('unknownSum', $data)) {
            $this->setUnknownSum($data['unknownSum']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAggregationValue(): ?string
    {
        return $this->fields['aggregationValue'] ?? null;
    }

    public function setAggregationValue(null|string $aggregationValue): self
    {
        $this->fields['aggregationValue'] = $aggregationValue;

        return $this;
    }

    public function getSelectedCount(): ?int
    {
        return $this->fields['selectedCount'] ?? null;
    }

    public function setSelectedCount(null|int $selectedCount): self
    {
        $this->fields['selectedCount'] = $selectedCount;

        return $this;
    }

    public function getSelectedSum(): ?float
    {
        return $this->fields['selectedSum'] ?? null;
    }

    public function setSelectedSum(null|float|string $selectedSum): self
    {
        if (is_string($selectedSum)) {
            $selectedSum = (float) $selectedSum;
        }

        $this->fields['selectedSum'] = $selectedSum;

        return $this;
    }

    public function getRejectedCount(): ?int
    {
        return $this->fields['rejectedCount'] ?? null;
    }

    public function setRejectedCount(null|int $rejectedCount): self
    {
        $this->fields['rejectedCount'] = $rejectedCount;

        return $this;
    }

    public function getRejectedSum(): ?float
    {
        return $this->fields['rejectedSum'] ?? null;
    }

    public function setRejectedSum(null|float|string $rejectedSum): self
    {
        if (is_string($rejectedSum)) {
            $rejectedSum = (float) $rejectedSum;
        }

        $this->fields['rejectedSum'] = $rejectedSum;

        return $this;
    }

    public function getUnknownCount(): ?int
    {
        return $this->fields['unknownCount'] ?? null;
    }

    public function setUnknownCount(null|int $unknownCount): self
    {
        $this->fields['unknownCount'] = $unknownCount;

        return $this;
    }

    public function getUnknownSum(): ?float
    {
        return $this->fields['unknownSum'] ?? null;
    }

    public function setUnknownSum(null|float|string $unknownSum): self
    {
        if (is_string($unknownSum)) {
            $unknownSum = (float) $unknownSum;
        }

        $this->fields['unknownSum'] = $unknownSum;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationValue', $this->fields)) {
            $data['aggregationValue'] = $this->fields['aggregationValue'];
        }
        if (array_key_exists('selectedCount', $this->fields)) {
            $data['selectedCount'] = $this->fields['selectedCount'];
        }
        if (array_key_exists('selectedSum', $this->fields)) {
            $data['selectedSum'] = $this->fields['selectedSum'];
        }
        if (array_key_exists('rejectedCount', $this->fields)) {
            $data['rejectedCount'] = $this->fields['rejectedCount'];
        }
        if (array_key_exists('rejectedSum', $this->fields)) {
            $data['rejectedSum'] = $this->fields['rejectedSum'];
        }
        if (array_key_exists('unknownCount', $this->fields)) {
            $data['unknownCount'] = $this->fields['unknownCount'];
        }
        if (array_key_exists('unknownSum', $this->fields)) {
            $data['unknownSum'] = $this->fields['unknownSum'];
        }

        return $data;
    }
}
