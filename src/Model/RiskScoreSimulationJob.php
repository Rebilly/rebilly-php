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

class RiskScoreSimulationJob implements JsonSerializable
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_PROCESSING = 'processing';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_FAILED = 'failed';

    public const STATUS_STOPPED = 'stopped';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('summary', $data)) {
            $this->setSummary($data['summary']);
        }
        if (array_key_exists('rules', $data)) {
            $this->setRules($data['rules']);
        }
        if (array_key_exists('period', $data)) {
            $this->setPeriod($data['period']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('startedTime', $data)) {
            $this->setStartedTime($data['startedTime']);
        }
        if (array_key_exists('finishedTime', $data)) {
            $this->setFinishedTime($data['finishedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @return null|RiskScoreSimulationJobSummary[]
     */
    public function getSummary(): ?array
    {
        return $this->fields['summary'] ?? null;
    }

    public function getRules(): RiskScoreRules
    {
        return $this->fields['rules'];
    }

    public function setRules(RiskScoreRules|array $rules): static
    {
        if (!($rules instanceof RiskScoreRules)) {
            $rules = RiskScoreRules::from($rules);
        }

        $this->fields['rules'] = $rules;

        return $this;
    }

    public function getPeriod(): RiskScoreSimulationJobPeriod
    {
        return $this->fields['period'];
    }

    public function setPeriod(RiskScoreSimulationJobPeriod|array $period): static
    {
        if (!($period instanceof RiskScoreSimulationJobPeriod)) {
            $period = RiskScoreSimulationJobPeriod::from($period);
        }

        $this->fields['period'] = $period;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getStartedTime(): ?DateTimeImmutable
    {
        return $this->fields['startedTime'] ?? null;
    }

    public function getFinishedTime(): ?DateTimeImmutable
    {
        return $this->fields['finishedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?RiskScoreSimulationJobEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|RiskScoreSimulationJobEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof RiskScoreSimulationJobEmbedded)) {
            $embedded = RiskScoreSimulationJobEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('summary', $this->fields)) {
            $data['summary'] = $this->fields['summary'] !== null
                ? array_map(
                    static fn (RiskScoreSimulationJobSummary $riskScoreSimulationJobSummary) => $riskScoreSimulationJobSummary->jsonSerialize(),
                    $this->fields['summary'],
                )
                : null;
        }
        if (array_key_exists('rules', $this->fields)) {
            $data['rules'] = $this->fields['rules']->jsonSerialize();
        }
        if (array_key_exists('period', $this->fields)) {
            $data['period'] = $this->fields['period']->jsonSerialize();
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('startedTime', $this->fields)) {
            $data['startedTime'] = $this->fields['startedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('finishedTime', $this->fields)) {
            $data['finishedTime'] = $this->fields['finishedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @param null|array[]|RiskScoreSimulationJobSummary[] $summary
     */
    private function setSummary(null|array $summary): static
    {
        $summary = $summary !== null ? array_map(
            fn ($value) => $value instanceof RiskScoreSimulationJobSummary ? $value : RiskScoreSimulationJobSummary::from($value),
            $summary,
        ) : null;

        $this->fields['summary'] = $summary;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    private function setStartedTime(null|DateTimeImmutable|string $startedTime): static
    {
        if ($startedTime !== null && !($startedTime instanceof DateTimeImmutable)) {
            $startedTime = new DateTimeImmutable($startedTime);
        }

        $this->fields['startedTime'] = $startedTime;

        return $this;
    }

    private function setFinishedTime(null|DateTimeImmutable|string $finishedTime): static
    {
        if ($finishedTime !== null && !($finishedTime instanceof DateTimeImmutable)) {
            $finishedTime = new DateTimeImmutable($finishedTime);
        }

        $this->fields['finishedTime'] = $finishedTime;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
