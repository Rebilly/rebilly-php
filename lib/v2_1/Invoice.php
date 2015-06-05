<?php

namespace Rebilly\v2_1;

use RebillyRequest;
use Exception;

/**
 * Class Invoice
 * @package Rebilly\v2_1
 * 
 * Usage:
 * ~~~
 * // Create new invoice
 * $invoice = new Rebilly\v2_1\Invoice();
 * $invoice->setApiKey("apiKey");
 * $invoice->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $invoice->customer = "CustABC123";
 * $invoice->website = "WebABC123";
 * $invoice->currency = "USD";
 * $invoice->dueTime = "2015-01-01 00:00:00";

 * $response = $invoice->create();
 * if ($response.statusCode === 201) {
 *     // Successfully created invoice
 * }
 * ~~~
 *
 * ~~~
 * // Void an invoice
 * $invoice = new Rebilly\v2_1\Invoice("invoiceId");
 * $invoice->setApiKey("apiKey");
 * $invoice->setEnvironment(RebillyRequest::ENV_SANDBOX);
 *
 * $response = $invoice->void();
 * if ($response.statusCode === 200) {
 *     // Successfully created invoice
 * }
 * ~~~
 *
 *  ~~~
 * // Issue an invoice
 * $invoice = new Rebilly\v2_1\Invoice("invoiceId");
 * $invoice->setApiKey("apiKey");
 * $invoice->setEnvironment(RebillyRequest::ENV_SANDBOX);
 *
 * $response = $invoice->issue();
 * if ($response.statusCode === 200) {
 *     // Successfully created invoice
 * }
 * ~~~
 */
class Invoice extends RebillyRequest
{
    const END_POINT = 'invoices/';
    /** @var  string $customer */
    public $customer;
    /** @var  string $website */
    public $website;
    /** @var  string $currency */
    public $currency;
    /** @var  string $dueTime */
    public $dueTime;
    /** @var  string $billingContact */
    public $billingContact;
    /** @var  string $deliveryContact */
    public $deliveryContact;

    private $id;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->setVersion(2.1);
        $this->setApiController(self::END_POINT);
    }

    /**
     * Create new Invoice
     * @return RebillyResponse
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Update an Invoice
     * @return RebillyResponse
     */
    public function update()
    {
        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data);
    }

    /**
     * Get an invoice
     * @return RebillyResponse
     */
    public function retrieve()
    {
        $this->setApiController(self::END_POINT . $this->id);

        return $this->sendGetRequest();
    }

    /**
     * Void an invoice
     * @return RebillyResponse
     */
    public function void()
    {
        if (empty($this->id)) {
            throw new Exception('invoice id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id . '/void');

        return $this->sendPostRequest(null);
    }

    /**
     * Abandon an invoice
     * @return RebillyResponse
     */
    public function abandon()
    {
        if (empty($this->id)) {
            throw new Exception('invoice id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id . '/abandon');

        return $this->sendPostRequest(null);
    }

    /**
     * Issue an invoice
     * @return RebillyResponse
     */
    public function issue()
    {
        if (empty($this->id)) {
            throw new Exception('invoice id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id . '/issue');

        return $this->sendPostRequest(null);
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
