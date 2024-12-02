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

class SubscriptionPlanRecurringInterval implements JsonSerializable
{
    public const UNIT_DAY = 'day';

    public const UNIT_WEEK = 'week';

    public const UNIT_MONTH = 'month';

    public const UNIT_YEAR = 'year';

    public const BILLING_TIMING_PREPAID = 'prepaid';

    public const BILLING_TIMING_POSTPAID = 'postpaid';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('periodAnchorInstruction', $data)) {
            $this->setPeriodAnchorInstruction($data['periodAnchorInstruction']);
        }
        if (array_key_exists('unit', $data)) {
            $this->setUnit($data['unit']);
        }
        if (array_key_exists('length', $data)) {
            $this->setLength($data['length']);
        }
        if (array_key_exists('limit', $data)) {
            $this->setLimit($data['limit']);
        }
        if (array_key_exists('billingTiming', $data)) {
            $this->setBillingTiming($data['billingTiming']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPeriodAnchorInstruction(): ?ServicePeriodAnchorInstruction
    {
        return $this->fields['periodAnchorInstruction'] ?? null;
    }

    public function setPeriodAnchorInstruction(null|ServicePeriodAnchorInstruction|array $periodAnchorInstruction): static
    {
        if ($periodAnchorInstruction !== null && !($periodAnchorInstruction instanceof ServicePeriodAnchorInstruction)) {
            $periodAnchorInstruction = ServicePeriodAnchorInstructionFactory::from($periodAnchorInstruction);
        }

        $this->fields['periodAnchorInstruction'] = $periodAnchorInstruction;

        return $this;
    }

    public function getUnit(): string
    {
        return $this->fields['unit'];
    }

    public function setUnit(string $unit): static
    {
        $this->fields['unit'] = $unit;

        return $this;
    }

    public function getLength(): int
    {
        return $this->fields['length'];
    }

    public function setLength(int $length): static
    {
        $this->fields['length'] = $length;

        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->fields['limit'] ?? null;
    }

    public function setLimit(null|int $limit): static
    {
        $this->fields['limit'] = $limit;

        return $this;
    }

    public function getBillingTiming(): ?string
    {
        return $this->fields['billingTiming'] ?? null;
    }

    public function setBillingTiming(null|string $billingTiming): static
    {
        $this->fields['billingTiming'] = $billingTiming;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('periodAnchorInstruction', $this->fields)) {
            $data['periodAnchorInstruction'] = $this->fields['periodAnchorInstruction']?->jsonSerialize();
        }
        if (array_key_exists('unit', $this->fields)) {
            $data['unit'] = $this->fields['unit'];
        }
        if (array_key_exists('length', $this->fields)) {
            $data['length'] = $this->fields['length'];
        }
        if (array_key_exists('limit', $this->fields)) {
            $data['limit'] = $this->fields['limit'];
        }
        if (array_key_exists('billingTiming', $this->fields)) {
            $data['billingTiming'] = $this->fields['billingTiming'];
        }

        return $data;
    }
}
