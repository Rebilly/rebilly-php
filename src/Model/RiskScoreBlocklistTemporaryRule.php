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

class RiskScoreBlocklistTemporaryRule implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('riskScoreThreshold', $data)) {
            $this->setRiskScoreThreshold($data['riskScoreThreshold']);
        }
        if (array_key_exists('ttl', $data)) {
            $this->setTtl($data['ttl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRiskScoreThreshold(): int
    {
        return $this->fields['riskScoreThreshold'];
    }

    public function setRiskScoreThreshold(int $riskScoreThreshold): static
    {
        $this->fields['riskScoreThreshold'] = $riskScoreThreshold;

        return $this;
    }

    public function getTtl(): int
    {
        return $this->fields['ttl'];
    }

    public function setTtl(int $ttl): static
    {
        $this->fields['ttl'] = $ttl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('riskScoreThreshold', $this->fields)) {
            $data['riskScoreThreshold'] = $this->fields['riskScoreThreshold'];
        }
        if (array_key_exists('ttl', $this->fields)) {
            $data['ttl'] = $this->fields['ttl'];
        }

        return $data;
    }
}
