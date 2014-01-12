<?php

class RebillyPaymentCard extends RebillyRequest
{
    /**
     * @var string $pan card number
     */
    public $pan;
    /**
     * @var string $expMonth expiration's month of the card
     */
    public $expMonth;
    /**
     * @var string $expYear expiration's year of the card
     */
    public $expYear;
    /**
     * @var string $cvv cvv of the card
     */
    public $cvv;
    /**
     * @var string $last4 last 4 number of the card
     */
    public $last4;
    /**
     * @var string $token unique one-time-use token to use in lieu of card
     */
    public $token;
    /**
     * @var RebillySubscription $subscription subscription attach to the card
     */
    public $subscription;
    /**
     * @var RebillyCharge $charge charge on the card
     */
    public $charge;
    /**
     * @var RebillyCharge $authorization authorization on the card
     */
    public $authorization;
    /**
     * @var RebillyAddressInfo $billyAddress billing address of the card holder
     */
    public $billingAddress;

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
