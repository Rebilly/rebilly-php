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

use Rebilly\Entities\Contact\Email;
use Rebilly\Entities\Contact\PhoneNumber;
use Rebilly\Rest\Resource;

/**
 * Class Address.
 */
class Address extends Resource
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * @param array $data
     *
     * @return Address
     */
    public static function createFromData(array $data)
    {
        return new self($data);
    }

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
    public function getOrganization()
    {
        return $this->getAttribute('organization');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setOrganization($value)
    {
        return $this->setAttribute('organization', $value);
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
     * @param string $value - ISO 3166-1 Country code
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
     * @return PhoneNumber[]
     */
    public function getPhoneNumbers()
    {
        return $this->getAttribute('phoneNumbers');
    }

    /**
     * @param PhoneNumber[] $value
     *
     * @return $this
     */
    public function setPhoneNumbers($value)
    {
        return $this->setAttribute('phoneNumbers', $value);
    }

    /**
     * @return Email[]
     */
    public function getEmails()
    {
        return $this->getAttribute('emails');
    }

    /**
     * @param Email[] $value
     *
     * @return $this
     */
    public function setEmails($value)
    {
        return $this->setAttribute('emails', $value);
    }
}
