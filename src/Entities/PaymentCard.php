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
 * Class PaymentCard
 *
 * ```json
 * {
 *   "id": "ABCD2345",
 *   "last4": "1234",
 *   "expYear": "2017",
 *   "expMonth": "07",
 *   "status": "active",
 *   "brand": "Visa",
 *   "binCountry": "US",
 *   "binBank": "Bank123",
 *   "customer": "ABCD1234",
 *   "billingContact": "ADDRESS1",
 *   "createdTime": "2015-02-11 04:45:23",
 *   "updatedTime": "2015-02-11 04:45:23"
 *   "customFields": []
 * }
 * ```
 *
 * @todo Rename property `customer` to `customerId`
 * @todo Rename property `billingContact` to `billingContactId`
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentCard extends Entity
{
    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPan($value)
    {
        return $this->setAttribute('pan', $value);
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
    public function getExpYear()
    {
        return $this->getAttribute('expYear');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpYear($value)
    {
        return $this->setAttribute('expYear', $value);
    }

    /**
     * @return string
     */
    public function getExpMonth()
    {
        return $this->getAttribute('expMonth');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpMonth($value)
    {
        return $this->setAttribute('expMonth', $value);
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
    public function getBrand()
    {
        return $this->getAttribute('brand');
    }

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
    public function getBillingContactId()
    {
        return $this->getAttribute('billingContactId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBillingContactId($value)
    {
        return $this->setAttribute('billingContactId', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCvv($value)
    {
        return $this->setAttribute('cvv', $value);
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
    public function getBin()
    {
        return $this->getAttribute('bin');
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->getAttribute('bankName');
    }

    /**
     * @return string
     */
    public function getBankCountry()
    {
        return $this->getAttribute('bankCountry');
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->getAttribute('billingAddress');
    }

    /**
     * @param Address $value
     *
     * @return $this
     */
    public function setBillingAddress($value)
    {
        return $this->setAttribute('billingAddress', $value->jsonSerialize());
    }
}
