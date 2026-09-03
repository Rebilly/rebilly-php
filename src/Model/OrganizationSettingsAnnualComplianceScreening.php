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

class OrganizationSettingsAnnualComplianceScreening implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('enabled', $data)) {
            $this->setEnabled($data['enabled']);
        }
        if (array_key_exists('monthDay', $data)) {
            $this->setMonthDay($data['monthDay']);
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

    public function getMonthDay(): ?string
    {
        return $this->fields['monthDay'] ?? null;
    }

    public function setMonthDay(null|string $monthDay): static
    {
        $this->fields['monthDay'] = $monthDay;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enabled', $this->fields)) {
            $data['enabled'] = $this->fields['enabled'];
        }
        if (array_key_exists('monthDay', $this->fields)) {
            $data['monthDay'] = $this->fields['monthDay'];
        }

        return $data;
    }
}
