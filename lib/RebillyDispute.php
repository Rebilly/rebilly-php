<?php


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
     * @var enun $type dispute type can be ('1CB', '2CB', 'RET')
     */
    public $type;
    /**
     * @var timestamp $postedTime dispute time
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
     * @var decimal $amount dispute amount
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
     * @var timestamp $deadlineTime dispute deadline
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
