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
 * @author Dara Pich <dara.pich@rebilly.com>
 * @version 0.1
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
     * @deprecated The method is deprecated and will be removed in next version. Please use getAddress.
     *
     * @return string
     */
    public function getContactId()
    {
        return $this->getAttribute('contactId');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setAddress.
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
     * @deprecated The method is deprecated and will be removed in next version. Please use getAddress.
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
    public function getAddress()
    {
        return $this->getAttribute('address');
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setAddress($value)
    {
        return $this->setAttribute('address', $value);
    }
}
