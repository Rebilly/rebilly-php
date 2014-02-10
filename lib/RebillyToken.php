<?php
/**
 * Class RebillyToken
 *
 * Usage: example to create token
 * <pre>
 *     // Please checkout our documentation for more examples
 *     $token = new RebillyToken();
 *     $token->setEnvironment(RebillyRequest::ENV_DEVELOPMENT);
 *     $token->setApiKey('apiKey');
 *     $token->pan = '4111111111111111';
 *     $token->expMonth = '10';
 *     $token->expYear = '2018';
 *     $token->firstName = 'Adam';
 *     $token->lastName = 'Smith';
 *
 *     $response = $token->create();
 *     $rawResponse = $response->getRawResponse();
 *
 *     if ($rawResponse->action === RebillyResponse::TOKEN_CREATE && $rawResponse->status === RebillyResponse::STATUS_SUCCESS) {
 *         // Successfully create token
 *         // to get token's id
 *         $tokenId = $rawResponse->token->id;
 *     }
 * </pre>
 *
 * Available attributes:
 * @var string $pan
 * @var string $expMonth
 * @var string $expYear
 * @var string $cvv
 * @var string $firstName
 * @var string $lastName
 * @var string $address
 * @var string $address2
 * @var string $city
 * @var string $region
 * @var string $country
 * @var string $phoneNumber
 * @var string $postalCode
 * @var string $token
 */

class RebillyToken extends RebillyRequest
{
    /**
     * Tokens url
     */
    const TOKEN_URL = 'tokens/';

    /**
     * @var string $pan Primary Account Number
     */
    public $pan;
    /**
     * @var string $expMonth expiry month
     */
    public $expMonth;
    /**
     * @var string $expYear expiry year
     */
    public $expYear;
    /**
     * @var string $cvv 3 or 4 digits security number
     */
    public $cvv;
    /**
     * @var string $firstName first name
     */
    public $firstName;
    /**
     * @var string $lastName last name
     */
    public $lastName;
    /**
     * @var string $address address
     */
    public $address;
    /**
     * @var string $address other address
     */
    public $address2;
    /**
     * @var string $city city
     */
    public $city;
    /**
     * @var string $region region
     */
    public $region;
    /**
     * @var string $country county
     */
    public $country;
    /**
     * @var string $phoneNumber phone number
     */
    public $phoneNumber;
    /**
     * @var string $postalCode postal code
     */
    public $postalCode;
    /**
     * @var string $token token
     */
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
