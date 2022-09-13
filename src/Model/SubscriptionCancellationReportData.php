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

class SubscriptionCancellationReportData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationValue', $data)) {
            $this->setAggregationValue($data['aggregationValue']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
        if (array_key_exists('averageLength', $data)) {
            $this->setAverageLength($data['averageLength']);
        }
        if (array_key_exists('medianLength', $data)) {
            $this->setMedianLength($data['medianLength']);
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

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    public function setCount(null|int $count): self
    {
        $this->fields['count'] = $count;

        return $this;
    }

    public function getAverageLength(): ?float
    {
        return $this->fields['averageLength'] ?? null;
    }

    public function setAverageLength(null|float|string $averageLength): self
    {
        if (is_string($averageLength)) {
            $averageLength = (float) $averageLength;
        }

        $this->fields['averageLength'] = $averageLength;

        return $this;
    }

    public function getMedianLength(): ?float
    {
        return $this->fields['medianLength'] ?? null;
    }

    public function setMedianLength(null|float|string $medianLength): self
    {
        if (is_string($medianLength)) {
            $medianLength = (float) $medianLength;
        }

        $this->fields['medianLength'] = $medianLength;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationValue', $this->fields)) {
            $data['aggregationValue'] = $this->fields['aggregationValue'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('averageLength', $this->fields)) {
            $data['averageLength'] = $this->fields['averageLength'];
        }
        if (array_key_exists('medianLength', $this->fields)) {
            $data['medianLength'] = $this->fields['medianLength'];
        }

        return $data;
    }
}
