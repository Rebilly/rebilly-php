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

class OrganizationSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('defaultTaxCalculator', $data)) {
            $this->setDefaultTaxCalculator($data['defaultTaxCalculator']);
        }
        if (array_key_exists('taxLocations', $data)) {
            $this->setTaxLocations($data['taxLocations']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDefaultTaxCalculator(): ?OrganizationSettingsDefaultTaxCalculator
    {
        return $this->fields['defaultTaxCalculator'] ?? null;
    }

    public function setDefaultTaxCalculator(null|OrganizationSettingsDefaultTaxCalculator|array $defaultTaxCalculator): static
    {
        if ($defaultTaxCalculator !== null && !($defaultTaxCalculator instanceof OrganizationSettingsDefaultTaxCalculator)) {
            $defaultTaxCalculator = OrganizationSettingsDefaultTaxCalculator::from($defaultTaxCalculator);
        }

        $this->fields['defaultTaxCalculator'] = $defaultTaxCalculator;

        return $this;
    }

    /**
     * @return null|TaxLocation[]
     */
    public function getTaxLocations(): ?array
    {
        return $this->fields['taxLocations'] ?? null;
    }

    /**
     * @param null|TaxLocation[] $taxLocations
     */
    public function setTaxLocations(null|array $taxLocations): static
    {
        $taxLocations = $taxLocations !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof TaxLocation ? $value : TaxLocation::from($value)) : null, $taxLocations) : null;

        $this->fields['taxLocations'] = $taxLocations;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('defaultTaxCalculator', $this->fields)) {
            $data['defaultTaxCalculator'] = $this->fields['defaultTaxCalculator']?->jsonSerialize();
        }
        if (array_key_exists('taxLocations', $this->fields)) {
            $data['taxLocations'] = $this->fields['taxLocations'];
        }

        return $data;
    }
}
