<?php

/**
 * Class RebillySubscription
 * This is for subscription
 */
class RebillySubscription extends RebillyRequest
{
    /**
     * @var string $websiteId unique id for each website
     */
    public $websiteId;
    /**
     * @var string $planId unique id for each plan
     */
    public $planId;
    /**
     * @var RebillyAddressInfo $deliveryAddress delivery address of the customer
     */
    public $deliveryAddress;
    /**
     * @var string $switchWhen option when switching subscription
     */
    public $switchWhen;
    /**
     * @var string $cancelBehaviour option when cancelling subscription
     */
    public $cancelBehaviour;
    /**
     * @var integer $quantity subscription's quantity
     */
    public $quantity;
    /**
     * @var string $rebillTime use to modify rebillTime (Y-m-d H:i:s)
     */
    public $rebillTime;

    /**
     * @var RebillyThreeDSecure $threeDSecure 3ds information
     */
    public $threeDSecure;

    /**
     * @var string $subscriptionId unique for each subscription (create new subscription)
     */
    public $subscriptionId;

    /**
     * @var string $lookupSubscriptionId unique for each subscription (find record in DB)
     */
    public $lookupSubscriptionId;

    /**
     * @var RebillyMeteredBilling $meteredBilling metered billing information
     */
    public $meteredBilling;

    /**
     * Customers subscriptions change types
     */
    const SWITCH_AT_NEXT_REBILL = 'AT_NEXT_REBILL';
    const SWITCH_NOW_WITH_PRORATA_REFUND = 'NOW_WITH_PRORATA_REFUND';
    const SWITCH_NOW_WITHOUT_REFUND = 'NOW_WITHOUT_REFUND';

    /***
     * Customers subscriptions cancellation types
     */
    const CANCEL_AT_NEXT_REBILL = 'AT_NEXT_REBILL';
    const CANCEL_NOW = 'NOW_WITHOUT_REFUND';
    const CANCEL_NOW_WITH_PRORATA_REFUND = 'NOW_WITH_PRORATA_REFUND';
    const CANCEL_NOW_FULL_REFUND = 'NOW_WITH_FULL_REFUND';
    const CANCEL_NOW_ALL_REFUND = 'NOW_WITH_ALL_CHARGES_REFUND';

    /**
     * Set lookupSubscriptionId when $id is passed
     * @param null $id
     */
    public function __construct($id = null)
    {
        if ($id) {
            $this->lookupSubscriptionId = $id;
        }
    }

    /**
     * Send POST request to Rebilly
     * @return RebillyResponse response from Rebilly
     */
    public function createThreeDSecure()
    {
        $this->setApiController(RebillyThreeDSecure::THREE_D_SECURE_URL);

        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data, get_class());
    }

    /**
     * Create Metered Billing
     * @return RebillyResponse
     */
    public function createMeteredBilling()
    {
        $this->setApiController(RebillyMeteredBilling::URL);
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
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
