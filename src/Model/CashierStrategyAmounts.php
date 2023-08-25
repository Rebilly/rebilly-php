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

class CashierStrategyAmounts implements JsonSerializable
{
    public const CALCULATOR_ABSOLUTE = 'absolute';

    public const CALCULATOR_PERCENT = 'percent';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('calculator', $data)) {
            $this->setCalculator($data['calculator']);
        }
        if (array_key_exists('baseAmount', $data)) {
            $this->setBaseAmount($data['baseAmount']);
        }
        if (array_key_exists('increments', $data)) {
            $this->setIncrements($data['increments']);
        }
        if (array_key_exists('adjustBaseToLastDeposit', $data)) {
            $this->setAdjustBaseToLastDeposit($data['adjustBaseToLastDeposit']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCalculator(): string
    {
        return $this->fields['calculator'];
    }

    public function setCalculator(string $calculator): static
    {
        $this->fields['calculator'] = $calculator;

        return $this;
    }

    public function getBaseAmount(): float
    {
        return $this->fields['baseAmount'];
    }

    public function setBaseAmount(float|string $baseAmount): static
    {
        if (is_string($baseAmount)) {
            $baseAmount = (float) $baseAmount;
        }

        $this->fields['baseAmount'] = $baseAmount;

        return $this;
    }

    /**
     * @return float[]
     */
    public function getIncrements(): array
    {
        return $this->fields['increments'];
    }

    /**
     * @param float[] $increments
     */
    public function setIncrements(array $increments): static
    {
        $increments = array_map(
            fn ($value) => $value,
            $increments,
        );

        $this->fields['increments'] = $increments;

        return $this;
    }

    public function getAdjustBaseToLastDeposit(): ?bool
    {
        return $this->fields['adjustBaseToLastDeposit'] ?? null;
    }

    public function setAdjustBaseToLastDeposit(null|bool $adjustBaseToLastDeposit): static
    {
        $this->fields['adjustBaseToLastDeposit'] = $adjustBaseToLastDeposit;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('calculator', $this->fields)) {
            $data['calculator'] = $this->fields['calculator'];
        }
        if (array_key_exists('baseAmount', $this->fields)) {
            $data['baseAmount'] = $this->fields['baseAmount'];
        }
        if (array_key_exists('increments', $this->fields)) {
            $data['increments'] = $this->fields['increments'];
        }
        if (array_key_exists('adjustBaseToLastDeposit', $this->fields)) {
            $data['adjustBaseToLastDeposit'] = $this->fields['adjustBaseToLastDeposit'];
        }

        return $data;
    }
}
