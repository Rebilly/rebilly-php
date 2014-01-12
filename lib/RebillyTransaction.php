<?php

/**
 * Class RebillyTransaction
 */
class RebillyTransaction extends RebillyRequest
{

    public $lookupTransactionId;
    public $amount;

    public function __construct($id)
    {
        $this->lookupTransactionId = $id;
        $this->setApiController('transactions');
    }

    /**
     * Send request to Rebilly to refund a transaction
     * @return RebillyResponse response from Rebilly
     */
    public function refund()
    {
        $data = $this->buildRequest($this);

        return $this->sendDeleteRequest($data, get_class());
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
