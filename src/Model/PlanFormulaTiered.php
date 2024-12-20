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

class PlanFormulaTiered implements PlanPriceFormula
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('brackets', $data)) {
            $this->setBrackets($data['brackets']);
        }
        if (array_key_exists('minQuantity', $data)) {
            $this->setMinQuantity($data['minQuantity']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFormula(): string
    {
        return 'tiered';
    }

    /**
     * @return PlanFormulaTieredBrackets[]
     */
    public function getBrackets(): array
    {
        return $this->fields['brackets'];
    }

    /**
     * @param array[]|PlanFormulaTieredBrackets[] $brackets
     */
    public function setBrackets(array $brackets): static
    {
        $brackets = array_map(
            fn ($value) => $value instanceof PlanFormulaTieredBrackets ? $value : PlanFormulaTieredBrackets::from($value),
            $brackets,
        );

        $this->fields['brackets'] = $brackets;

        return $this;
    }

    public function getMinQuantity(): ?int
    {
        return $this->fields['minQuantity'] ?? null;
    }

    public function setMinQuantity(null|int $minQuantity): static
    {
        $this->fields['minQuantity'] = $minQuantity;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'formula' => 'tiered',
        ];
        if (array_key_exists('brackets', $this->fields)) {
            $data['brackets'] = array_map(
                static fn (PlanFormulaTieredBrackets $planFormulaTieredBrackets) => $planFormulaTieredBrackets->jsonSerialize(),
                $this->fields['brackets'],
            );
        }
        if (array_key_exists('minQuantity', $this->fields)) {
            $data['minQuantity'] = $this->fields['minQuantity'];
        }

        return $data;
    }
}
