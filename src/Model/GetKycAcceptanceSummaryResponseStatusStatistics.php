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

class GetKycAcceptanceSummaryResponseStatusStatistics implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('accepted', $data)) {
            $this->setAccepted($data['accepted']);
        }
        if (array_key_exists('rejected', $data)) {
            $this->setRejected($data['rejected']);
        }
        if (array_key_exists('pending', $data)) {
            $this->setPending($data['pending']);
        }
        if (array_key_exists('archived', $data)) {
            $this->setArchived($data['archived']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAccepted(): ?GetKycAcceptanceSummaryResponseStatusStatisticsAccepted
    {
        return $this->fields['accepted'] ?? null;
    }

    public function setAccepted(null|GetKycAcceptanceSummaryResponseStatusStatisticsAccepted|array $accepted): static
    {
        if ($accepted !== null && !($accepted instanceof GetKycAcceptanceSummaryResponseStatusStatisticsAccepted)) {
            $accepted = GetKycAcceptanceSummaryResponseStatusStatisticsAccepted::from($accepted);
        }

        $this->fields['accepted'] = $accepted;

        return $this;
    }

    public function getRejected(): ?GetKycAcceptanceSummaryResponseStatusStatisticsRejected
    {
        return $this->fields['rejected'] ?? null;
    }

    public function setRejected(null|GetKycAcceptanceSummaryResponseStatusStatisticsRejected|array $rejected): static
    {
        if ($rejected !== null && !($rejected instanceof GetKycAcceptanceSummaryResponseStatusStatisticsRejected)) {
            $rejected = GetKycAcceptanceSummaryResponseStatusStatisticsRejected::from($rejected);
        }

        $this->fields['rejected'] = $rejected;

        return $this;
    }

    public function getPending(): ?GetKycAcceptanceSummaryResponseStatusStatisticsPending
    {
        return $this->fields['pending'] ?? null;
    }

    public function setPending(null|GetKycAcceptanceSummaryResponseStatusStatisticsPending|array $pending): static
    {
        if ($pending !== null && !($pending instanceof GetKycAcceptanceSummaryResponseStatusStatisticsPending)) {
            $pending = GetKycAcceptanceSummaryResponseStatusStatisticsPending::from($pending);
        }

        $this->fields['pending'] = $pending;

        return $this;
    }

    public function getArchived(): ?GetKycAcceptanceSummaryResponseStatusStatisticsArchived
    {
        return $this->fields['archived'] ?? null;
    }

    public function setArchived(null|GetKycAcceptanceSummaryResponseStatusStatisticsArchived|array $archived): static
    {
        if ($archived !== null && !($archived instanceof GetKycAcceptanceSummaryResponseStatusStatisticsArchived)) {
            $archived = GetKycAcceptanceSummaryResponseStatusStatisticsArchived::from($archived);
        }

        $this->fields['archived'] = $archived;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accepted', $this->fields)) {
            $data['accepted'] = $this->fields['accepted']?->jsonSerialize();
        }
        if (array_key_exists('rejected', $this->fields)) {
            $data['rejected'] = $this->fields['rejected']?->jsonSerialize();
        }
        if (array_key_exists('pending', $this->fields)) {
            $data['pending'] = $this->fields['pending']?->jsonSerialize();
        }
        if (array_key_exists('archived', $this->fields)) {
            $data['archived'] = $this->fields['archived']?->jsonSerialize();
        }

        return $data;
    }
}
