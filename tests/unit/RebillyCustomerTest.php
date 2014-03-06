<?php
class RebillyCustomerTest extends \Codeception\TestCase\Test
{
    private $newCustomerId;

    protected function _before()
    {
        $this->newCustomerId = 'test' . rand(2000, 99999) . time();
    }

    public function testThrowsExceptionOnNullOrNotsetEnv()
    {
        $this->setExpectedException('Exception', 'Please set the correct environment');
        $customer = new RebillyCustomer();
        $customer->setEnvironment(null);
        $customer->create();
    }

    public function testThrowsExceptionOnInvalidEnv()
    {
        $this->setExpectedException('Exception', 'Please set the correct environment');
        $customer = new RebillyCustomer();
        $customer->setEnvironment('BAD');
        $customer->create();
    }

    /**
     * Tests the request made is correct
     */

    public function testCustomerCreateSimpleJson()
    {
        $customer = new RebillyCustomer();
        $customer->customerId = $this->newCustomerId;
        $customer->email      = 'master@example.com';

        expect($customer->buildRequest($customer))
            ->equals('{"customerId":"'.$this->newCustomerId.'","email":"master@example.com"}');
    }


    public function testCustomerCreateFullJson()
    {
        $customer = new RebillyCustomer();
        $customer->customerId = $this->newCustomerId;
        $customer->email      = 'master@example.com';
        $customer->firstName  = 'MasterFirst';
        $customer->lastName   = 'MasterLast';
        $customer->ipAddress  = '10.0.0.1';

        expect($customer->buildRequest($customer))
            ->equals('{"customerId":"'.$this->newCustomerId.'","email":"master@example.com","firstName":"MasterFirst","lastName":"MasterLast","ipAddress":"10.0.0.1"}');
    }

    public function testCustomerWithCustomField()
    {
        $customer = new RebillyCustomer();
        $customer->customerId = $this->newCustomerId;
        $customer->email      = 'master@example.com';
        $customer->firstName  = 'MasterFirst';
        $customer->lastName   = 'MasterLast';
        $customer->ipAddress  = '10.0.0.1';

        $customerCustomField = array(
            new RebillyCustomField(array(
                'label' => 'customFieldABC',
                'value' => 'customFieldABC',
            )),
            new RebillyCustomField(array(
                'label' => 'customFieldXYZ',
                'value' => 'customFieldXYZ',
            )),
        );

        $customer->customField = $customerCustomField;

        expect($customer->buildRequest($customer))
            ->equals('{"customerId":"'.$this->newCustomerId.'","email":"master@example.com","firstName":"MasterFirst","lastName":"MasterLast","ipAddress":"10.0.0.1","customField":[{"label":"customFieldABC","value":"customFieldABC"},{"label":"customFieldXYZ","value":"customFieldXYZ"}]}');
    }
}

