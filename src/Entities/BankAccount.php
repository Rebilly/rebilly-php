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
 * Class BankAccount.
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
     * @return BrowserData
     */
    public function getBrowserData()
    {
        return $this->getAttribute('browserData');
    }

    /**
     * @param BrowserData $value
     *
     * @return $this
     */
    public function setBrowserData(BrowserData $value)
    {
        return $this->setAttribute('browserData', $value);
    }

    /**
     * @param array $data
     *
     * @return BrowserData
     */
    public function createBrowserData(array $data)
    {
        return BrowserData::createFromData($data);
    }

    /**
     * @return string
     */
    public function getRoutingNumber()
    {
        return $this->getAttribute('routingNumber');
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
    public function setToken($value)
    {
        return $this->setAttribute('token', $value);
    }

    /**
     * @return string
     */
    public function getAccountNumberType()
    {
        return $this->getAttribute('accountNumberType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAccountNumberType($value)
    {
        return $this->setAttribute('accountNumberType', $value);
    }

    /**
     * @return string
     */
    public function getAccountType()
    {
        return $this->getAttribute('accountType');
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
    public function getFingerprint()
    {
        return $this->getAttribute('fingerprint');
    }

    /**
     * @return string
     */
    public function getLast4()
    {
        return $this->getAttribute('last4');
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->getAttribute('bic');
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
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
        }

        return null;
    }
}
