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

use Rebilly\Entities\Subscriptions\PlanPricing;
use Rebilly\Entities\Subscriptions\PlanSetup;
use Rebilly\Entities\Subscriptions\PlanTrial;
use Rebilly\Entities\Subscriptions\Pricing\FixedFee;
use Rebilly\Entities\Subscriptions\Pricing\FlatRate;
use Rebilly\Entities\Subscriptions\Pricing\Stairstep;
use Rebilly\Entities\Subscriptions\Pricing\Tiered;
use Rebilly\Entities\Subscriptions\Pricing\Volume;
use Rebilly\Entities\Subscriptions\RecurringInterval;
use Rebilly\Rest\Entity;

/**
 * Class Plan
 *
 * ```json
 * {
 *   "id"
 *   "isActive"
 *   "productId"
 *   "productOptions"
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
    public function getProductId()
    {
        return $this->getAttribute('productId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setProductId($value)
    {
        return $this->setAttribute('productId', $value);
    }

    /**
     * @deprecated
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @deprecated
     *
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @deprecated
     *
     * @return string
     */
    public function getRichDescription()
    {
        return $this->getAttribute('richDescription');
    }

    /**
     * @deprecated
     *
     * @param string $value
     *
     * @return $this
     */
    public function setRichDescription($value)
    {
        return $this->setAttribute('richDescription', $value);
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
     * @return FlatRate|FixedFee|Stairstep|Tiered|Volume
     */
    public function getPricing()
    {
        return $this->getAttribute('pricing');
    }

    /**
     * @param PlanPricing $pricing
     *
     * @return $this
     */
    public function setPricing(PlanPricing $pricing)
    {
        return $this->setAttribute('pricing', $pricing);
    }

    public function createPricing(array $data)
    {
        return PlanPricing::createFromData($data);
    }

    /**
     * @return RecurringInterval
     */
    public function getRecurringInterval()
    {
        return $this->getAttribute('recurringInterval');
    }

    /**
     * @param RecurringInterval $value
     *
     * @return $this
     */
    public function setRecurringInterval(RecurringInterval $value)
    {
        return $this->setAttribute('recurringInterval', $value);
    }

    public function createRecurringInterval(array $data)
    {
        return new RecurringInterval($data);
    }

    /**
     * @return PlanTrial
     */
    public function getTrial()
    {
        return $this->getAttribute('trial');
    }

    /**
     * @param PlanTrial $value
     *
     * @return $this
     */
    public function setTrial(PlanTrial $value)
    {
        return $this->setAttribute('trial', $value);
    }

    public function createTrial(array $data)
    {
        return new PlanTrial($data);
    }

    /**
     * @return PlanSetup
     */
    public function getSetup()
    {
        return $this->getAttribute('setup');
    }

    /**
     * @param PlanSetup $value
     *
     * @return $this
     */
    public function setSetup(PlanSetup $value)
    {
        return $this->setAttribute('setup', $value);
    }

    public function createSetup(array $data)
    {
        return new PlanSetup($data);
    }

    /**
     * @return null|array
     */
    public function getCustomFields()
    {
        return $this->getAttribute('customFields');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setCustomFields($value)
    {
        return $this->setAttribute('customFields', $value);
    }
}
