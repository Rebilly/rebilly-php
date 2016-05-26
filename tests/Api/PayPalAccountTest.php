<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2016 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */


namespace Rebilly\Tests\Api;

use Rebilly\Entities\PayPalAccount;
use Rebilly\Rest\Collection;

/**
 * Class BankAccountTest.
 *
 * @author Dara Pich <dara.pich@rebilly.com>
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
        $form->setCustomerId("customerId");
        $form->setContactId("contactId");
        $form->setUserName("paypal123");

        $payPalAccount = $client->bankAccounts()->create($form);

        $this->assertInstanceOf(PayPalAccount::class, $payPalAccount);
        $this->assertEquals($form->getCustomerId(), $payPalAccount->getCustomerId());
        $this->assertEquals($form->getContactId(), $payPalAccount->getContactId());
    }
}
