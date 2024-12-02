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

class GetKycAcceptanceSummaryReportResponseData implements JsonSerializable
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

    public function getDocumentType(): ?GetKycAcceptanceSummaryReportResponseDataDocumentType
    {
        return $this->fields['documentType'] ?? null;
    }

    public function setDocumentType(null|GetKycAcceptanceSummaryReportResponseDataDocumentType|array $documentType): static
    {
        if ($documentType !== null && !($documentType instanceof GetKycAcceptanceSummaryReportResponseDataDocumentType)) {
            $documentType = GetKycAcceptanceSummaryReportResponseDataDocumentType::from($documentType);
        }

        $this->fields['documentType'] = $documentType;

        return $this;
    }

    public function getStatusStatistics(): ?GetKycAcceptanceSummaryReportResponseDataStatusStatistics
    {
        return $this->fields['statusStatistics'] ?? null;
    }

    public function setStatusStatistics(null|GetKycAcceptanceSummaryReportResponseDataStatusStatistics|array $statusStatistics): static
    {
        if ($statusStatistics !== null && !($statusStatistics instanceof GetKycAcceptanceSummaryReportResponseDataStatusStatistics)) {
            $statusStatistics = GetKycAcceptanceSummaryReportResponseDataStatusStatistics::from($statusStatistics);
        }

        $this->fields['statusStatistics'] = $statusStatistics;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->fields['total'] ?? null;
    }

    public function setTotal(null|int $total): static
    {
        $this->fields['total'] = $total;

        return $this;
    }

    public function getAccuracyRate(): ?float
    {
        return $this->fields['accuracyRate'] ?? null;
    }

    public function setAccuracyRate(null|float|string $accuracyRate): static
    {
        if (is_string($accuracyRate)) {
            $accuracyRate = (float) $accuracyRate;
        }

        $this->fields['accuracyRate'] = $accuracyRate;

        return $this;
    }

    public function getAcceptanceRate(): ?float
    {
        return $this->fields['acceptanceRate'] ?? null;
    }

    public function setAcceptanceRate(null|float|string $acceptanceRate): static
    {
        if (is_string($acceptanceRate)) {
            $acceptanceRate = (float) $acceptanceRate;
        }

        $this->fields['acceptanceRate'] = $acceptanceRate;

        return $this;
    }

    public function getManualReviewTime(): ?float
    {
        return $this->fields['manualReviewTime'] ?? null;
    }

    public function setManualReviewTime(null|float|string $manualReviewTime): static
    {
        if (is_string($manualReviewTime)) {
            $manualReviewTime = (float) $manualReviewTime;
        }

        $this->fields['manualReviewTime'] = $manualReviewTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('documentType', $this->fields)) {
            $data['documentType'] = $this->fields['documentType']?->jsonSerialize();
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
