<?php

/**
 * Class RebillyDispute Holds variables and methods to create dispute
 *
 * Usage: Example to create dispute
 * <pre>
 *     $dispute = new RebillyDispute();
 *     $dispute->setEnvironment(RebillyRequest::ENV_STAGING);
 *     $dispute->setApiKey('apiKey');
 *     $dispute->processorAccountId = 'processorAccountId';
 *     $dispute->type = '1CB';
 *     $dispute->postedTime = '2013-02-19 13:10:30';
 *     $dispute->transactionId = '1389302294524db5af2696e';
 *     $dispute->amount = '5.99';
 *     $dispute->currency = 'USD';
 *     $dispute->rawResponse = 'Raw Response';
 *
 *     $response = $dispute->create();
 *     $rawResponse = $response->getRawResponse();
 *
 *     if ($rawResponse->action === RebillyResponse::DISPUTE_ENTRY_CREATE && $rawResponse->status === RebillyResponse::STATUS_SUCCESS) {
 *         // Successfully created dispute
 *     }
 * </pre>
 *
 * Available attributes:
 * @var string $processorAccountId
 * @var string $type
 * @var string $postedTime
 * @var string $transactionId
 * @var string $legacyTransactionId
 * @var string $acquirerReferenceId
 * @var string $amount
 * @var string $currency
 * @var string $disputeReasonCodeId
 * @var string $deadlineTime
 * @var string $processorReasonCode
 * @var string $processorReferenceId
 * @var string $processorComments
 * @var string $rawResponse
 * @var string $paymentMethod
 */
class RebillyDispute extends RebillyRequest
{
    /**
     * Dispute url
     */
    const DISPUTE_URL = 'disputes/';
    /**
     * @var string $processorAccountId processor account id on Rebilly
     */
    public $processorAccountId;
    /**
     * @var string $type dispute type can be ('1CB', '2CB', 'RET')
     */
    public $type;
    /**
     * @var string $postedTime dispute time
     */
    public $postedTime;
    /**
     * @var string $transactionId transaction id on Rebilly
     */
    public $transactionId;
    /**
     * @var string $legacyTransactionId transaction id outside Rebilly
     */
    public $legacyTransactionId;
    /**
     * @var string $acquirerReferenceId
     */
    public $acquirerReferenceId;
    /**
     * @var string $amount dispute amount
     */
    public $amount;
    /**
     * @var string $currency 3 letter currency code
     */
    public $currency;
    /**
     * @var string $disputeReasonCodeId
     */
    public $disputeReasonCodeId;
    /**
     * @var string $deadlineTime dispute deadline
     */
    public $deadlineTime;
    /**
     * @var string $processorReasonCode
     */
    public $processorReasonCode;
    /**
     * @var string $processorReferenceId
     */
    public $processorReferenceId;
    /**
     * @var string $processorComments
     */
    public $processorComments;
    /**
     * @var string $rawResponse response from processor
     */
    public $rawResponse;
    /**
     * @var string $paymentMethod payment method
     */
    public $paymentMethod;

    /**
     * Constructor set the right API URL
     */
    public function __construct()
    {
        $this->setApiController(self::DISPUTE_URL);
    }

    /**
     * Create dispute entry
     * @return array Rebilly response
     */
    public function create()
    {
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
