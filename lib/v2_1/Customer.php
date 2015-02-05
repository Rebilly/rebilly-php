<?php
namespace Rebilly\v2_1;

use RebillyRequest;
use Exception;

/**
 * Class Customer
 * @package Rebilly\v2_1
 *
 * Usage:
 * ~~~
 * // Create new customer
 * $customer = new Rebilly\v2_1\Customer();
 * $customer->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $customer->setApiKey('apiKey');
 *
 * $customer->email = 'email@email.com';
 * $customer->firstName = 'John';
 * $customer->lastName = 'Doe';
 * $customer->ipAddress = '192.168.1.1';
 * $response =  $customer->create();
 *
 * if ($response->statusCode === 201) {
 *     // Success
 * }
 * ~~~
 *
 * ~~~
 * // Update customer
 * $customer = new Rebilly\v2_1\Customer("customerId");
 * $customer->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $customer->setApiKey('apiKey');
 *
 * $customer->email = 'email@email.com';
 * $customer->firstName = 'John';
 * $customer->lastName = 'Doe';
 * $customer->ipAddress = '192.168.1.1';
 * $response =  $customer->update();
 *
 * if ($response->statusCode === 200) {
 *     // Success
 * }
 * ~~~
 *
 * ~~~
 * // Get a customer
 * $customer = new Rebilly\v2_1\Customer("customerId");
 * $customer->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $customer->setApiKey('apiKey');
 *
 * $response =  $customer->retrieve();
 *
 * if ($response->statusCode === 200) {
 *     // Success
 * }
 * ~~~
 */
class Customer extends RebillyRequest
{
    const END_POINT = 'customers/';
    /** @var  string $email */
    public $email;
    /** @var  string $firstName */
    public $firstName;
    /** @var  string $lastName */
    public $lastName;
    /** @var  string $ipAddress */
    public $ipAddress;
    /** @var  string $id */
    private $id;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->setVersion(2.1);
        $this->setApiController(self::END_POINT);
    }

    /**
     * Create new customer
     * @return RebillyResponse
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Update customer
     * @return RebillyResponse
     */
    public function update()
    {
        if (empty($this->id)) {
            throw new Exception('customer id cannot be empty.');
        }

        $this->setApiController(self::END_POINT . $this->id);
        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data);
    }

    /**
     * List All customers
     * @return RebillyResponse
     */
    public function listAll()
    {
        return $this->sendGetRequest();
    }

    /**
     * Get a customer
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('customer id cannot be empty.');
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
