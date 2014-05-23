<?php
/**
 * Class RebillyResponse
 */
class RebillyResponse
{
    /**
     * API's response status
     */
    const STATUS_SUCCESS      = 'Success';
    const STATUS_FAIL         = 'Failure';
    const STATUS_VALID        = 'Valid';
    const STATUS_PRECONDITION = 'Precondition failed';

    /**
     * API's response action
     */
    const CUSTOMER_LOOKUP        = 'CUSTOMER_LOOKUP';
    const CUSTOMER_CREATE        = 'CUSTOMER_CREATE';
    const CUSTOMER_UPDATE        = 'CUSTOMER_UPDATE';
    const SUBSCRIPTION_LOOKUP    = 'SUBSCRIPTION_LOOKUP';
    const SUBSCRIPTION_CANCEL    = 'SUBSCRIPTION_CANCEL';
    const SUBSCRIPTION_CREATE    = 'SUBSCRIPTION_CREATE';
    const SUBSCRIPTION_UPDATE    = 'SUBSCRIPTION_UPDATE';
    const SUBSCRIPTION_SWITCH    = 'SUBSCRIPTION_SWITCH';
    const DISPUTE_ENTRY_CREATE   = 'DISPUTE_ENTRY_CREATE';
    const PAYMENT_CARD_CREATE    = 'PAYMENT_CARD_CREATE';
    const PAYMENT_CARD_UPDATE    = 'PAYMENT_CARD_UPDATE';
    const PAYMENT_CARD_LOOKUP    = 'PAYMENT_CARD_LOOKUP';
    const AUTHORIZE_PAYMENT_CARD = 'AUTHORIZE_PAYMENT_CARD';
    const PAYMENT_CARD_CHARGE    = 'PAYMENT_CARD_CHARGE';
    const THREE_D_SECURE_CREATE  = 'THREE_D_SECURE_CREATE';
    const BLACKLIST_ENTRY_CREATE = 'BLACKLIST_ENTRY_CREATE';
    const BLACKLIST_ENTRY_DELETE = 'BLACKLIST_ENTRY_DELETE';
    const TOKEN_CREATE           = 'TOKEN_CREATE';
    const PLAN_CREATE            = 'PLAN_CREATE';
    const PLAN_DELETE            = 'PLAN_DELETE';
    const INVOICE_ITEM_CREATE    = 'INVOICE_ITEM_CREATE';

    /**
     * @var integer $statusCode HTTP response code
     */
    public $statusCode;
    /**
     * @var JSON object $response response from Rebilly
     */
    private $response;
    /**
     * @var array $errors all errors
     */
    public  $errors = array();
    /**
     * @var array $warnings all warnings
     */
    public  $warnings = array();
    /**
     * @var array $transaction
     */
    public $transactions = array();

    public function __construct($code, $response)
    {
        $this->statusCode = $code;
        $this->response = $response;
    }

    public function prepareResponse()
    {
        $response = json_decode($this->response);

        if (isset($response->customer)) {
            $response = $response->customer;
        }
        $this->buildResponse($response);
    }

    /**
     * Check response and add to errors or warning if any
     * @param object $response
     */
    private function buildResponse($response)
    {
        foreach ($response as $key => $value) {
            if (isset($response->errors)) {
                foreach ($response->errors as $errMessage) {
                    $this->addToError($errMessage);
                }
            }

            if (isset($response->warnings)) {
                foreach ($response->warnings as $warningMessage) {
                    $this->addToWarning($warningMessage);
                }
            }

            if (isset($response->transaction) && is_object($response->transaction)) {
                $this->transactions = $response->transaction;
            }

            if ($key === 'message' && isset($response->message)) {
                $this->addToError($response->message);
            }
            if (is_array($value) || is_object($value)) {
                $this->buildResponse($value);
            }
        }
    }

    /**
     * @return object raw response from Rebilly
     */
    public function getRawResponse()
    {
        return json_decode($this->response);
    }

    /**
     * @return bool true if there are errors, false otherwise
     */
    public function hasError()
    {
        return !empty($this->errors);
    }

    /**
     * @return bool true if there are warnings, false otherwise
     */
    public function hasWarning()
    {
        return !empty($this->warnings);
    }

    /**
     * @return bool true if there are transactions, false otherwise
     */
    public function hasTransaction()
    {
        return !empty($this->transactions);
    }

    /**
     * Add errors to array
     * @param string $message
     */
    private function addToError($message)
    {
        if (!in_array($message, $this->errors)) {
            array_push($this->errors, $message);
        }
    }

    /**
     * Add warning to array
     * @param string $message
     */
    private function addToWarning($message)
    {
        if (!in_array($message, $this->warnings)) {
            array_push($this->warnings, $message);
        }
    }
}
