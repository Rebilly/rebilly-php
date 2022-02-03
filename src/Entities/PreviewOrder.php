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

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

class PreviewOrder extends Entity
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
    public function getSubtotalAmount()
    {
        return $this->getAttribute('subtotalAmount');
    }

    /**
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->getAttribute('taxAmount');
    }

    /**
     * @return float
     */
    public function getShppingAmount()
    {
        return $this->getAttribute('shippingAmount');
    }

    /**
     * @return float
     */
    public function getDiscountsAmount()
    {
        return $this->getAttribute('discountsAmount');
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->getAttribute('total');
    }

    /**
     * @return array
     */
    public function getShippingRates()
    {
        return $this->getAttribute('shippingRates');
    }

    /**
     * @return array
     */
    public function getLineItems()
    {
        return $this->getAttribute('lineItems');
    }

    /**
     * @return array
     */
    public function getTaxes()
    {
        return $this->getAttribute('taxes');
    }

    /**
     * @return array
     */
    public function getDiscounts()
    {
        return $this->getAttribute('discounts');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setItems(array $value)
    {
        return $this->setAttribute('items', $value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebsiteId(array $value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setBillingAddress($value)
    {
        return $this->setAttribute('billingAddress', $value);
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setDeliveryAddress($value)
    {
        return $this->setAttribute('deliveryAddress', $value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setShippingRateId(array $value)
    {
        return $this->setAttribute('shippingRateId', $value);
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setCouponIds($value)
    {
        return $this->setAttribute('couponIds', $value);
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setShipping($value)
    {
        return $this->setAttribute('shipping', $value);
    }
}
