<?php

/**
 * Class RebillyTransaction
 *
 * Usage:
 * <pre>
 *     $transaction = new RebillyTransaction('transactionId');
 *     // Set proper environment Production or Staging
 *     $transaction->setEnvironment(RebillyRequest::ENV_STAGING);
 *     $transaction->setApiKey('apiKey');
 *     //Set amount if want to do partial refund, full refund otherwise.
 *     $transaction->amount = '5.99';
 *
 *     $response = $transaction->refund();
 *
 * </pre>
 * Available Attributes:
 * @property string $lookupTransactionId
 * @property string $amount
 */
class RebillyTransaction extends RebillyRequest
{
    /**
     * @var string $lookupTransactionId Lookup transactionId
     */
    public $lookupTransactionId;
    /**
     * @var string $amount Amount to be refunded.
     */
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
