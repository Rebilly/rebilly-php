<?php
namespace Rebilly\v2_1;

use RebillyRequest;

/**
 * Class RebillyTransaction
 *
 * Usage:
 * ~~~
 * // Create refund
 * $transaction = new Rebilly\v2_1\Transaction('transactionId');
 * $transaction->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $transaction->setApiKey('apiKey');
 * //Set amount if want to do partial refund, full refund otherwise.
 * $transaction->amount = '5.99';
 *
 * $response = $transaction->refund();
 * if ($response.statusCode === 200) {
 *     // Successfully refunded
 * }
 * ~~~
 *
 * ~~~
 * // Get a transaction
 * $transaction = new Rebilly\v2_1\Transaction('transactionId');
 * $transaction->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $transaction->setApiKey('apiKey');
 *
 * $response = $transaction->retrieve();
 * if ($response.statusCode === 200) {
 *
 * }
 * ~~~
 */
class Transaction extends RebillyRequest
{
    const END_POINT = 'transactions/';
    /**
     * @var string $amount Amount to be refunded.
     */
    public $amount;
    /**
     * @var string $id transactionId
     */
    public $id;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->setVersion(2.1);
    }

    /**
     * Create authorized transaction
     * @return RebillyResponse
     */
    public function refund()
    {
        $this->setApiController(self::END_POINT . $this->id . '/refund/');

        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Retrieve a transaction
     * @return RebillyResponse
     */
    public function retrieve()
    {
        $this->setApiController(self::END_POINT . $this->id);

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
