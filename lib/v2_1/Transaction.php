<?php
namespace Rebilly\v2_1;

use RebillyRequest;
use Exception;

/**
 * Class RebillyTransaction
 *
 * Usage:
 * ===========================
 * Refund a transaction
 * ===========================
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
 * ===========================
 * Get a transaction
 * ===========================
 * ~~~
 * // Get a transaction
 * $transaction = new Rebilly\v2_1\Transaction('transactionId');
 * $transaction->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $transaction->setApiKey('apiKey');
 *
 * $response = $transaction->retrieve();
 * if ($response.statusCode === 200) {
 *     // Success
 * }
 * ~~~
 * ===========================
 * Get all transactions that belong to a customer
 * ===========================
 * ~~~
 * // Get a transaction
 * $transaction = new Rebilly\v2_1\Transaction(null, 'customerId');
 * $transaction->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $transaction->setApiKey('apiKey');
 *
 * $response = $transaction->retrieveByCustomer();
 * if ($response.statusCode === 200) {
 *     // Success
 * }
 * ~~~
 */
class Transaction extends RebillyRequest
{
    const CUSTOMER_END_POINT = 'customers/';
    const TRANSACTION_END_POINT = 'transactions/';
    /**
     * @var string $amount Amount to be refunded.
     */
    public $amount;
    /** @var string $customerId */
    private $customerId;
    /**
     * @var string $id transactionId
     */
    private $id;

    /**
     * Set version
     * @param null $id
     * @param null $customerId
     */
    public function __construct($id = null, $customerId = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        if (!empty($customerId)) {
            $this->customerId = $customerId;
        }
        $this->setVersion(2.1);
    }

    /**
     * Do refund
     * @return RebillyResponse
     */
    public function refund()
    {
        $this->setApiController(self::TRANSACTION_END_POINT . $this->id . '/refund/');

        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Retrieve a transaction
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('Transaction ID cannot be empty.');
        }
        $this->setApiController(self::TRANSACTION_END_POINT . $this->id);

        return $this->sendGetRequest();
    }

    /**
     * Retrieve a transaction list
     * @return RebillyResponse
     */
    public function listAll()
    {
        $this->setApiController(self::TRANSACTION_END_POINT);

        return $this->sendGetRequest();
    }

    /**
     * Get all transactions that belong to a customer
     * @return RebillyResponse
     */
    public function retrieveByCustomer()
    {
        if (empty($this->customerId)) {
            throw new Exception('Customer ID cannot be empty.');
        }
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . '/' . self::TRANSACTION_END_POINT);

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
