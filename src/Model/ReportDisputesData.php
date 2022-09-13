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

class ReportDisputesData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationValue', $data)) {
            $this->setAggregationValue($data['aggregationValue']);
        }
        if (array_key_exists('countVisa', $data)) {
            $this->setCountVisa($data['countVisa']);
        }
        if (array_key_exists('ratioCountVisa', $data)) {
            $this->setRatioCountVisa($data['ratioCountVisa']);
        }
        if (array_key_exists('ratioAmountVisa', $data)) {
            $this->setRatioAmountVisa($data['ratioAmountVisa']);
        }
        if (array_key_exists('countMastercard', $data)) {
            $this->setCountMastercard($data['countMastercard']);
        }
        if (array_key_exists('ratioCountMastercard', $data)) {
            $this->setRatioCountMastercard($data['ratioCountMastercard']);
        }
        if (array_key_exists('ratioAmountMastercard', $data)) {
            $this->setRatioAmountMastercard($data['ratioAmountMastercard']);
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

    public function getCountVisa(): ?int
    {
        return $this->fields['countVisa'] ?? null;
    }

    public function setCountVisa(null|int $countVisa): self
    {
        $this->fields['countVisa'] = $countVisa;

        return $this;
    }

    public function getRatioCountVisa(): ?float
    {
        return $this->fields['ratioCountVisa'] ?? null;
    }

    public function setRatioCountVisa(null|float|string $ratioCountVisa): self
    {
        if (is_string($ratioCountVisa)) {
            $ratioCountVisa = (float) $ratioCountVisa;
        }

        $this->fields['ratioCountVisa'] = $ratioCountVisa;

        return $this;
    }

    public function getRatioAmountVisa(): ?float
    {
        return $this->fields['ratioAmountVisa'] ?? null;
    }

    public function setRatioAmountVisa(null|float|string $ratioAmountVisa): self
    {
        if (is_string($ratioAmountVisa)) {
            $ratioAmountVisa = (float) $ratioAmountVisa;
        }

        $this->fields['ratioAmountVisa'] = $ratioAmountVisa;

        return $this;
    }

    public function getCountMastercard(): ?int
    {
        return $this->fields['countMastercard'] ?? null;
    }

    public function setCountMastercard(null|int $countMastercard): self
    {
        $this->fields['countMastercard'] = $countMastercard;

        return $this;
    }

    public function getRatioCountMastercard(): ?float
    {
        return $this->fields['ratioCountMastercard'] ?? null;
    }

    public function setRatioCountMastercard(null|float|string $ratioCountMastercard): self
    {
        if (is_string($ratioCountMastercard)) {
            $ratioCountMastercard = (float) $ratioCountMastercard;
        }

        $this->fields['ratioCountMastercard'] = $ratioCountMastercard;

        return $this;
    }

    public function getRatioAmountMastercard(): ?float
    {
        return $this->fields['ratioAmountMastercard'] ?? null;
    }

    public function setRatioAmountMastercard(null|float|string $ratioAmountMastercard): self
    {
        if (is_string($ratioAmountMastercard)) {
            $ratioAmountMastercard = (float) $ratioAmountMastercard;
        }

        $this->fields['ratioAmountMastercard'] = $ratioAmountMastercard;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationValue', $this->fields)) {
            $data['aggregationValue'] = $this->fields['aggregationValue'];
        }
        if (array_key_exists('countVisa', $this->fields)) {
            $data['countVisa'] = $this->fields['countVisa'];
        }
        if (array_key_exists('ratioCountVisa', $this->fields)) {
            $data['ratioCountVisa'] = $this->fields['ratioCountVisa'];
        }
        if (array_key_exists('ratioAmountVisa', $this->fields)) {
            $data['ratioAmountVisa'] = $this->fields['ratioAmountVisa'];
        }
        if (array_key_exists('countMastercard', $this->fields)) {
            $data['countMastercard'] = $this->fields['countMastercard'];
        }
        if (array_key_exists('ratioCountMastercard', $this->fields)) {
            $data['ratioCountMastercard'] = $this->fields['ratioCountMastercard'];
        }
        if (array_key_exists('ratioAmountMastercard', $this->fields)) {
            $data['ratioAmountMastercard'] = $this->fields['ratioAmountMastercard'];
        }

        return $data;
    }
}
