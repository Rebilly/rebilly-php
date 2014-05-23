<?php

class RebillyInvoiceItemTest extends \Codeception\TestCase\Test
{
    private $customerId;
    private $websiteId;

    protected function _before()
    {
        $this->customerId = 'test' . rand(2000, 99999) . time();
        $this->websiteId  = 'web' . rand(2000, 99999) . time();
    }

    public function testCreateInvoiceItem()
    {
        $invoiceItem = new RebillyInvoiceItem();
        $invoiceItem->lookupCustomerId = $this->customerId;
        $invoiceItem->lookupWebsiteId  = $this->websiteId;
        $invoiceItem->invoiceItem = array(
            array(
                'itemId' => 'itemDebit123',
                'type' => 'debit',
                'amount' => '9.99',
                'currency' => 'USD',
                'quantity' => 1,
                'description' => 'item debit USD',
                'lookupInvoiceId' => 'invoiceABC123',
            ),
            array(
                'itemId' => 'itemCredit123',
                'type' => 'credit',
                'amount' => '5.99',
                'currency' => 'USD',
                'quantity' => 1,
                'description' => 'item credit USD',
                'lookupInvoiceId' => 'invoiceABC123',
            )
        );

        expect($invoiceItem->buildRequest($invoiceItem))
            ->equals('{"lookupCustomerId":"'.$this->customerId.'","lookupWebsiteId":"'.$this->websiteId.'","invoiceItem":[{"itemId":"itemDebit123","type":"debit","amount":"9.99","currency":"USD","quantity":1,"description":"item debit USD","lookupInvoiceId":"invoiceABC123"},{"itemId":"itemCredit123","type":"credit","amount":"5.99","currency":"USD","quantity":1,"description":"item credit USD","lookupInvoiceId":"invoiceABC123"}]}');
    }
}
