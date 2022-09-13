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

class CumulativeSubscriptionsData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationValue', $data)) {
            $this->setAggregationValue($data['aggregationValue']);
        }
        if (array_key_exists('newCount', $data)) {
            $this->setNewCount($data['newCount']);
        }
        if (array_key_exists('canceledCount', $data)) {
            $this->setCanceledCount($data['canceledCount']);
        }
        if (array_key_exists('cumulativeCount', $data)) {
            $this->setCumulativeCount($data['cumulativeCount']);
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

    public function getNewCount(): ?int
    {
        return $this->fields['newCount'] ?? null;
    }

    public function setNewCount(null|int $newCount): self
    {
        $this->fields['newCount'] = $newCount;

        return $this;
    }

    public function getCanceledCount(): ?int
    {
        return $this->fields['canceledCount'] ?? null;
    }

    public function setCanceledCount(null|int $canceledCount): self
    {
        $this->fields['canceledCount'] = $canceledCount;

        return $this;
    }

    public function getCumulativeCount(): ?int
    {
        return $this->fields['cumulativeCount'] ?? null;
    }

    public function setCumulativeCount(null|int $cumulativeCount): self
    {
        $this->fields['cumulativeCount'] = $cumulativeCount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationValue', $this->fields)) {
            $data['aggregationValue'] = $this->fields['aggregationValue'];
        }
        if (array_key_exists('newCount', $this->fields)) {
            $data['newCount'] = $this->fields['newCount'];
        }
        if (array_key_exists('canceledCount', $this->fields)) {
            $data['canceledCount'] = $this->fields['canceledCount'];
        }
        if (array_key_exists('cumulativeCount', $this->fields)) {
            $data['cumulativeCount'] = $this->fields['cumulativeCount'];
        }

        return $data;
    }
}
