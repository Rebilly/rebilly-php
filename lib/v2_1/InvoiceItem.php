<?php

namespace Rebilly\v2_1;

use RebillyRequest;
use Exception;

/**
 * Class InvoiceItem
 * @package Rebilly\v2_1
 *
 * Usage:
 * ~~~
 * // Create new invoice item
 * $invoiceItem = new Rebilly\v2_1\InvoiceItem("invoiceId123");
 * $invoiceItem->setApiKey("apiKey");
 * $invoiceItem->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $invoiceItem->type = "debit";
 * $invoiceItem->unitPrice = 5.99;
 * $invoiceItem->quantity = 1;
 * $invoiceItem->periodStartTime = "2015-01-01 00:00:00";
 * $invoice->periodEndTime = "2015-01-01 00:00:00";

 * $response = $invoiceItem->create();
 * if ($response.statusCode === 201) {
 *     // Successfully created invoice item
 * }
 * ~~~
 *
 * ~~~
 * // Get invoice items
 * InvoiceItem = new Rebilly\v2_1\InvoiceItem("invoiceId123");
 * InvoiceItem->setApiKey("apiKey");
 * $invoice->setEnvironment(RebillyRequest::ENV_SANDBOX);
 *
 * $response = InvoiceItem->retrieve();
 * if ($response.statusCode === 200) {
 *     // Successfully
 * }
 * ~~~
 */
class InvoiceItem extends RebillyRequest
{
    const ITEM_END_POINT = '/items/';
    const INVOICE_END_POINT = 'invoices/';

    /** @var  string $type */
    public $type;
    /** @var  float $unitPrice */
    public $unitPrice;
    /** @var  integer $quantity */
    public $quantity;
    /** @var  string $description */
    public $description;
    /** @var  string $periodStartTime */
    public $periodStartTime;
    /** @var  string $periodEndTime */
    public $periodEndTime;

    private $invoiceId;
    private $id;

    /**
     * Need customerId
     * @param string $customerId customer id
     * @param null $id subscription id
     * @throws Exception
     */
    public function __construct($invoiceId, $id = null)
    {
        $this->invoiceId = $invoiceId;
        if (empty($this->invoiceId)) {
            throw new Exception('invoiceId cannot be empty.');
        }
        if (!empty($id)) {
            $this->id = $id;
        }

        $this->setVersion(2.1);
    }

    /**
     * Create new InvoiceItem
     * @return RebillyResponse
     */
    public function create()
    {
        $this->setApiController(self::INVOICE_END_POINT . $this->invoiceId . self::ITEM_END_POINT);

        $data = $this->buildRequest($this);
        return $this->sendPostRequest($data);
    }

    /**
     * Get InvoiceItem
     * @return RebillyResponse
     */
    public function retrieve()
    {
        $this->setApiController(self::INVOICE_END_POINT . $this->invoiceId . self::ITEM_END_POINT);
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
