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

use Rebilly\Entities\Customer;
use Rebilly\Rest\Collection;

/**
 * Class CustomerTest.
 *
 */
class CustomerTest extends TestCase
{
    /**
     * @test
     */
    public function searchTheCustomers()
    {
        $client = $this->getClient();

        $customers = $client->customers()->search();

        $this->assertInstanceOf(Collection::class, $customers);
        $this->assertGreaterThan(0, count($customers));

        return $customers[0];
    }

    /**
     * @test
     * @depends searchTheCustomers
     *
     * @param Customer $form
     */
    public function updateTheCustomer(Customer $form)
    {
        $client = $this->getClient();

        $form->setFirstName(self::TEST_FIRST_NAME);
        $form->setLastName(self::TEST_LAST_NAME);

        $customer = $client->customers()->update($form->getId(), $form);

        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertSame($form->getId(), $customer->getId());
        $this->assertSame($form->getFirstName(), $customer->getFirstName());
    }
}
