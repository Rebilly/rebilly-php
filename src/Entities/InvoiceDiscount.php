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
 * Class InvoiceDiscount.
 */
final class InvoiceDiscount extends Resource
{
    /**
     * @return string
     */
    public function getCouponId()
    {
        return $this->getAttribute('couponId');
    }

    /**
     * @return string
     */
    public function getRedemptionId()
    {
        return $this->getAttribute('redemptionId');
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->getAttribute('context');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }
}
