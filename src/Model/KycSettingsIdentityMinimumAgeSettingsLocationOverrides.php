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

class KycSettingsIdentityMinimumAgeSettingsLocationOverrides implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('state', $data)) {
            $this->setState($data['state']);
        }
        if (array_key_exists('minimumAge', $data)) {
            $this->setMinimumAge($data['minimumAge']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCountry(): string
    {
        return $this->fields['country'];
    }

    public function setCountry(string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->fields['state'] ?? null;
    }

    public function setState(null|string $state): static
    {
        $this->fields['state'] = $state;

        return $this;
    }

    public function getMinimumAge(): int
    {
        return $this->fields['minimumAge'];
    }

    public function setMinimumAge(int $minimumAge): static
    {
        $this->fields['minimumAge'] = $minimumAge;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('state', $this->fields)) {
            $data['state'] = $this->fields['state'];
        }
        if (array_key_exists('minimumAge', $this->fields)) {
            $data['minimumAge'] = $this->fields['minimumAge'];
        }

        return $data;
    }
}
