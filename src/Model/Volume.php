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

class Volume extends PlanPriceFormula
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'formula' => 'volume',
        ] + $data);

        if (array_key_exists('brackets', $data)) {
            $this->setBrackets($data['brackets']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return StairstepBrackets[]
     */
    public function getBrackets(): array
    {
        return $this->fields['brackets'];
    }

    /**
     * @param StairstepBrackets[] $brackets
     */
    public function setBrackets(array $brackets): self
    {
        $brackets = array_map(fn ($value) => $value !== null ? ($value instanceof StairstepBrackets ? $value : StairstepBrackets::from($value)) : null, $brackets);

        $this->fields['brackets'] = $brackets;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('brackets', $this->fields)) {
            $data['brackets'] = $this->fields['brackets'];
        }

        return parent::jsonSerialize() + $data;
    }
}
