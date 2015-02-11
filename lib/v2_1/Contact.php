<?php

namespace Rebilly\v2_1;

use RebillyRequest;
use Exception;

/**
 * Class Contact
 * @package Rebilly\v2_1
 *
 * Usage:
 * ~~~
 * // Create new contact
 * $contact = new Rebilly\v2_1\Contact();
 * $contact->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $contact->setApiKey('apiKey');
 *
 * $contact->firstName = 'John';
 * $contact->lastName = 'Doe';
 * $contact->organization = 'Test Org';
 * $contact->address = '2020 Rue test';
 * $contact->city = 'City';
 *
 * $response =  $contact->create();
 *
 * if ($response->statusCode === 201) {
 *     // Success
 * }
 * ~~~
 *
 * ~~~
 * // Get a contact
 * $contact = new Rebilly\v2_1\Contact("contactId");
 * $contact->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $contact->setApiKey('apiKey');
 *
 * $response =  $contact->retrieve();
 *
 * if ($response->statusCode === 201) {
 *     // Success
 * }
 * ~~~
 */
class Contact extends RebillyRequest
{
    const END_POINT = 'contacts/';
    /** @var  string $firstName */
    public $firstName;
    /** @var  string $lastName */
    public $lastName;
    /** @var  string $organization */
    public $organization;
    /** @var  string $address */
    public $address;
    /** @var  string $address2 */
    public $address2;
    /** @var  string $city */
    public $city;
    /** @var  string $region */
    public $region;
    /** @var  string $country */
    public $country;
    /** @var  string $phoneNumber */
    public $phoneNumber;
    /** @var  string $postalCode */
    public $postalCode;

    /** @var string $id */
    private $id;
    /**
     * Set api version and endpoint
     * @param null $id
     */
    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->setVersion(2.1);
        $this->setApiController(self::END_POINT);
    }

    /**
     * Create new contact
     * @return RebillyResponse
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Get a contact
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('contact id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id);

        return $this->sendGetRequest();
    }

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
