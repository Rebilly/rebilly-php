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

class RiskScoreBlocklistPermanentRule implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('riskScoreThreshold', $data)) {
            $this->setRiskScoreThreshold($data['riskScoreThreshold']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('riskScoreThreshold', $this->fields)) {
            $data['riskScoreThreshold'] = $this->fields['riskScoreThreshold'];
        }

        return $data;
    }
}
