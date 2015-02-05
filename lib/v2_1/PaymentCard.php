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
 * $transaction = new Rebilly\v2_1\PaymentCard("customerId");
 * $transaction->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $transaction->setApiKey('apiKey');
 *
 * $response = $transaction->listAll();
 * if ($response.statusCode === 200) {
 *
 * }
 * ~~~
 */
class PaymentCard extends RebillyRequest
{
    const CARD_END_POINT = '/payment-cards/';
    const CUSTOMER_END_POINT = 'customers/';

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
            throw new Exception('invoice id cannot be empty.');
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
     * Return all the property of this class
     * @param $class
     * @return array
     */
    public function getPublicProperties($class)
    {
        return get_object_vars($class);
    }
} 
