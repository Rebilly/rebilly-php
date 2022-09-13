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

class GetKycAcceptanceSummaryResponseData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('documentType', $data)) {
            $this->setDocumentType($data['documentType']);
        }
        if (array_key_exists('statusStatistics', $data)) {
            $this->setStatusStatistics($data['statusStatistics']);
        }
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
        if (array_key_exists('accuracyRate', $data)) {
            $this->setAccuracyRate($data['accuracyRate']);
        }
        if (array_key_exists('acceptanceRate', $data)) {
            $this->setAcceptanceRate($data['acceptanceRate']);
        }
        if (array_key_exists('manualReviewTime', $data)) {
            $this->setManualReviewTime($data['manualReviewTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDocumentType(): mixed
    {
        return $this->fields['documentType'] ?? null;
    }

    public function setDocumentType(mixed $documentType): self
    {
        $this->fields['documentType'] = $documentType;

        return $this;
    }

    public function getStatusStatistics(): ?GetKycAcceptanceSummaryResponseStatusStatistics
    {
        return $this->fields['statusStatistics'] ?? null;
    }

    public function setStatusStatistics(null|GetKycAcceptanceSummaryResponseStatusStatistics|array $statusStatistics): self
    {
        if ($statusStatistics !== null && !($statusStatistics instanceof GetKycAcceptanceSummaryResponseStatusStatistics)) {
            $statusStatistics = GetKycAcceptanceSummaryResponseStatusStatistics::from($statusStatistics);
        }

        $this->fields['statusStatistics'] = $statusStatistics;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->fields['total'] ?? null;
    }

    public function setTotal(null|int $total): self
    {
        $this->fields['total'] = $total;

        return $this;
    }

    public function getAccuracyRate(): ?float
    {
        return $this->fields['accuracyRate'] ?? null;
    }

    public function setAccuracyRate(null|float $accuracyRate): self
    {
        $this->fields['accuracyRate'] = $accuracyRate;

        return $this;
    }

    public function getAcceptanceRate(): ?float
    {
        return $this->fields['acceptanceRate'] ?? null;
    }

    public function setAcceptanceRate(null|float $acceptanceRate): self
    {
        $this->fields['acceptanceRate'] = $acceptanceRate;

        return $this;
    }

    public function getManualReviewTime(): ?float
    {
        return $this->fields['manualReviewTime'] ?? null;
    }

    public function setManualReviewTime(null|float $manualReviewTime): self
    {
        $this->fields['manualReviewTime'] = $manualReviewTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('documentType', $this->fields)) {
            $data['documentType'] = $this->fields['documentType'];
        }
        if (array_key_exists('statusStatistics', $this->fields)) {
            $data['statusStatistics'] = $this->fields['statusStatistics']?->jsonSerialize();
        }
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }
        if (array_key_exists('accuracyRate', $this->fields)) {
            $data['accuracyRate'] = $this->fields['accuracyRate'];
        }
        if (array_key_exists('acceptanceRate', $this->fields)) {
            $data['acceptanceRate'] = $this->fields['acceptanceRate'];
        }
        if (array_key_exists('manualReviewTime', $this->fields)) {
            $data['manualReviewTime'] = $this->fields['manualReviewTime'];
        }

        return $data;
    }
}
