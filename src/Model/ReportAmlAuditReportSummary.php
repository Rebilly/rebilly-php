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

class ReportAmlAuditReportSummary implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('totalChecks', $data)) {
            $this->setTotalChecks($data['totalChecks']);
        }
        if (array_key_exists('hitCount', $data)) {
            $this->setHitCount($data['hitCount']);
        }
        if (array_key_exists('lastCheckTime', $data)) {
            $this->setLastCheckTime($data['lastCheckTime']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getTotalChecks(): int
    {
        return $this->fields['totalChecks'];
    }

    public function setTotalChecks(int $totalChecks): static
    {
        $this->fields['totalChecks'] = $totalChecks;

        return $this;
    }

    public function getHitCount(): int
    {
        return $this->fields['hitCount'];
    }

    public function setHitCount(int $hitCount): static
    {
        $this->fields['hitCount'] = $hitCount;

        return $this;
    }

    public function getLastCheckTime(): ?DateTimeImmutable
    {
        return $this->fields['lastCheckTime'] ?? null;
    }

    public function setLastCheckTime(null|DateTimeImmutable|string $lastCheckTime): static
    {
        if ($lastCheckTime !== null && !($lastCheckTime instanceof DateTimeImmutable)) {
            $lastCheckTime = new DateTimeImmutable($lastCheckTime);
        }

        $this->fields['lastCheckTime'] = $lastCheckTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('totalChecks', $this->fields)) {
            $data['totalChecks'] = $this->fields['totalChecks'];
        }
        if (array_key_exists('hitCount', $this->fields)) {
            $data['hitCount'] = $this->fields['hitCount'];
        }
        if (array_key_exists('lastCheckTime', $this->fields)) {
            $data['lastCheckTime'] = $this->fields['lastCheckTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
