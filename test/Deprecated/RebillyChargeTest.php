<?php
/**
 * This file is part of Rebilly.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Deprecated;

use RebillyCustomer;
use RebillyPaymentCard;
use RebillyAddressInfo;
use RebillyCharge;
use Rebilly\Test\TestCase;

/**
 * Class RebillyTokenTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class RebillyChargeTest extends TestCase
{
    /**
     * @test
     */
    public function createOneTimeCharge()
    {
        $billingAddress = new RebillyAddressInfo();
        $billingAddress->firstName = 'John';
        $billingAddress->lastName = 'Doe';

        $charge = new RebillyCharge();
        $charge->websiteId = 'web123';
        $charge->amount = '.95';
        $charge->currency = 'USD';

        $paymentCard = new RebillyPaymentCard();
        $paymentCard->pan = '4111111111111111';
        $paymentCard->expMonth = '10';
        $paymentCard->expYear = '2018';
        $paymentCard->billingAddress = $billingAddress;
        $paymentCard->charge = $charge;

        $customer = new RebillyCustomer();
        $customer->customerId = 'cust123';
        $customer->email = 'email@email.com';
        $customer->paymentCard = $paymentCard;

        $this->assertEquals(
            '{"customerId":"cust123","email":"email@email.com","paymentCard":{"pan":"4111111111111111","expMonth":"10","expYear":"2018","charge":{"amount":".95","websiteId":"web123","currency":"USD"},"billingAddress":{"firstName":"John","lastName":"Doe"}}}',
            $customer->buildRequest($customer)
        );
    }
}
