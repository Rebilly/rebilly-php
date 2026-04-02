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

class SubscriptionTrial implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('enabled', $data)) {
            $this->setEnabled($data['enabled']);
        }
        if (array_key_exists('endTime', $data)) {
            $this->setEndTime($data['endTime']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getEnabled(): ?bool
    {
        return $this->fields['enabled'] ?? null;
    }

    public function setEnabled(null|bool $enabled): static
    {
        $this->fields['enabled'] = $enabled;

        return $this;
    }

    public function getEndTime(): ?DateTimeImmutable
    {
        return $this->fields['endTime'] ?? null;
    }

    public function setEndTime(null|DateTimeImmutable|string $endTime): static
    {
        if ($endTime !== null && !($endTime instanceof DateTimeImmutable)) {
            $endTime = new DateTimeImmutable($endTime);
        }

        $this->fields['endTime'] = $endTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enabled', $this->fields)) {
            $data['enabled'] = $this->fields['enabled'];
        }
        if (array_key_exists('endTime', $this->fields)) {
            $data['endTime'] = $this->fields['endTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
