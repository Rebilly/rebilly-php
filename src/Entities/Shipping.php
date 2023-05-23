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

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class Shipping.
 */
final class Shipping extends Resource
{
    public const UNEXPECTED_CALCULATOR = 'Unexpected calculator. Only %s calculators are supported';

    public const CALCULATOR_MANUAL = 'manual';

    public const CALCULATOR_REBILLY = 'rebilly';

    /**
     * @return array
     */
    public static function allowedCalculators()
    {
        return [
            self::CALCULATOR_MANUAL,
            self::CALCULATOR_REBILLY,
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
    public function setCalculator($value): self
    {
        if (!in_array($value, self::allowedCalculators(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_CALCULATOR, implode(', ', self::allowedCalculators())));
        }

        return $this->setAttribute('calculator', $value);
    }

    /**
     * @return string|null
     */
    public function getRateId()
    {
        return $this->getAttribute('rateId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRateId($value)
    {
        return $this->setAttribute('rateId', $value);
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }
}
