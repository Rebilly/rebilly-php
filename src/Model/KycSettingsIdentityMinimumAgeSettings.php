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

class KycSettingsIdentityMinimumAgeSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('defaultMinimumAge', $data)) {
            $this->setDefaultMinimumAge($data['defaultMinimumAge']);
        }
        if (array_key_exists('locationOverrides', $data)) {
            $this->setLocationOverrides($data['locationOverrides']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDefaultMinimumAge(): ?int
    {
        return $this->fields['defaultMinimumAge'] ?? null;
    }

    public function setDefaultMinimumAge(null|int $defaultMinimumAge): static
    {
        $this->fields['defaultMinimumAge'] = $defaultMinimumAge;

        return $this;
    }

    /**
     * @return null|KycSettingsIdentityMinimumAgeSettingsLocationOverrides[]
     */
    public function getLocationOverrides(): ?array
    {
        return $this->fields['locationOverrides'] ?? null;
    }

    /**
     * @param null|array[]|KycSettingsIdentityMinimumAgeSettingsLocationOverrides[] $locationOverrides
     */
    public function setLocationOverrides(null|array $locationOverrides): static
    {
        $locationOverrides = $locationOverrides !== null ? array_map(
            fn ($value) => $value instanceof KycSettingsIdentityMinimumAgeSettingsLocationOverrides ? $value : KycSettingsIdentityMinimumAgeSettingsLocationOverrides::from($value),
            $locationOverrides,
        ) : null;

        $this->fields['locationOverrides'] = $locationOverrides;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('defaultMinimumAge', $this->fields)) {
            $data['defaultMinimumAge'] = $this->fields['defaultMinimumAge'];
        }
        if (array_key_exists('locationOverrides', $this->fields)) {
            $data['locationOverrides'] = $this->fields['locationOverrides'] !== null
                ? array_map(
                    static fn (KycSettingsIdentityMinimumAgeSettingsLocationOverrides $kycSettingsIdentityMinimumAgeSettingsLocationOverrides) => $kycSettingsIdentityMinimumAgeSettingsLocationOverrides->jsonSerialize(),
                    $this->fields['locationOverrides'],
                )
                : null;
        }

        return $data;
    }
}
