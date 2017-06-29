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
 * Class Invoice
 *
 * ```json
 * {
 *   "customer"
 *   "website"
 *   "currency"
 *   "dueTime"
 *   "billingContact"
 *   "deliveryContact"
 * }
 * ```
 */
final class Invoice extends Entity
{
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customer');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customer', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('website');
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('website', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
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
     * @return string
     */
    public function getDueTime()
    {
        return $this->getAttribute('dueTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDueTime($value)
    {
        return $this->setAttribute('dueTime', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use getBillingAddress.
     *
     * @return string
     */
    public function getBillingContactId()
    {
        return $this->getAttribute('billingContactId');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setBillingContactId($value)
    {
        return $this->setAttribute('billingContactId', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use getDeliveryAddress.
     *
     * @return string
     */
    public function getDeliveryContactId()
    {
        return $this->getAttribute('deliveryContactId');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setDeliveryAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setDeliveryContactId($value)
    {
        return $this->setAttribute('deliveryContactId', $value);
    }

    /**
     * @return null|LeadSource
     */
    public function getLeadSource()
    {
        if ($this->hasEmbeddedResource('leadSource')) {
            return new LeadSource($this->getEmbeddedResource('leadSource'));
        } else {
            return null;
        }
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->getAttribute('items');
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->getAttribute('billingAddress');
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
     * @return Address
     */
    public function getDeliveryAddress()
    {
        return $this->getAttribute('deliveryAddress');
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
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return int
     */
    public function getCollectionPeriod()
    {
        return $this->getAttribute('collectionPeriod');
    }

    /**
     * @return int
     */
    public function getDelinquentCollectionPeriod()
    {
        return $this->getAttribute('delinquentCollectionPeriod');
    }
}
