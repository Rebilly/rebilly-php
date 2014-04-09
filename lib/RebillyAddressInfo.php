<?php

class RebillyAddressInfo extends RebillyRequest
{
    /**
     * @var string $firstName customer's first name
     */
    public $firstName;

    /**
     * @var string $lastName customer's last name
     */
    public $lastName;

    /**
     * @var string $address customer's address
     */
    public $address;

    /**
     * @var string $address2 customer's address
     */
    public $address2;

    /**
     * @var string $city customer's city
     */
    public $city;

    /**
     * @var string $region customer's region
     */
    public $region;

    /**
     * @var string $country customer's country
     */
    public $country;

    /**
     * @var string $phoneNumber customer's phone number
     */
    public $phoneNumber;

    /**
     * @var string $postCode customer postal code
     */
    public $postalCode;

    /**
     * Return all the property of this class
     * @param $class
     * @return array
     */
    public function getPublicProperties($class)
    {
        return get_object_vars($class);
    }
}
