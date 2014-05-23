<?php
/**
 * Class RebillyInvoiceItem
 *
 * Example
 * ~~~
 * $invoiceItem = new RebillyInvoiceItem();
 * $invoiceItem->setApiKey('your api key');
 * $invoiceItem->setEnvironment(RebillyRequest::ENV_SANDBOX);
 *
 * $invoiceItem->lookupCustomerId = 'custA1';
 * $invoiceItem->lookupWebsiteId  = 'web1';
 *
 * $invoiceItem->invoiceItem = [
 *     [
 *         "itemId" => "itemCredit123",
 *         "type" => "credit",
 *         "amount" => "5.99",
 *         "currency" => "USD",
 *         "quantity" => 1,
 *         "description" => "",
 *         "lookupInvoiceId" => "invoiceABC123",
 *     ],
 *     [
 *         "itemId" => "itemCredit123",
 *         "type" => "credit",
 *         "amount" => "5.99",
 *         "currency" => "USD",
 *         "quantity" => 1,
 *         "description" => "",
 *         "lookupInvoiceId" => "invoiceABC123",
 *     ]
 * ];
 *
 * $response = $invoiceItem->create();
 * ~~~
 */
class RebillyInvoiceItem extends RebillyRequest
{
    const TYPE_DEBIT = 'debit';
    const TYPE_CREDIT = 'credit';
    const INVOICE_ITEM_URL = 'invoiceitems/';

    /**
     * @var string $lookupCustomerId
     */
    public $lookupCustomerId;
    /**
     * @var string $lookupWebsiteId
     */
    public $lookupWebsiteId;
    /**
     * @var array $invoiceItem
     */
    public $invoiceItem;
    /**
     * @var string $invoiceItemId
     */
    private $itemId;

    /**
     * Constructor
     */
    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->itemId = $id;
        }
        $this->setApiController(self::INVOICE_ITEM_URL);
    }

    /**
     * Create invoiceItem and return the response
     * @return array
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data, get_class());
    }

    /**
     * Get invoice item information
     * @return array
     */
    public function retrieve()
    {
        $this->setApiController(self::INVOICE_ITEM_URL . $this->itemId);

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
