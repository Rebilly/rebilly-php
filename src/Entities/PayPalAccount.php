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

use Rebilly\Rest\Entity;

/**
 * Class PayPalAccount.
 */

final class PayPalAccount extends Entity
{
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->getAttribute('username');
    }

    /**
     * @return array
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

    /**
     * @return array
     */
    public function getBrowserData()
    {
        return $this->getAttribute('browserData');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setBrowserData($value)
    {
        return $this->setAttribute('browserData', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use getApprovalUrl.
     *
     * @return string
     */
    public function getApprovalLink()
    {
        return $this->getApprovalUrl();
    }

    /**
     * @return null|string
     */
    public function getApprovalUrl()
    {
        return $this->getLink('approvalUrl');
    }

    /**
     * @return null|Customer
     */
    public function getCustomer()
    {
        return $this->hasEmbeddedResource('customer') ? new Customer($this->getEmbeddedResource('customer')) : null;
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
     * @param array $data
     *
     * @return Address
     */
    public function createBillingAddress(array $data)
    {
        return new Address($data);
    }
}
