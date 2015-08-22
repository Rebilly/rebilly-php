<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests;

use Rebilly\Entities\Customer;
use Rebilly\Entities\Payment;
use Rebilly\Entities\PaymentMethods\PaypalMethod;
use Rebilly\Entities\ScheduledPayment;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Collection;
use Rebilly\Client;

defined('APIKEY') or define('APIKEY', null);

/**
 * Class ClientTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ClientTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        if (APIKEY === null) {
            $this->markTestSkipped();
        }
    }

    /**
     * @test
     */
    public function initClient()
    {
        $client = new Client([
            'apiKey' => APIKEY,
            'baseUrl' => 'https://api-sandbox.rebilly.com',
            'httpHandler' => null,
        ]);

        return $client;
    }

    /**
     * @test
     * @depends initClient
     *
     * @param Client $client
     */
    public function howToUseApi($client)
    {
        $faker = $this->getFaker();

        $customers = $client->customers()->search();

        $this->assertInstanceOf(Collection::class, $customers);
        $this->assertGreaterThan(0, $customers);

        // var_dump($customers->jsonSerialize());

        $customer = $customers[0];
        $customer->setFirstName($faker->firstName);
        $customer->setLastName($faker->lastName);

        $customer = $client->customers()->update($customer->getId(), $customer);
        $this->assertInstanceOf(Customer::class, $customer);

        // var_dump($customer->jsonSerialize());
    }

    /**
     * @test
     * @depends initClient
     * @-expectedException \Rebilly\Http\Exception\UnprocessableEntityException
     *
     * @param Client $client
     */
    public function howToUsePayments(Client $client)
    {
        $faker = $this->getFaker();

        $method = new PaypalMethod();
        $method->setPaypalKey('A');

        $payment = new Payment();
        $payment->setDescription($faker->sentence);
        $payment->setWebsiteId('github');
        $payment->setCustomerId('customer-1');
        $payment->setAmount(10);
        $payment->setCurrency('USD');
        $payment->setMethod($method);

        try {
            $payment = $client->payments()->create($payment);
        } catch (UnprocessableEntityException $e) {
            var_dump($e->getErrors());
            return;
        }

        if ($payment instanceof ScheduledPayment) {
            if ($payment->isApprovalRequired()) {
                // Redirect the user to approval URL
                $this->assertStringStartsWith('http', $payment->getApprovalLink());
            } else {
                $attemptsWait = 2;

                while ($payment instanceof ScheduledPayment && $attemptsWait-- > 0) {
                    sleep(1);
                    echo "Polling queue...";
                    $payment = $client->payments()->loadFromQueue($payment->getId());
                }
            }
        }

        // $this->assertInstanceOf(Payment::class, $payment);
    }
}
