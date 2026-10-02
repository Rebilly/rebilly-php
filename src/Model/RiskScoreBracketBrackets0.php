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

class RiskScoreBracketBrackets0 implements RiskScoreBracketBrackets
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('end', $data)) {
            $this->setEnd($data['end']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getEnd(): ?RiskScoreBracketBrackets0End
    {
        return $this->fields['end'] ?? null;
    }

    public function setEnd(null|RiskScoreBracketBrackets0End|array $end): static
    {
        if ($end !== null && !($end instanceof RiskScoreBracketBrackets0End)) {
            $end = RiskScoreBracketBrackets0End::from($end);
        }

        $this->fields['end'] = $end;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('end', $this->fields)) {
            $data['end'] = $this->fields['end']?->jsonSerialize();
        }

        return $data;
    }
}
