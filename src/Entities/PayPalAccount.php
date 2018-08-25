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
 * Class PayPalAccount
 *
 * ```json
 * {
 *   "id": "ABCD2345",
 *   "customerId": "ABCD1234",
 *   "contactId": "ADDRESS1",
 *   "username": "Bank name",
 *   "status": "active",
 *   "createdTime": "2015-02-11 04:45:23",
 *   "updatedTime": "2015-02-11 04:45:23"
 *   "customFields": []
 * }
 * ```
 *
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
     * @deprecated The method is deprecated and will be removed in next version. Please use getBillingAddress.
     *
     * @return string
     */
    public function getContactId()
    {
        return $this->getAttribute('contactId');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setContactId($value)
    {
        return $this->setAttribute('contactId', $value);
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->getAttribute('username');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUserName($value)
    {
        return $this->setAttribute('username', $value);
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
     * @return string
     */
    public function getApprovalLink()
    {
        return $this->getLink('approval_url');
    }

    /**
     * @return null|Customer
     */
    public function getCustomer()
    {
        return $this->hasEmbeddedResource('customer') ? new Customer($this->getEmbeddedResource('customer')) : null;
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use getBillingAddress.
     *
     * @return null|Contact
     */
    public function getContact()
    {
        return $this->hasEmbeddedResource('contact') ? new Contact($this->getEmbeddedResource('contact')) : null;
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
