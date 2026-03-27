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
use Rebilly\Sdk\Trait\HasMetadata;

class ReportAmlChecksInheritedSummaryCategories implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('reason', $data)) {
            $this->setReason($data['reason']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
        if (array_key_exists('percentage', $data)) {
            $this->setPercentage($data['percentage']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getReason(): string
    {
        return $this->fields['reason'];
    }

    public function setReason(string $reason): static
    {
        $this->fields['reason'] = $reason;

        return $this;
    }

    public function getCount(): int
    {
        return $this->fields['count'];
    }

    public function setCount(int $count): static
    {
        $this->fields['count'] = $count;

        return $this;
    }

    public function getPercentage(): float
    {
        return $this->fields['percentage'];
    }

    public function setPercentage(float|string $percentage): static
    {
        if (is_string($percentage)) {
            $percentage = (float) $percentage;
        }

        $this->fields['percentage'] = $percentage;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('reason', $this->fields)) {
            $data['reason'] = $this->fields['reason'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('percentage', $this->fields)) {
            $data['percentage'] = $this->fields['percentage'];
        }

        return $data;
    }
}
