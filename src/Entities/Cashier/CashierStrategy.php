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

use Rebilly\Rest\Entity;

/**
 * Class CashierStrategy.
 */
final class CashierStrategy extends Entity
{
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
    public function filter()
    {
        return $this->getAttribute('filter');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFilter($value)
    {
        return $this->setAttribute('filter', $value);
    }

    /**
     * @return CashierStrategyAmounts
     */
    public function getAmounts()
    {
        return $this->getAttribute('amounts');
    }

    /**
     * @param CashierStrategyAmounts|array $value
     *
     * @return $this
     */
    public function setAmounts($value)
    {
        return $this->setAttribute('amounts', $value);
    }

    /**
     * @return CashierCustomAmount|null
     */
    public function getCustomAmount()
    {
        return $this->getAttribute('customAmount');
    }

    /**
     * @param CashierCustomAmount|array|null $value
     *
     * @return $this
     */
    public function setCustomAmount($value)
    {
        return $this->setAttribute('customAmount', $value);
    }

    /**
     * @param array $data
     *
     * @return CashierCustomAmount
     */
    public function createCustomAmount(array $data)
    {
        return CashierCustomAmount::createFromData($data);
    }

    /**
     * @param array $data
     *
     * @return CashierStrategyAmounts
     */
    public function createAmounts(array $data)
    {
        return CashierStrategyAmounts::createFromData($data);
    }
}
