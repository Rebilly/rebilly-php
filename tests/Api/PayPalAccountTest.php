<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

namespace Rebilly\Tests\Api;

use Rebilly\Entities\PayPalAccount;
use Rebilly\Rest\Collection;

/**
 * Class BankAccountTest.
 *
 */

class PayPalAccountTest extends TestCase
{
    /**
     * @test
     */
    public function searchPayPalAccount()
    {
        $client = $this->getClient();

        $payPalAccounts = $client->payPalAccounts()->search();

        $this->assertInstanceOf(Collection::class, $payPalAccounts);
        $this->assertGreaterThan(0, count($payPalAccounts));

        return $payPalAccounts[0];
    }

    /**
     * @test
     */
    public function createPayPalAccount()
    {
        $client = $this->getClient();

        $form = new PayPalAccount();
        $form->setCustomerId('customerId');
        $form->setUserName('paypal123');

        $payPalAccount = $client->bankAccounts()->create($form);

        $this->assertInstanceOf(PayPalAccount::class, $payPalAccount);
        $this->assertSame($form->getCustomerId(), $payPalAccount->getCustomerId());
    }
}
