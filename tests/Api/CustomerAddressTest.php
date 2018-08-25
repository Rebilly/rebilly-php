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

use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;

/**
 * Class CustomerAddressTest.
 */
class CustomerAddressTest extends TestCase
{
    /**
     * @test
     */
    public function smileTest()
    {
        $faker = $this->getFaker();
        $client = $this->getClient();

        $form = new Customer();
        $form->setFirstName($faker->firstName);
        $form->setLastName($faker->lastName);
        $form->setPrimaryAddress([
            'firstName' => 'fname',
            'lastName' => 'lname',
            'phoneNumbers' => [
                Contact\PhoneNumber::createFromData([
                    'primary' => true,
                    'value' => '523424123',
                    'label' => 'main',
                ]),
            ],
            'emails' => [
                Contact\Email::createFromData([
                    'primary' => true,
                    'value' => 'hellodiesel@test.com',
                    'label' => 'main',
                ]),
            ],
        ]);
        $customer = $client->customers()->update('wuf', $form);
        $this->assertInstanceOf(Customer::class, $customer);
        $address = $customer->getPrimaryAddress();
        $this->assertSame($address['firstName'], 'fname');
        $this->assertSame($address['lastName'], 'lname');
        $this->assertSame($address['phoneNumbers']['0']['value'], '523424123');
        $this->assertSame($address['emails']['0']['value'], 'hellodiesel@test.com');
    }
}
