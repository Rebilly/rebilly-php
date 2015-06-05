<?php

namespace Rebilly\v2_1;
use RebillyRequest;
use Exception;

/**
 * Class Token
 * @package Rebilly\v2_1
 *
 * Usage:
 * ~~~
 * ====================
 * Create a token
 * ====================
 * $token = new Rebilly\v2_1\Token();
 * $transaction->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $transaction->setApiKey('apiKey');
 * $token->pan = "4111111111111111";
 * $token->expMonth = "12";
 * $token->expYear = "2020";
 * $token->cvv = "123";
 * $token->firstName = "John";
 * $token->lastName = "User";
 * $token->address = "2020 main street";
 * $token->city = "LA";
 * $token->fingerprint = "123456789";
 *
 * $response =  $token->create();
 * if ($response->statusCode === 201) {
 *     // Success
 * }
 * ~~~
 * ====================
 * Get a token
 * ====================
 * ~~~
 * $token = new \Rebilly\v2_1\Token("tokenId");
 * $token->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $token->setApiKey("apiKey");
 *
 * $response =  $token->retrieve();
 * if ($response->statusCode === 200) {
 *     // Success
 * }
 * ~~~
 * ====================
 * Expire a token
 * ====================
 * ~~~
 * $token = new \Rebilly\v2_1\Token("tokenId");
 * $token->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $token->setApiKey("apiKey");
 *
 * $response =  $token->expire();
 * if ($response->statusCode === 200) {
 *     // Success
 * }
 * ~~~
 */
class Token extends RebillyRequest
{
    const TOKEN_END_POINT = 'tokens/';
    /** @var string $pan */
    public $pan;
    /** @var string $expMonth */
    public $expMonth;
    /** @var string $expYear */
    public $expYear;
    /** @var string $cvv */
    public $cvv;
    /** @var string $firstName */
    public $firstName;
    /** @var string $lastName */
    public $lastName;
    /** @var string $address */
    public $address;
    /** @var string $address2 */
    public $address2;
    /** @var string $city */
    public $city;
    /** @var string $region */
    public $region;
    /** @var string $country */
    public $country;
    /** @var string $phoneNumber */
    public $phoneNumber;
    /** @var string $postalCode */
    public $postalCode;
    /** @var string $fingerprint */
    public $fingerprint;
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
        $this->setApiController(self::TOKEN_END_POINT);
    }

    /**
     * Create new token
     * @return RebillyResponse
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Get a token
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('Token cannot be empty.');
        }
        $this->setApiController(self::TOKEN_END_POINT . $this->id);

        return $this->sendGetRequest();
    }

    /**
     * Expire a token
     * @return RebillyResponse
     */
    public function expire()
    {
        if (empty($this->id)) {
            throw new Exception('Token cannot be empty.');
        }
        $this->setApiController(self::TOKEN_END_POINT . $this->id . '/expiration/');

        return $this->sendPostRequest(null);
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
