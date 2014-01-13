<?php

class RebillyCharge extends RebillyRequest
{
    /**
     * @var string $amount amount to be charge
     */
    public $amount;
    /**
     * @var string $websiteId unique id for each website
     */
    public $websiteId;
    /**
     * @var string $currency three letter code currency
     */
    public $currency;
    /**
     * @var string $processorAccountId unique id for processor account. To specify which processor account to be used
     */
    public $processorAccountId;
    /**
     * @var RebillyAddressInfo $deliveryAddress delivery address of a customer
     */
    public $deliveryAddress;

    /**
     * @var RebillyThreeDSecure $threeDSecure 3ds info
     */
    public $threeDSecure;

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
