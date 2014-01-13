<?php
use Codeception\Util\Stub;

class RebillyChargeTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $codeGuy;

    // tests
    public function testCreateOneTimeCharge()
    {
        $customer                    = new RebillyCustomer();
        $customer->customerId        = 'cust123';
        $customer->email             = 'email@email.com';
        $paymentCard                 = new RebillyPaymentCard();
        $paymentCard->pan            = '4111111111111111';
        $paymentCard->expMonth       = '10';
        $paymentCard->expYear        = '2018';
        $billingAddress              = new RebillyAddressInfo();
        $billingAddress->firstName   = 'John';
        $billingAddress->lastName    = 'Doe';
        $paymentCard->billingAddress = $billingAddress;
        $charge                      = new RebillyCharge();
        $charge->websiteId           = 'web123';
        $charge->amount              = '.95';
        $charge->currency            = 'USD';
        $paymentCard->charge         = $charge;
        $customer->paymentCard       = $paymentCard;

        $this->assertEquals(
            '{"customerId":"cust123","email":"email@email.com","paymentCard":{"pan":"4111111111111111","expMonth":"10","expYear":"2018","charge":{"amount":".95","websiteId":"web123","currency":"USD"},"billingAddress":{"firstName":"John","lastName":"Doe"}}}',
            stripcslashes($customer->buildRequest($customer))
        );
    }

}
