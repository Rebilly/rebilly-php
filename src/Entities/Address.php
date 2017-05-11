<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Resource;


/**
 * Class Address.
 */
class Address extends Resource
{
    /*
     * @var string
     */
    private $firstName;

    /*
     * @var string
     */
    private $lastName;

    /*
     * @var string
     */
    private $country;

    /*
     * @var string
     */
    private $organization;

    /*
     * @var string
     */
    private $address;

    /*
     * @var string
     */
    private $address2;

    /*
     * @var string
     */
    private $city;

    /*
     * @var string
     */
    private $region;

    /*
     * @var string
     */
    private $postalCode;

    /*
     * @var []AddressContactInstrument
     */
    private $phoneNumbers;

    /*
     * @var []AddressContactInstrument
     */
    private $emails;

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
        $item = new Address($data);

        return $item;
    }

    /**
     * @param Contact $contact
     *
     * @return Address
     */
    public static function createFromContact(Contact $contact)
    {
        $instance = self::createFromData($contact->jsonSerialize());
        $instance = $instance->setPhoneNumbers([
            [
                'primary' => true,
                'label' => 'main',
                'value' => $contact->getPhoneNumber(),
            ]
        ]);

        return $instance;
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
     * @return []AddressContactInstrument
     */
    public function getPhoneNumbers()
    {
        return $this->getAttribute('phoneNumbers');
    }

    /**
     * @param []AddressContactInstrument $value
     *
     * @return $this
     */
    public function setPhoneNumbers($value)
    {
        return $this->setAttribute('phoneNumbers', $value);
    }

    /**
     * @return []AddressContactInstrument
     */
    public function getEmails()
    {
        return $this->getAttribute('phoneNumbers');
    }

    /**
     * @param []AddressContactInstrument $value
     *
     * @return $this
     */
    public function setEmails($value)
    {
        return $this->setAttribute('emails', $value);
    }

}
