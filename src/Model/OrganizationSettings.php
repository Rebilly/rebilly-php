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

    public function setDefaultTaxCalculator(null|OrganizationSettingsDefaultTaxCalculator|array $defaultTaxCalculator): self
    {
        if ($defaultTaxCalculator !== null && !($defaultTaxCalculator instanceof \Rebilly\Sdk\Model\OrganizationSettingsDefaultTaxCalculator)) {
            $defaultTaxCalculator = \Rebilly\Sdk\Model\OrganizationSettingsDefaultTaxCalculator::from($defaultTaxCalculator);
        }

        $this->fields['defaultTaxCalculator'] = $defaultTaxCalculator;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\TaxLocation[]
     */
    public function getTaxLocations(): ?array
    {
        return $this->fields['taxLocations'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\TaxLocation[] $taxLocations
     */
    public function setTaxLocations(null|array $taxLocations): self
    {
        $taxLocations = $taxLocations !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\TaxLocation ? $value : \Rebilly\Sdk\Model\TaxLocation::from($value)) : null, $taxLocations) : null;

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
