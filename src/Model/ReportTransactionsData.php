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

class ReportTransactionsData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationFieldValue', $data)) {
            $this->setAggregationFieldValue($data['aggregationFieldValue']);
        }
        if (array_key_exists('authApprovedThroughput', $data)) {
            $this->setAuthApprovedThroughput($data['authApprovedThroughput']);
        }
        if (array_key_exists('approvedThroughput', $data)) {
            $this->setApprovedThroughput($data['approvedThroughput']);
        }
        if (array_key_exists('authApprovalCount', $data)) {
            $this->setAuthApprovalCount($data['authApprovalCount']);
        }
        if (array_key_exists('disputesRate', $data)) {
            $this->setDisputesRate($data['disputesRate']);
        }
        if (array_key_exists('disputesCount', $data)) {
            $this->setDisputesCount($data['disputesCount']);
        }
        if (array_key_exists('salesCount', $data)) {
            $this->setSalesCount($data['salesCount']);
        }
        if (array_key_exists('salesValue', $data)) {
            $this->setSalesValue($data['salesValue']);
        }
        if (array_key_exists('salesAverage', $data)) {
            $this->setSalesAverage($data['salesAverage']);
        }
        if (array_key_exists('refundsCount', $data)) {
            $this->setRefundsCount($data['refundsCount']);
        }
        if (array_key_exists('refundsValue', $data)) {
            $this->setRefundsValue($data['refundsValue']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
        if (array_key_exists('unapprovedCount', $data)) {
            $this->setUnapprovedCount($data['unapprovedCount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAggregationFieldValue(): ?string
    {
        return $this->fields['aggregationFieldValue'] ?? null;
    }

    public function setAggregationFieldValue(null|string $aggregationFieldValue): static
    {
        $this->fields['aggregationFieldValue'] = $aggregationFieldValue;

        return $this;
    }

    public function getAuthApprovedThroughput(): ?float
    {
        return $this->fields['authApprovedThroughput'] ?? null;
    }

    public function setAuthApprovedThroughput(null|float|string $authApprovedThroughput): static
    {
        if (is_string($authApprovedThroughput)) {
            $authApprovedThroughput = (float) $authApprovedThroughput;
        }

        $this->fields['authApprovedThroughput'] = $authApprovedThroughput;

        return $this;
    }

    public function getApprovedThroughput(): ?float
    {
        return $this->fields['approvedThroughput'] ?? null;
    }

    public function setApprovedThroughput(null|float|string $approvedThroughput): static
    {
        if (is_string($approvedThroughput)) {
            $approvedThroughput = (float) $approvedThroughput;
        }

        $this->fields['approvedThroughput'] = $approvedThroughput;

        return $this;
    }

    public function getAuthApprovalCount(): ?int
    {
        return $this->fields['authApprovalCount'] ?? null;
    }

    public function setAuthApprovalCount(null|int $authApprovalCount): static
    {
        $this->fields['authApprovalCount'] = $authApprovalCount;

        return $this;
    }

    public function getDisputesRate(): ?float
    {
        return $this->fields['disputesRate'] ?? null;
    }

    public function setDisputesRate(null|float|string $disputesRate): static
    {
        if (is_string($disputesRate)) {
            $disputesRate = (float) $disputesRate;
        }

        $this->fields['disputesRate'] = $disputesRate;

        return $this;
    }

    public function getDisputesCount(): ?int
    {
        return $this->fields['disputesCount'] ?? null;
    }

    public function setDisputesCount(null|int $disputesCount): static
    {
        $this->fields['disputesCount'] = $disputesCount;

        return $this;
    }

    public function getSalesCount(): ?int
    {
        return $this->fields['salesCount'] ?? null;
    }

    public function setSalesCount(null|int $salesCount): static
    {
        $this->fields['salesCount'] = $salesCount;

        return $this;
    }

    public function getSalesValue(): ?float
    {
        return $this->fields['salesValue'] ?? null;
    }

    public function setSalesValue(null|float|string $salesValue): static
    {
        if (is_string($salesValue)) {
            $salesValue = (float) $salesValue;
        }

        $this->fields['salesValue'] = $salesValue;

        return $this;
    }

    public function getSalesAverage(): ?float
    {
        return $this->fields['salesAverage'] ?? null;
    }

    public function setSalesAverage(null|float|string $salesAverage): static
    {
        if (is_string($salesAverage)) {
            $salesAverage = (float) $salesAverage;
        }

        $this->fields['salesAverage'] = $salesAverage;

        return $this;
    }

    public function getRefundsCount(): ?int
    {
        return $this->fields['refundsCount'] ?? null;
    }

    public function setRefundsCount(null|int $refundsCount): static
    {
        $this->fields['refundsCount'] = $refundsCount;

        return $this;
    }

    public function getRefundsValue(): ?float
    {
        return $this->fields['refundsValue'] ?? null;
    }

    public function setRefundsValue(null|float|string $refundsValue): static
    {
        if (is_string($refundsValue)) {
            $refundsValue = (float) $refundsValue;
        }

        $this->fields['refundsValue'] = $refundsValue;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getCount(): ?float
    {
        return $this->fields['count'] ?? null;
    }

    public function setCount(null|float|string $count): static
    {
        if (is_string($count)) {
            $count = (float) $count;
        }

        $this->fields['count'] = $count;

        return $this;
    }

    public function getUnapprovedCount(): ?float
    {
        return $this->fields['unapprovedCount'] ?? null;
    }

    public function setUnapprovedCount(null|float|string $unapprovedCount): static
    {
        if (is_string($unapprovedCount)) {
            $unapprovedCount = (float) $unapprovedCount;
        }

        $this->fields['unapprovedCount'] = $unapprovedCount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationFieldValue', $this->fields)) {
            $data['aggregationFieldValue'] = $this->fields['aggregationFieldValue'];
        }
        if (array_key_exists('authApprovedThroughput', $this->fields)) {
            $data['authApprovedThroughput'] = $this->fields['authApprovedThroughput'];
        }
        if (array_key_exists('approvedThroughput', $this->fields)) {
            $data['approvedThroughput'] = $this->fields['approvedThroughput'];
        }
        if (array_key_exists('authApprovalCount', $this->fields)) {
            $data['authApprovalCount'] = $this->fields['authApprovalCount'];
        }
        if (array_key_exists('disputesRate', $this->fields)) {
            $data['disputesRate'] = $this->fields['disputesRate'];
        }
        if (array_key_exists('disputesCount', $this->fields)) {
            $data['disputesCount'] = $this->fields['disputesCount'];
        }
        if (array_key_exists('salesCount', $this->fields)) {
            $data['salesCount'] = $this->fields['salesCount'];
        }
        if (array_key_exists('salesValue', $this->fields)) {
            $data['salesValue'] = $this->fields['salesValue'];
        }
        if (array_key_exists('salesAverage', $this->fields)) {
            $data['salesAverage'] = $this->fields['salesAverage'];
        }
        if (array_key_exists('refundsCount', $this->fields)) {
            $data['refundsCount'] = $this->fields['refundsCount'];
        }
        if (array_key_exists('refundsValue', $this->fields)) {
            $data['refundsValue'] = $this->fields['refundsValue'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('unapprovedCount', $this->fields)) {
            $data['unapprovedCount'] = $this->fields['unapprovedCount'];
        }

        return $data;
    }
}
