<?php
class RebillyPaymentCardTest extends \Codeception\TestCase\Test
{

    public function testCreatePaymentCardWithAuthorizeMinimalJson()
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
        $authorization               = new RebillyCharge();
        $authorization->websiteId    = 'web123';
        $authorization->amount       = '.95';
        $authorization->currency     = 'USD';
        $paymentCard->authorization  = $authorization;
        $customer->paymentCard       = $paymentCard;

        $this->assertEquals(
            '{"customerId":"cust123","email":"email@email.com","paymentCard":{"pan":"4111111111111111","expMonth":"10","expYear":"2018","authorization":{"amount":".95","websiteId":"web123","currency":"USD"},"billingAddress":{"firstName":"John","lastName":"Doe"}}}',
            $customer->buildRequest($customer)
        );
    }

}
