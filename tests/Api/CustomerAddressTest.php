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
                    'primary'=> true,
                    'value'=> '523424123',
                    'label'=> 'main',
                ]),
            ],
            'emails' => [
                Contact\Email::createFromData([
                    'primary'=> true,
                    'value'=> 'hellodiesel@test.com',
                    'label'=> 'main',
                ]),
            ],
        ]);
        $customer = $client->customers()->update('wuf', $form);
        $this->assertInstanceOf(Customer::class, $customer);
        $address = $customer->getPrimaryAddress();
        $this->assertEquals($address['firstName'], 'fname');
        $this->assertEquals($address['lastName'], 'lname');
        $this->assertEquals($address['phoneNumbers']['0']['value'], '523424123');
        $this->assertEquals($address['emails']['0']['value'], 'hellodiesel@test.com');
    }
}
