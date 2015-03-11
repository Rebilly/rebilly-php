<?php

namespace Rebilly\v2_1;
use RebillyRequest;
use Exception;

/**
 * Class Dispute
 * @package Rebilly\v2_1
 *
 * Usage:
 * ===========================
 * Create Dispute
 * ===========================
 * ~~~
 * $dispute = new Rebilly\v2_1\Dispute();
 * $dispute->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $dispute->setApiKey('your api key');
 * $dispute->processorAccountId = 'RebillyProcessor';
 * $dispute->type = '1CB';
 * $dispute->postedTime = '2013-02-19 13:10:30';
 * $dispute->transactionId = 'transactionId';
 * $dispute->amount = '5.99';
 * $dispute->disputeReasonCodeId = '1000';
 * $dispute->currency = 'USD';
 * $dispute->rawResponse = 'Raw Response';
 *
 * $response =  $dispute->create();
 *
 * if ($response->statusCode === 201) {
 *     //Success
 * }
 * ~~~
 *
 * ===========================
 * Update Dispute
 * ===========================
 * ~~~
 * $dispute = new Rebilly\v2_1\Dispute("disputeID");
 * $dispute->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $dispute->setApiKey('your api key');
 * $dispute->processorAccountId = 'RebillyProcessor';
 * $dispute->type = '1CB';
 * $dispute->postedTime = '2013-02-19 13:10:30';
 * $dispute->transactionId = 'CPT8U35KGCSV';
 * $dispute->amount = '5.99';
 * $dispute->disputeReasonCodeId = '1000';
 * $dispute->currency = 'USD';
 * $dispute->rawResponse = 'Raw Response';
 *
 * $response =  $dispute->update();
 *
 * if ($response->statusCode === 200) {
 *     //Success
 * }
 * ~~~
 *
 * ===========================
 * Get a Dispute
 * ===========================
 * ~~~
 * $dispute = new Rebilly\v2_1\Dispute("disputeID");
 * $dispute->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $dispute->setApiKey('your api key');
 *
 * $response =  $dispute->retrieve();
 *
 * if ($response->statusCode === 200) {
 *     //Success
 * }
 * ~~~
 */
class Dispute extends RebillyRequest
{
    const END_POINT= 'disputes/';
    /** @var string $processorAccountId */
    public $processorAccountId;
    /** @var string $type */
    public $type;
    /** @var string $postedTime */
    public $postedTime;
    /** @var string $transactionId */
    public $transactionId;
    /** @var string $legacyTransactionId */
    public $legacyTransactionId;
    /** @var string $acquirerReferenceId */
    public $acquirerReferenceId;
    /** @var string $amount */
    public $amount;
    /** @var string $currency */
    public $currency;
    /** @var string $disputeReasonCodeId */
    public $disputeReasonCodeId;
    /** @var string $paymentMethod */
    public $paymentMethod;
    /** @var string $deadlineTime */
    public $deadlineTime;
    /** @var string $rawResponse */
    public $rawResponse;
    /** @var string $id */
    private $id;

    /**
     * Set controller and version
     * @param null $id
     */
    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->setVersion(2.1);
        $this->setApiController(self::END_POINT);
    }

    /**
     * Create new dispute
     * @return RebillyResponse
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Update dispute
     * @return RebillyResponse
     */
    public function update()
    {
        if (empty($this->id)) {
            throw new Exception('Dispute id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id);
        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data);
    }


    /**
     * List All customers
     * @return RebillyResponse
     */
    public function listAll()
    {
        return $this->sendGetRequest();
    }

    /**
     * Get a customer
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('Dispute id cannot be empty.');
        }
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
