<?php
/**
 * This file is part of Rebilly.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Deprecated;

use RebillySubscription;
use RebillyCustomer;
use RebillyPaymentCard;
use RebillyAddressInfo;
use Rebilly\Test\TestCase;

/**
 * Class RebillyTokenTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class RebillySubscriptionTest extends TestCase
{
    /**
     * @test
     */
    public function createSubscriptionMinimalJson()
    {
        $subscription = new RebillySubscription();
        $subscription->websiteId = 'web123';
        $subscription->planId = 'plan123';

        $billingAddress = new RebillyAddressInfo();
        $billingAddress->firstName = 'John';
        $billingAddress->lastName = 'Doe';

        $paymentCard = new RebillyPaymentCard();
        $paymentCard->pan = '4111111111111111';
        $paymentCard->expMonth = '10';
        $paymentCard->expYear = '2018';
        $paymentCard->billingAddress = $billingAddress;
        $paymentCard->subscription = $subscription;

        $customer = new RebillyCustomer();
        $customer->customerId = 'cust123';
        $customer->email = 'email@email.com';
        $customer->paymentCard = $paymentCard;

        $this->assertEquals(
            '{"customerId":"cust123","email":"email@email.com","paymentCard":{"pan":"4111111111111111","expMonth":"10","expYear":"2018","subscription":{"websiteId":"web123","planId":"plan123"},"billingAddress":{"firstName":"John","lastName":"Doe"}}}',
            $customer->buildRequest($customer)
        );
    }

    /**
     * @test
     */
    public function createSubscriptionMinimalWithTokenJson()
    {
        $subscription = new RebillySubscription();
        $subscription->websiteId = 'web123';
        $subscription->planId = 'plan123';

        $paymentCard = new RebillyPaymentCard();
        $paymentCard->token = 'niceToken';
        $paymentCard->subscription = $subscription;

        $customer = new RebillyCustomer();
        $customer->customerId = 'cust123';
        $customer->email = 'email@email.com';
        $customer->paymentCard = $paymentCard;

        $this->assertEquals(
            '{"customerId":"cust123","email":"email@email.com","paymentCard":{"token":"niceToken","subscription":{"websiteId":"web123","planId":"plan123"}}}',
            $customer->buildRequest($customer)
        );
    }

    /**
     * @test
     */
    public function switchSubscriptionMinimalJson()
    {
        $oldSubscription = new RebillySubscription();
        $oldSubscription->websiteId = 'qwerty123';
        $oldSubscription->planId = 'sub123';

        $newSubscription = new RebillySubscription();
        $newSubscription->websiteId = 'qwerty123';
        $newSubscription->planId = 'newSub123';

        $newSubscription->switchWhen = RebillySubscription::SWITCH_NOW_WITH_PRORATA_REFUND;

        $customer = new RebillyCustomer('cust123');
        $customer->subscription = $oldSubscription;
        $customer->newSubscription = $newSubscription;

        $this->assertEquals(

            '{"lookupCustomerId":"cust123","subscription":{"websiteId":"qwerty123","planId":"sub123"},"newSubscription":{"websiteId":"qwerty123","planId":"newSub123","switchWhen":"NOW_WITH_PRORATA_REFUND"}}',
            $customer->buildRequest($customer)
        );
    }
}
