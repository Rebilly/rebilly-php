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
use RebillyCustomField;
use Rebilly\Test\TestCase;

/**
 * Class RebillyTokenTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class RebillyCustomerTest extends TestCase
{
    private $newCustomerId;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->newCustomerId = 'test' . rand(2000, 99999) . time();
    }

    /**
     * @test
     */
    public function throwsExceptionOnNullOrNotSetEnv()
    {
        $this->setExpectedException('Exception', 'Please set the correct environment');

        $customer = new RebillyCustomer();
        $customer->setEnvironment(null);
        $customer->create();
    }

    /**
     * @test
     */
    public function throwsExceptionOnInvalidEnv()
    {
        $this->setExpectedException('Exception', 'Please set the correct environment');

        $customer = new RebillyCustomer();
        $customer->setEnvironment('BAD');
        $customer->create();
    }

    /**
     * @test
     */
    public function customerCreateSimpleJson()
    {
        $customer = new RebillyCustomer();
        $customer->customerId = $this->newCustomerId;
        $customer->email = 'master@example.com';

        $this->assertEquals(
            '{"customerId":"' . $this->newCustomerId . '","email":"master@example.com"}',
            $customer->buildRequest($customer)
        );
    }

    /**
     * @test
     */
    public function customerCreateFullJson()
    {
        $customer = new RebillyCustomer();
        $customer->customerId = $this->newCustomerId;
        $customer->email = 'master@example.com';
        $customer->firstName = 'MasterFirst';
        $customer->lastName = 'MasterLast';
        $customer->ipAddress = '10.0.0.1';

        $this->assertEquals(
            '{"customerId":"' . $this->newCustomerId . '","email":"master@example.com","firstName":"MasterFirst","lastName":"MasterLast","ipAddress":"10.0.0.1"}',
            $customer->buildRequest($customer)
        );
    }

    /**
     * @test
     */
    public function customerWithCustomField()
    {
        /** @var RebillyCustomer|mixed $customer */
        $customer = new RebillyCustomer();
        $customer->customerId = $this->newCustomerId;
        $customer->email = 'master@example.com';
        $customer->firstName = 'MasterFirst';
        $customer->lastName = 'MasterLast';
        $customer->ipAddress = '10.0.0.1';

        $customer->customField[] = new RebillyCustomField(
            array(
                'label' => 'customFieldABC',
                'value' => 'customFieldABC',
            )
        );
        $customer->customField[] = new RebillyCustomField(
            array(
                'label' => 'customFieldXYZ',
                'value' => 'customFieldXYZ',
            )
        );

        $this->assertEquals(
            '{"customerId":"' . $this->newCustomerId . '","email":"master@example.com","firstName":"MasterFirst","lastName":"MasterLast","ipAddress":"10.0.0.1","customField":[{"label":"customFieldABC","value":"customFieldABC"},{"label":"customFieldXYZ","value":"customFieldXYZ"}]}',
            $customer->buildRequest($customer)
        );
    }
}
