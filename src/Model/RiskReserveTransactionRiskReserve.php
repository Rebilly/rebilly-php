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

class RiskReserveTransactionRiskReserve implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('releaseTime', $data)) {
            $this->setReleaseTime($data['releaseTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getReleaseTime(): ?DateTimeImmutable
    {
        return $this->fields['releaseTime'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('releaseTime', $this->fields)) {
            $data['releaseTime'] = $this->fields['releaseTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setReleaseTime(null|DateTimeImmutable|string $releaseTime): static
    {
        if ($releaseTime !== null && !($releaseTime instanceof DateTimeImmutable)) {
            $releaseTime = new DateTimeImmutable($releaseTime);
        }

        $this->fields['releaseTime'] = $releaseTime;

        return $this;
    }
}
