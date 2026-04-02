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

class RiskScoreBracket implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('brackets', $data)) {
            $this->setBrackets($data['brackets']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return RiskScoreBracketBrackets[]
     */
    public function getBrackets(): array
    {
        return $this->fields['brackets'];
    }

    /**
     * @param array[]|RiskScoreBracketBrackets[] $brackets
     */
    public function setBrackets(array $brackets): static
    {
        $brackets = array_map(
            fn ($value) => $value instanceof RiskScoreBracketBrackets ? $value : RiskScoreBracketBracketsFactory::from($value),
            $brackets,
        );

        $this->fields['brackets'] = $brackets;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('brackets', $this->fields)) {
            $data['brackets'] = array_map(
                static fn (RiskScoreBracketBrackets $riskScoreBracketBrackets) => $riskScoreBracketBrackets->jsonSerialize(),
                $this->fields['brackets'],
            );
        }

        return $data;
    }
}
