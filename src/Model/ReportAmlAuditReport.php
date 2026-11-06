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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;
use Rebilly\Sdk\Trait\HasMetadata;

class ReportAmlAuditReport implements JsonSerializable
{
    use HasMetadata;

    public const STATUS_CLEAR = 'clear';

    public const STATUS_CONFIRMED_MATCH = 'confirmed-match';

    public const STATUS_PENDING_REVIEW = 'pending-review';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('personId', $data)) {
            $this->setPersonId($data['personId']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('linkedCustomers', $data)) {
            $this->setLinkedCustomers($data['linkedCustomers']);
        }
        if (array_key_exists('summary', $data)) {
            $this->setSummary($data['summary']);
        }
        if (array_key_exists('screeningHistory', $data)) {
            $this->setScreeningHistory($data['screeningHistory']);
        }
        if (array_key_exists('transactions', $data)) {
            $this->setTransactions($data['transactions']);
        }
        if (array_key_exists('periodStart', $data)) {
            $this->setPeriodStart($data['periodStart']);
        }
        if (array_key_exists('periodEnd', $data)) {
            $this->setPeriodEnd($data['periodEnd']);
        }
        if (array_key_exists('truncated', $data)) {
            $this->setTruncated($data['truncated']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getPersonId(): string
    {
        return $this->fields['personId'];
    }

    public function setPersonId(string $personId): static
    {
        $this->fields['personId'] = $personId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @return ReportAmlAuditReportLinkedCustomers[]
     */
    public function getLinkedCustomers(): array
    {
        return $this->fields['linkedCustomers'];
    }

    /**
     * @param array[]|ReportAmlAuditReportLinkedCustomers[] $linkedCustomers
     */
    public function setLinkedCustomers(array $linkedCustomers): static
    {
        $linkedCustomers = array_map(
            fn ($value) => $value instanceof ReportAmlAuditReportLinkedCustomers ? $value : ReportAmlAuditReportLinkedCustomers::from($value),
            $linkedCustomers,
        );

        $this->fields['linkedCustomers'] = $linkedCustomers;

        return $this;
    }

    public function getSummary(): ReportAmlAuditReportSummary
    {
        return $this->fields['summary'];
    }

    public function setSummary(ReportAmlAuditReportSummary|array $summary): static
    {
        if (!($summary instanceof ReportAmlAuditReportSummary)) {
            $summary = ReportAmlAuditReportSummary::from($summary);
        }

        $this->fields['summary'] = $summary;

        return $this;
    }

    /**
     * @return ReportAmlAuditReportScreeningHistory[]
     */
    public function getScreeningHistory(): array
    {
        return $this->fields['screeningHistory'];
    }

    /**
     * @param array[]|ReportAmlAuditReportScreeningHistory[] $screeningHistory
     */
    public function setScreeningHistory(array $screeningHistory): static
    {
        $screeningHistory = array_map(
            fn ($value) => $value instanceof ReportAmlAuditReportScreeningHistory ? $value : ReportAmlAuditReportScreeningHistory::from($value),
            $screeningHistory,
        );

        $this->fields['screeningHistory'] = $screeningHistory;

        return $this;
    }

    /**
     * @return ReportAmlAuditReportTransactions[]
     */
    public function getTransactions(): array
    {
        return $this->fields['transactions'];
    }

    /**
     * @param array[]|ReportAmlAuditReportTransactions[] $transactions
     */
    public function setTransactions(array $transactions): static
    {
        $transactions = array_map(
            fn ($value) => $value instanceof ReportAmlAuditReportTransactions ? $value : ReportAmlAuditReportTransactions::from($value),
            $transactions,
        );

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    public function getPeriodStart(): DateTimeImmutable
    {
        return $this->fields['periodStart'];
    }

    public function setPeriodStart(DateTimeImmutable|string $periodStart): static
    {
        if (!($periodStart instanceof DateTimeImmutable)) {
            $periodStart = new DateTimeImmutable($periodStart);
        }

        $this->fields['periodStart'] = $periodStart;

        return $this;
    }

    public function getPeriodEnd(): DateTimeImmutable
    {
        return $this->fields['periodEnd'];
    }

    public function setPeriodEnd(DateTimeImmutable|string $periodEnd): static
    {
        if (!($periodEnd instanceof DateTimeImmutable)) {
            $periodEnd = new DateTimeImmutable($periodEnd);
        }

        $this->fields['periodEnd'] = $periodEnd;

        return $this;
    }

    public function getTruncated(): bool
    {
        return $this->fields['truncated'];
    }

    public function setTruncated(bool $truncated): static
    {
        $this->fields['truncated'] = $truncated;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('personId', $this->fields)) {
            $data['personId'] = $this->fields['personId'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('linkedCustomers', $this->fields)) {
            $data['linkedCustomers'] = array_map(
                static fn (ReportAmlAuditReportLinkedCustomers $reportAmlAuditReportLinkedCustomers) => $reportAmlAuditReportLinkedCustomers->jsonSerialize(),
                $this->fields['linkedCustomers'],
            );
        }
        if (array_key_exists('summary', $this->fields)) {
            $data['summary'] = $this->fields['summary']->jsonSerialize();
        }
        if (array_key_exists('screeningHistory', $this->fields)) {
            $data['screeningHistory'] = array_map(
                static fn (ReportAmlAuditReportScreeningHistory $reportAmlAuditReportScreeningHistory) => $reportAmlAuditReportScreeningHistory->jsonSerialize(),
                $this->fields['screeningHistory'],
            );
        }
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = array_map(
                static fn (ReportAmlAuditReportTransactions $reportAmlAuditReportTransactions) => $reportAmlAuditReportTransactions->jsonSerialize(),
                $this->fields['transactions'],
            );
        }
        if (array_key_exists('periodStart', $this->fields)) {
            $data['periodStart'] = $this->fields['periodStart']->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('periodEnd', $this->fields)) {
            $data['periodEnd'] = $this->fields['periodEnd']->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('truncated', $this->fields)) {
            $data['truncated'] = $this->fields['truncated'];
        }

        return $data;
    }
}
