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

use Rebilly\Entities\Customer;
use Rebilly\Rest\Collection;

/**
 * Class CustomerTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
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
        $faker = $this->getFaker();
        $client = $this->getClient();

        $form->setFirstName($faker->firstName);
        $form->setLastName($faker->lastName);

        $customer = $client->customers()->update($form->getId(), $form);

        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals($form->getId(), $customer->getId());
        $this->assertEquals($form->getFirstName(), $customer->getFirstName());
    }
}
