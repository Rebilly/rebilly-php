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

class CustomerEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('leadSource', $data)) {
            $this->setLeadSource($data['leadSource']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getLeadSource(): ?LeadSource
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|LeadSource|array $leadSource): static
    {
        if ($leadSource !== null && !($leadSource instanceof LeadSource)) {
            $leadSource = LeadSource::from($leadSource);
        }

        $this->fields['leadSource'] = $leadSource;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource']?->jsonSerialize();
        }

        return $data;
    }
}
