<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Api;

use Rebilly\Entities\BankAccount;
use Rebilly\Rest\Collection;

/**
 * Class BankAccountTest.
 *
 * @author Dara Pich <dara.pich@rebilly.com>
 */
class BankAccountTest extends TestCase
{
    /**
     * @test
     */
    public function searchTheContactTests()
    {
        $client = $this->getClient();

        $contacts = $client->contacts()->search();

        $this->assertInstanceOf(Collection::class, $contacts);
        $this->assertGreaterThan(0, count($contacts));

        return $contacts[0];
    }

    /**
     * @test
     */
    public function createTheCustomer()
    {
        $client = $this->getClient();

        $form = new BankAccount();
        $form->setCustomerId("customerId");
        $form->setContactId("contactId");
        $form->setName("Bank name");
        $form->setAccountType("checking");
        $form->setRoutingNumber("12345");
        $form->setAccountNumber("12345");

        $bankAccount = $client->bankAccounts()->create($form);

        $this->assertInstanceOf(BankAccount::class, $bankAccount);
        $this->assertEquals($form->getCustomerId(), $bankAccount->getCustomerId());
        $this->assertEquals($form->getContactId(), $bankAccount->getContactId());
    }
}
