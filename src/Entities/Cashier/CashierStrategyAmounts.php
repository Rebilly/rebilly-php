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

namespace Rebilly\Entities\Cashier;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class CashierStrategyAmounts.
 */
final class CashierStrategyAmounts extends Resource
{
    private const UNEXPECTED_CALCULATOR = 'Unexpected calculator tyoe. Onle %s calculators are supported';

    private const NON_NUMERIC_VALUE = '%s is not a numeric value';

    private const GREATER_THAN_ZERO = '%s should be greater than 0';

    public const CALCULATOR_PERCENT = 'percent';

    public const CALCULATOR_ABSOLUTE = 'absolute';

    /**
     * @return CashierStrategyAmounts
     */
    public static function createFromData(array $data)
    {
        return new self($data);
    }

    /**
     * @return string[]|array
     */
    public static function calculators()
    {
        return [
            self::CALCULATOR_ABSOLUTE,
            self::CALCULATOR_PERCENT,
        ];
    }

    /**
     * @return string
     */
    public function getCalculator()
    {
        return $this->getAttribute('calculator');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCalculator($value)
    {
        if (!in_array($value, static::calculators(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_CALCULATOR, implode(', ', static::calculators())));
        }

        return $this->setAttribute('calculator', $value);
    }

    /**
     * @return float|int
     */
    public function getBaseAmount()
    {
        return $this->getAttribute('baseAmount');
    }

    /**
     * @param string|float|int $value
     *
     * @return $this
     */
    public function setBaseAmount($value)
    {
        $value = $this->validateNumber($value);

        return $this->setAttribute('baseAmount', $value);
    }

    /**
     * @return float[]|array
     */
    public function getIncrements()
    {
        return $this->getAttribute('increments');
    }

    /**
     * @param float[]|array $value
     *
     * @return $this
     */
    public function setIncrements($value)
    {
        $validIncrements = [];
        foreach ($value as $increment) {
            $validIncrements[] = $this->validateNumber($increment);
        }

        return $this->setAttribute('increments', $validIncrements);
    }

    /**
     * @return bool
     */
    public function getAdjustBaseToLastDeposit()
    {
        return $this->getAttribute('adjustBaseToLastDeposit');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setAdjustBaseToLastDeposit($value)
    {
        return $this->setAttribute('adjustBaseToLastDeposit', $value);
    }

    /**
     * @param string|int|float $value
     * @return float
     */
    private function validateNumber($value)
    {
        if (!is_numeric($value)) {
            throw new DomainException(sprintf(self::NON_NUMERIC_VALUE, $value));
        }

        $value = (float) $value;

        if ($value <= 0) {
            throw new DomainException(sprintf(self::GREATER_THAN_ZERO, $value));
        }

        return $value;
    }
}
