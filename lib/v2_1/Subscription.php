<?php

namespace Rebilly\v2_1;
use RebillyRequest;
use Exception;

/**
 * Class Subscription
 * @package Rebilly\v2_1
 *
 * Usage:
 * ~~~
 * // Create new subscription
 * $subscription = new Rebilly\v2_1\Subscription();
 * $subscription->plan = "plan123ABC";
 * $subscription->website = "web123ABC";
 * $subscription->paymentCard = "cardId123ABC";
 * $subscription->deliveryAddress = "AddressId123";

 * $response = $subscription->create();
 * if ($response.statusCode === 201) {
 *     // Successfully created subscription
 * }
 * ~~~
 *
 * ~~~
 * // Update subscription
 * $subscription = new Rebilly\v2_1\Subscription("subscriptionId");
 * $subscription->renewalTime = "2015-01-01 00:00:00";
 * $subscription->deliveryAddress = "AddressId123";

 * $response = $subscription->update();
 * if ($response.statusCode === 200) {
 *     // Successfully created subscription
 * }
 * ~~~
 *
 * ~~~
 * // Cancel subscription
 * $subscription = new Rebilly\v2_1\Subscription("subscriptionId");
 * $subscription->policy = "NOW_WITHOUT_REFUND";

 * $response = $subscription->cancel();
 * if ($response.statusCode === 200) {
 *     // Successfully created subscription
 * }
 * ~~~
 */
class Subscription extends RebillyRequest
{
    const CUSTOMER_END_POINT = 'customers/';
    const SUBSCRIPTION_END_POINT = '/subscriptions/';

    /** @var  string $plan */
    public $plan;
    /** @var  string $website */
    public $website;
    /** @var  string $paymentCard */
    public $paymentCard;
    /** @var  string $deliveryContact */
    public $deliveryContact;
    /** @var  integer $quantity */
    public $quantity;
    /** @var  string $policy */
    public $policy;

    private $customerId;
    private $id;

    /**
     * Need customerId
     * @param string $customerId customer id
     * @param null $id subscription id
     * @throws Exception
     */
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
     * Create new subscription
     * @return RebillyResponse
     */
    public function create()
    {
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::SUBSCRIPTION_END_POINT);
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Update subscription
     * @return RebillyResponse
     */
    public function update()
    {
        if (empty($this->id)) {
            throw new Exception('subscription id cannot be empty.');
        }
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::SUBSCRIPTION_END_POINT . $this->id);
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Cancel subscription
     * @return RebillyResponse
     */
    public function cancel()
    {
        if (empty($this->id)) {
            throw new Exception('subscription id cannot be empty.');
        }

        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::SUBSCRIPTION_END_POINT . $this->id . '/cancel');
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Switch to new subscription
     * @return RebillyResponse
     */
    public function switchPlan()
    {
        if (empty($this->id)) {
            throw new Exception('subscription id cannot be empty.');
        }

        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::SUBSCRIPTION_END_POINT . $this->id . '/switch');
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Get a subscription
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('subscription id cannot be empty.');
        }

        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::SUBSCRIPTION_END_POINT . $this->id);

        return $this->sendGetRequest();
    }

    /**
     * List all subscriptions belong to a customer
     * @return RebillyResponse
     */
    public function listAll()
    {
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . self::SUBSCRIPTION_END_POINT);

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
