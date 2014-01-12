<?php
/**
 * Class RebillyToken
 *
 */

class RebillyToken extends RebillyRequest
{
    /**
     * Tokens url
     */
    const TOKEN_URL = 'tokens/';

    public $pan;
    public $expMonth;
    public $expYear;
    public $cvv;
    public $firstName;
    public $lastName;
    public $address;
    public $address2;
    public $city;
    public $region;
    public $country;
    public $phoneNumber;
    public $postalCode;
    public $token;

    public function __construct($id = null)
    {
        if ($id) {
            $this->token = $id;
        }
        $this->setApiController(self::TOKEN_URL);
    }

    /**
     * Create a token
     * @return array Rebilly response
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Expires a token
     * @return array Rebilly response
     */
    public function expire()
    {
        $this->setApiController(self::TOKEN_URL . $this->token);
        $data = null;

        return $this->sendDeleteRequest($data);
    }

    /**
     * Retrieves a token
     * @return array Rebilly response
     */
    public function retrieve()
    {
        $this->setApiController(self::TOKEN_URL . $this->token);
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
