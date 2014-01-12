<?php
class RebillySubscriptionTest extends \Codeception\TestCase\Test
{

    public function testCreateSubscriptionMinimalJson()
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
        $subscription                = new RebillySubscription();
        $subscription->websiteId     = 'web123';
        $subscription->planId        = 'plan123';
        $paymentCard->subscription   = $subscription;
        $customer->paymentCard       = $paymentCard;

        expect($customer->buildRequest($customer))
            ->equals('{"customerId":"cust123","email":"email@email.com","paymentCard":{"pan":"4111111111111111","expMonth":"10","expYear":"2018","subscription":{"websiteId":"web123","planId":"plan123"},"billingAddress":{"firstName":"John","lastName":"Doe"}}}');
    }

    public function testCreateSubscriptionMinimalWithTokenJson()
    {
        $customer             = new RebillyCustomer();
        $customer->customerId = 'cust123';
        $customer->email      = 'email@email.com';
        $paymentCard          = new RebillyPaymentCard();
        $paymentCard->token   = 'niceToken';

        $subscription              = new RebillySubscription();
        $subscription->websiteId   = 'web123';
        $subscription->planId      = 'plan123';
        $paymentCard->subscription = $subscription;
        $customer->paymentCard     = $paymentCard;

        expect($customer->buildRequest($customer))
            ->equals('{"customerId":"cust123","email":"email@email.com","paymentCard":{"token":"niceToken","subscription":{"websiteId":"web123","planId":"plan123"}}}');
    }

    public function testSwitchSubscriptionMinimalJson()
    {
        $customer                   = new RebillyCustomer('cust123');
        $oldSubscription            = new RebillySubscription();
        $oldSubscription->websiteId = 'qwerty123';
        $oldSubscription->planId    = 'sub123';

        $newSubscription            = new RebillySubscription();
        $newSubscription->websiteId = 'qwerty123';
        $newSubscription->planId    = 'newSub123';

        $newSubscription->switchWhen = RebillySubscription::SWITCH_NOW_WITH_PRORATA_REFUND;

        $customer->subscription    = $oldSubscription;
        $customer->newSubscription = $newSubscription;

        expect($customer->buildRequest($customer))
            ->equals('{"lookupCustomerId":"cust123","subscription":{"websiteId":"qwerty123","planId":"sub123"},"newSubscription":{"websiteId":"qwerty123","planId":"newSub123","switchWhen":"NOW_WITH_PRORATA_REFUND"}}');
    }

}
