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

class KycSettingsIdentity implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('weights', $data)) {
            $this->setWeights($data['weights']);
        }
        if (array_key_exists('thresholds', $data)) {
            $this->setThresholds($data['thresholds']);
        }
        if (array_key_exists('minimumAgeSettings', $data)) {
            $this->setMinimumAgeSettings($data['minimumAgeSettings']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getWeights(): ?KycSettingsIdentityWeights
    {
        return $this->fields['weights'] ?? null;
    }

    public function setWeights(null|KycSettingsIdentityWeights|array $weights): static
    {
        if ($weights !== null && !($weights instanceof KycSettingsIdentityWeights)) {
            $weights = KycSettingsIdentityWeights::from($weights);
        }

        $this->fields['weights'] = $weights;

        return $this;
    }

    public function getThresholds(): ?KycSettingsIdentityThresholds
    {
        return $this->fields['thresholds'] ?? null;
    }

    public function setThresholds(null|KycSettingsIdentityThresholds|array $thresholds): static
    {
        if ($thresholds !== null && !($thresholds instanceof KycSettingsIdentityThresholds)) {
            $thresholds = KycSettingsIdentityThresholds::from($thresholds);
        }

        $this->fields['thresholds'] = $thresholds;

        return $this;
    }

    public function getMinimumAgeSettings(): ?KycSettingsIdentityMinimumAgeSettings
    {
        return $this->fields['minimumAgeSettings'] ?? null;
    }

    public function setMinimumAgeSettings(null|KycSettingsIdentityMinimumAgeSettings|array $minimumAgeSettings): static
    {
        if ($minimumAgeSettings !== null && !($minimumAgeSettings instanceof KycSettingsIdentityMinimumAgeSettings)) {
            $minimumAgeSettings = KycSettingsIdentityMinimumAgeSettings::from($minimumAgeSettings);
        }

        $this->fields['minimumAgeSettings'] = $minimumAgeSettings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('weights', $this->fields)) {
            $data['weights'] = $this->fields['weights']?->jsonSerialize();
        }
        if (array_key_exists('thresholds', $this->fields)) {
            $data['thresholds'] = $this->fields['thresholds']?->jsonSerialize();
        }
        if (array_key_exists('minimumAgeSettings', $this->fields)) {
            $data['minimumAgeSettings'] = $this->fields['minimumAgeSettings']?->jsonSerialize();
        }

        return $data;
    }
}
