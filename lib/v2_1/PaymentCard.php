<?php

namespace Rebilly\v2_1;

use RebillyRequest;
use Exception;

/**
 * Class PaymentCard
 * @package Rebilly\v2_1
 *
 * Usage:
 * ~~~
 * // Get all card belong to a customer
 * $card = new Rebilly\v2_1\PaymentCard("customerId");
 * $card->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $card->setApiKey('apiKey');
 *
 * $response = $card->listAll();
 * if ($response.statusCode === 200) {
 *     // Success
 * }
 * ~~~
 *
 * ~~~
 * // Create new payment card
 * $card = new Rebilly\v2_1\PaymentCard("customerId");
 * $card->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $card->setApiKey('apiKey');
 * $card->pan = "4111111111111111";
 * $card->expMonth = "02";
 * $card->expYear = "2018";
 * $card->contact = "contact123ABC";
 *
 * $response = $card->create();
 * if ($response.statusCode === 201) {
 *     // Success
 * }
 * ~~~
 *
 * ~~~
 * // Deactivate the payment card
 * $card = new Rebilly\v2_1\PaymentCard("customerId", "paymentCardId");
 * $card->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $card->setApiKey('apiKey');
 *
 * $response = $card->deactivate();
 * if ($response.statusCode === 200) {
 *     // Success
 * }
 * ~~~
 */
class PaymentCard extends RebillyRequest
{
    const CARD_END_POINT = '/payment-cards/';
    const CUSTOMER_END_POINT = 'customers/';

    /** @var int $pan Primary Account Number */
    public $pan;
    /** @var int $expMonth */
    public $expMonth;
    /** @var int $expYear */
    public $expYear;
    /** @var string $contact */
    public $contact;
    /** @var int $cvv */
    public $cvv;
    /** @var string $token */
    public $token;

    /** @var string $customerId */
    private $customerId;
    /** @var string $id */
    private $id;

    public function __construct($customerId, $id = null)
    {
        $this->customerId = $customerId;
        if (empty($this->customerId)) {
            throw new Exception('customerId cannot be empty.');
        }
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->setVersion(2.1);
    }

    /**
     * Get a payment card
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('PaymentCard id cannot be empty.');
        }
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::CARD_END_POINT . $this->id);

        return $this->sendGetRequest();
    }

    /**
     * List all payment card
     * @return RebillyResponse
     */
    public function listAll()
    {
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::CARD_END_POINT);

        return $this->sendGetRequest();
    }

    /**
     * Create new payment card with auto generated ID
     * @return RebillyResponse
     */
    public function create()
    {
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::CARD_END_POINT);

        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Create new payment card with ID
     * @return RebillyResponse
     */
    public function update()
    {
        if (empty($this->id)) {
            throw new Exception('Card ID cannot be empty.');
        }
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::CARD_END_POINT . $this->id);

        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data);
    }

    /**
     * Do an authorization on the payment card
     * @return RebillyResponse
     */
    public function authorize()
    {
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::CARD_END_POINT . 'authorization/');

        return $this->sendPostRequest(null);
    }

    /**
     * Deactivate a payment card
     * @return RebillyResponse
     */
    public function deactivate()
    {
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::CARD_END_POINT . 'deactivation/');

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
