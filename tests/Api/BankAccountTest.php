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

use Rebilly\Entities\BankAccount;
use Rebilly\Rest\Collection;

/**
 * Class BankAccountTest.
 *
 */
class BankAccountTest extends TestCase
{
    /**
     * @test
     */
    public function searchBankAccount()
    {
        $client = $this->getClient();

        $bankAccounts = $client->bankAccounts()->search();

        $this->assertInstanceOf(Collection::class, $bankAccounts);
        $this->assertGreaterThan(0, count($bankAccounts));

        return $bankAccounts[0];
    }

    /**
     * @test
     */
    public function createBankAccount()
    {
        $client = $this->getClient();

        $form = new BankAccount();
        $form->setCustomerId('customerId');
        $form->setBankName('Bank name');
        $form->setAccountType('checking');
        $form->setRoutingNumber('12345');
        $form->setAccountNumber('12345');

        $bankAccount = $client->bankAccounts()->create($form);

        $this->assertInstanceOf(BankAccount::class, $bankAccount);
        $this->assertSame($form->getCustomerId(), $bankAccount->getCustomerId());
    }
}
