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

use Rebilly\Sdk\Trait\HasMetadata;

class RiskScoreBracketBrackets1 implements RiskScoreBracketBrackets
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('start', $data)) {
            $this->setStart($data['start']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getStart(): ?RiskScoreBracketBrackets1Start
    {
        return $this->fields['start'] ?? null;
    }

    public function setStart(null|RiskScoreBracketBrackets1Start|array $start): static
    {
        if ($start !== null && !($start instanceof RiskScoreBracketBrackets1Start)) {
            $start = RiskScoreBracketBrackets1Start::from($start);
        }

        $this->fields['start'] = $start;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('start', $this->fields)) {
            $data['start'] = $this->fields['start']?->jsonSerialize();
        }

        return $data;
    }
}
