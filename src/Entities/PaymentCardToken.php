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
 * Class PaymentCardToken
 *
 * ```json
 * {
 *   "firstName"
 *   "lastName"
 *   "address"
 *   "address2"
 *   "city"
 *   "region"
 *   "country"
 *   "phoneNumber"
 *   "postalCode"
 *   "fingerprint"
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentCardToken extends Entity
{
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFirstName($value)
    {
        return $this->setAttribute('firstName', $value);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute('lastName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLastName($value)
    {
        return $this->setAttribute('lastName', $value);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->getAttribute('address');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAddress($value)
    {
        return $this->setAttribute('address', $value);
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->getAttribute('address2');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAddress2($value)
    {
        return $this->setAttribute('address2', $value);
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->getAttribute('city');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCity($value)
    {
        return $this->setAttribute('city', $value);
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->getAttribute('region');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRegion($value)
    {
        return $this->setAttribute('region', $value);
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->getAttribute('country');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCountry($value)
    {
        return $this->setAttribute('country', $value);
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->getAttribute('postalCode');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPostalCode($value)
    {
        return $this->setAttribute('postalCode', $value);
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getAttribute('phoneNumber');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPhoneNumber($value)
    {
        return $this->setAttribute('phoneNumber', $value);
    }

    /**
     * @return string
     */
    public function getFingerprint()
    {
        return $this->getAttribute('fingerprint');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFingerprint($value)
    {
        return $this->setAttribute('fingerprint', $value);
    }

    /**
     * @param PaymentInstrument $value
     *
     * @return $this
     */
    public function setPaymentInstrument(PaymentInstrument $value)
    {
        return $this->setAttribute('paymentInstrument', $value->jsonSerialize());
    }
}
