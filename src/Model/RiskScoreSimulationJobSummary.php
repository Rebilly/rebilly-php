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

class RiskScoreSimulationJobSummary implements JsonSerializable
{
    public const METRIC_PROCESSED_TRANSACTIONS = 'processedTransactions';

    public const METRIC_AFFECTED_TRANSACTIONS = 'affectedTransactions';

    public const METRIC_DECLINED_TO_CANCELED_TRANSACTIONS = 'declinedToCanceledTransactions';

    public const METRIC_CANCELED_TO_APPROVED_TRANSACTIONS = 'canceledToApprovedTransactions';

    public const METRIC_APPROVED_TO_CANCELED_TRANSACTIONS = 'approvedToCanceledTransactions';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('metric', $data)) {
            $this->setMetric($data['metric']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMetric(): ?string
    {
        return $this->fields['metric'] ?? null;
    }

    public function setMetric(null|string $metric): static
    {
        $this->fields['metric'] = $metric;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    public function setCount(null|int $count): static
    {
        $this->fields['count'] = $count;

        return $this;
    }

    public function getAmount(): ?Money
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|Money|array $amount): static
    {
        if ($amount !== null && !($amount instanceof Money)) {
            $amount = Money::from($amount);
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('metric', $this->fields)) {
            $data['metric'] = $this->fields['metric'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount']?->jsonSerialize();
        }

        return $data;
    }
}
