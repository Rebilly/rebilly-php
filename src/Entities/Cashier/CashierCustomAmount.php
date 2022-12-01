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
 * Class CashierCustomAmount.
 */
final class CashierCustomAmount extends Resource
{
    private const NON_NUMERIC_VALUE = '%s is not a numeric value';

    private const GREATER_THAN_ZERO = '%s should be greater than 0';

    /**
     * @return float
     */
    public function getMinimum()
    {
        return $this->getAttribute('minimum');
    }

    /**
     * @param string|float|int $value
     *
     * @return $this
     */
    public function setMinimum($value)
    {
        $value = $this->validateNumber($value);

        return $this->setAttribute('minimum', $value);
    }

    /**
     * @return float
     */
    public function getMaximum()
    {
        return $this->getAttribute('maximum');
    }

    /**
     * @param string|float|int $value
     *
     * @return $this
     */
    public function setMaximum($value)
    {
        $value = $this->validateNumber($value);

        return $this->setAttribute('maximum', $value);
    }

    /**
     * @return float
     */
    public function getMultipleOf()
    {
        return $this->getAttribute('multipleOf');
    }

    /**
     * @param string|float|int $value
     *
     * @return $this
     */
    public function setMultipleOf($value)
    {
        $value = $this->validateNumber($value);

        return $this->setAttribute('multipleOf', $value);
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
