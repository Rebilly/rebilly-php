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

class WebsiteSettingsPayoutRequest implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('automaticReadinessEnabled', $data)) {
            $this->setAutomaticReadinessEnabled($data['automaticReadinessEnabled']);
        }
        if (array_key_exists('pendingPeriodHours', $data)) {
            $this->setPendingPeriodHours($data['pendingPeriodHours']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAutomaticReadinessEnabled(): ?bool
    {
        return $this->fields['automaticReadinessEnabled'] ?? null;
    }

    public function setAutomaticReadinessEnabled(null|bool $automaticReadinessEnabled): static
    {
        $this->fields['automaticReadinessEnabled'] = $automaticReadinessEnabled;

        return $this;
    }

    public function getPendingPeriodHours(): ?int
    {
        return $this->fields['pendingPeriodHours'] ?? null;
    }

    public function setPendingPeriodHours(null|int $pendingPeriodHours): static
    {
        $this->fields['pendingPeriodHours'] = $pendingPeriodHours;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('automaticReadinessEnabled', $this->fields)) {
            $data['automaticReadinessEnabled'] = $this->fields['automaticReadinessEnabled'];
        }
        if (array_key_exists('pendingPeriodHours', $this->fields)) {
            $data['pendingPeriodHours'] = $this->fields['pendingPeriodHours'];
        }

        return $data;
    }
}
