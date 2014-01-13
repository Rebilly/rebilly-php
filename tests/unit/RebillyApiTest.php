<?php
class RebillyApiTest extends PHPUnit_Framework_TestCase
{
    public function testCreateApiObjects()
    {
        $ob = new RebillyCustomer();

        // it inherit from Rebillyrequest
        $this->assertInstanceOf('RebillyRequest', $ob);

        $ob = new RebillyBlacklist(RebillyBlacklist::TYPE_BIN);
        // it inherit from Rebillyrequest
        $this->assertInstanceOf('RebillyRequest', $ob);

        $ob = new RebillyCharge();
        // it inherit from Rebillyrequest
        $this->assertInstanceOf('RebillyRequest', $ob);

        $ob = new RebillyPaymentCard();
        // it inherit from Rebillyrequest
        $this->assertInstanceOf('RebillyRequest', $ob);

        $ob = new RebillySubscription();
        // it inherit from Rebillyrequest
        $this->assertInstanceOf('RebillyRequest', $ob);

        $ob = new RebillyTransaction('dummyid');
        // it inherit from Rebillyrequest
        $this->assertInstanceOf('RebillyRequest', $ob);

    }

}
