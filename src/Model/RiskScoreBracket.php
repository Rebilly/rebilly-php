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

class RiskScoreBracket implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('brackets', $data)) {
            $this->setBrackets($data['brackets']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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
            fn ($value) => $value instanceof RiskScoreBracketBrackets ? $value : RiskScoreBracketBrackets::from($value),
            $brackets,
        );

        $this->fields['brackets'] = $brackets;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('brackets', $this->fields)) {
            $data['brackets'] = $this->fields['brackets'];
        }

        return $data;
    }
}
