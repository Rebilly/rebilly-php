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

class CustomerEmbedded implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('defaultPaymentInstrument', $data)) {
            $this->setDefaultPaymentInstrument($data['defaultPaymentInstrument']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
        }
        if (array_key_exists('leadSource', $data)) {
            $this->setLeadSource($data['leadSource']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getDefaultPaymentInstrument(): ?array
    {
        return $this->fields['defaultPaymentInstrument'] ?? null;
    }

    public function setDefaultPaymentInstrument(null|array $defaultPaymentInstrument): static
    {
        $this->fields['defaultPaymentInstrument'] = $defaultPaymentInstrument;

        return $this;
    }

    public function getWebsite(): ?Website
    {
        return $this->fields['website'] ?? null;
    }

    public function setWebsite(null|Website|array $website): static
    {
        if ($website !== null && !($website instanceof Website)) {
            $website = Website::from($website);
        }

        $this->fields['website'] = $website;

        return $this;
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
        if (array_key_exists('defaultPaymentInstrument', $this->fields)) {
            $data['defaultPaymentInstrument'] = $this->fields['defaultPaymentInstrument'];
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website']?->jsonSerialize();
        }
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource']?->jsonSerialize();
        }

        return $data;
    }
}
