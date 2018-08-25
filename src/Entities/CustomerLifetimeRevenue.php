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

use Rebilly\Rest\Resource;

/**
 * Class CustomerLifetimeRevenue.
 */
class CustomerLifetimeRevenue extends Resource
{
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @return float
     */
    public function getAmountUsd()
    {
        return $this->getAttribute('amountUsd');
    }

    /**
     * @param array $data
     *
     * @return CustomerLifetimeRevenue
     */
    public static function createFromData(array $data)
    {
        return new self($data);
    }
}
