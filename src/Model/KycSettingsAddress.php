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

class KycSettingsAddress implements JsonSerializable
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getWeights(): ?KycSettingsAddressWeights
    {
        return $this->fields['weights'] ?? null;
    }

    public function setWeights(null|KycSettingsAddressWeights|array $weights): self
    {
        if ($weights !== null && !($weights instanceof KycSettingsAddressWeights)) {
            $weights = KycSettingsAddressWeights::from($weights);
        }

        $this->fields['weights'] = $weights;

        return $this;
    }

    public function getThresholds(): ?KycSettingsIdentityThresholds
    {
        return $this->fields['thresholds'] ?? null;
    }

    public function setThresholds(null|KycSettingsIdentityThresholds|array $thresholds): self
    {
        if ($thresholds !== null && !($thresholds instanceof KycSettingsIdentityThresholds)) {
            $thresholds = KycSettingsIdentityThresholds::from($thresholds);
        }

        $this->fields['thresholds'] = $thresholds;

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

        return $data;
    }
}
