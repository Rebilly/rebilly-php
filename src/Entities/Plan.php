<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Plan
 *
 * ```json
 * {
 *   "id"
 *   "isActive"
 *   "name"
 *   "currency"
 *   "description"
 *   "recurringAmount"
 *   "recurringPeriodUnit"
 *   "recurringPeriodLength"
 *   "trialAmount"
 *   "trialPeriodUnit"
 *   "trialPeriodLength"
 *   "setupAmount"
 *   "expireTime"
 *   "contractTermUnit"
 *   "contractTermLength"
 *   "recurringPeriodLimit"
 *   "minQuantity"
 *   "maxQuantity"
 * }
 * ```
 *
 * @todo Add period unit validation
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Plan extends Entity
{
    /**
     * @return bool
     */
    public function getIsActive()
    {
        return $this->getAttribute('isActive');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsActive($value)
    {
        return $this->setAttribute('isActive', (bool) $value);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @return string
     */
    public function getCurrencySign()
    {
        return $this->getAttribute('currencySign');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return float
     */
    public function getRecurringAmount()
    {
        return $this->getAttribute('recurringAmount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setRecurringAmount($value)
    {
        return $this->setAttribute('recurringAmount', $value);
    }

    /**
     * @return string
     */
    public function getRecurringPeriodUnit()
    {
        return $this->getAttribute('recurringPeriodUnit');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRecurringPeriodUnit($value)
    {
        return $this->setAttribute('recurringPeriodUnit', $value);
    }

    /**
     * @return int
     */
    public function getRecurringPeriodLength()
    {
        return $this->getAttribute('recurringPeriodLength');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setRecurringPeriodLength($value)
    {
        return $this->setAttribute('recurringPeriodLength', $value);
    }

    /**
     * @return float
     */
    public function getTrialAmount()
    {
        return $this->getAttribute('trialAmount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setTrialAmount($value)
    {
        return $this->setAttribute('trialAmount', $value);
    }

    /**
     * @return string
     */
    public function getTrialPeriodUnit()
    {
        return $this->getAttribute('trialPeriodUnit');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTrialPeriodUnit($value)
    {
        return $this->setAttribute('trialPeriodUnit', $value);
    }

    /**
     * @return int
     */
    public function getTrialPeriodLength()
    {
        return $this->getAttribute('trialPeriodLength');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setTrialPeriodLength($value)
    {
        return $this->setAttribute('trialPeriodLength', $value);
    }

    /**
     * @return float
     */
    public function getSetupAmount()
    {
        return $this->getAttribute('setupAmount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setSetupAmount($value)
    {
        return $this->setAttribute('setupAmount', $value);
    }

    /**
     * @return string
     */
    public function getExpireTime()
    {
        return $this->getAttribute('expireTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpireTime($value)
    {
        return $this->setAttribute('expireTime', $value);
    }

    /**
     * @return string
     */
    public function getContractTermUnit()
    {
        return $this->getAttribute('contractTermUnit');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setContractTermUnit($value)
    {
        return $this->setAttribute('contractTermUnit', $value);
    }

    /**
     * @return string
     */
    public function getContractTermLength()
    {
        return $this->getAttribute('contractTermLength');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setContractTermLength($value)
    {
        return $this->setAttribute('contractTermLength', $value);
    }

    /**
     * @return string
     */
    public function getRecurringPeriodLimit()
    {
        return $this->getAttribute('recurringPeriodLimit');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRecurringPeriodLimit($value)
    {
        return $this->setAttribute('recurringPeriodLimit', $value);
    }

    /**
     * @return int
     */
    public function getMinQuantity()
    {
        return $this->getAttribute('minQuantity');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setMinQuantity($value)
    {
        return $this->setAttribute('minQuantity', (int) $value);
    }

    /**
     * @return int
     */
    public function getMaxQuantity()
    {
        return $this->getAttribute('maxQuantity');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setMaxQuantity($value)
    {
        return $this->setAttribute('maxQuantity', (int) $value);
    }
}
