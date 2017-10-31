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
 * Class BankAccount
 *
 * ```json
 * {
 *   "id": "ABCD2345",
 *   "customerId": "ABCD1234",
 *   "contactId": "ADDRESS1",
 *   "name": "Bank name",
 *   "accountType": "checking",
 *   "routingNumber": "12345",
 *   "accountNumber": "12345",
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

final class BankAccount extends Entity
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
     * @return Address
     */
    public function getAddress()
    {
        return $this->getAttribute('address');
    }

    /**
     * @param array $data
     *
     * @return Address
     */
    public function createAddress(array $data)
    {
        return new Address($data);
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setAddress($value)
    {
        return $this->setAttribute('address', $value instanceof Address ? $value->jsonSerialize() : $value);
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->getAttribute('bankName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBankName($value)
    {
        return $this->setAttribute('bankName', $value);
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
     * @param string $value
     *
     * @return $this
     */
    public function setRoutingNumber($value)
    {
        return $this->setAttribute('routingNumber', $value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAccountNumber($value)
    {
        return $this->setAttribute('accountNumber', $value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAccountType($value)
    {
        return $this->setAttribute('accountType', $value);
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
     * @return null|Customer
     */
    public function getCustomer()
    {
        if ($this->hasEmbeddedResource('customer')) {
            return new Customer($this->getEmbeddedResource('customer'));
        } else {
            return null;
        }
    }

    /**
     * @return null|Contact
     */
    public function getContact()
    {
        if ($this->hasEmbeddedResource('contact')) {
            return new Contact($this->getEmbeddedResource('contact'));
        } else {
            return null;
        }
    }
}
