<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Api;

use Exception;
use Rebilly\Test\TestCase;
use Rebilly\Test\PaymentExample;

/**
 * Class PaymentApiTest.
 */
final class PaymentApiTest extends TestCase
{
    /** @var PaymentExample */
    private $controller;

    public function setUp()
    {
        parent::setUp();
        $this->controller = new PaymentExample($this->adapter());
    }

    /**
     * @return array
     */
    protected function demoPaymentList()
    {
        return [
            [
                'id' => 'dummy_payment_1',
            ],
            [
                'id' => 'dummy_payment_2',
            ],
        ];
    }

    /**
     * @return array
     */
    protected function demoPayment()
    {
        return [
            'id' => 'dummy_payment_1',
            'state' => 'approved',
            'createdTime' => date('Y-m-d H:i:s'),
            'updatedTime' => date('Y-m-d H:i:s'),
            'website' => 'dummy_website_1',
            'method' => 'payment_card',
            'paymentInstrument' => [
                'paymentCard' => 'dummy_card_1',
            ],
            'amount' => 10.0,
            'currency' => 'USD',
            'description' => 'Test payment',
        ];
    }

    /**
     * @return array
     */
    protected function demoScheduledPayment()
    {
        return [
            'id' => 'dummy_payment_1',
            'state' => 'in_progress',
            'createdTime' => date('Y-m-d H:i:s'),
            'updatedTime' => date('Y-m-d H:i:s'),
            'payment' => [
                'website' => 'dummy_website_1',
                'method' => 'payment_card',
                'paymentInstrument' => [
                    'paymentCard' => 'dummy_card_1',
                ],
                'amount' => 10.0,
                'currency' => 'USD',
                'description' => 'Test payment',
            ],
        ];
    }

    /**
     * @return array
     */
    protected function demoInvalidPayment()
    {
        return [
            'details' => [
                'Error message',
            ],
        ];
    }

    /**
     * @test
     * @expectedResponseJson demoPaymentList
     */
    public function listPayments()
    {
        $response = $this->controller->listPayments();

        $this->assertEquals(200, $response->statusCode);
        $this->assertCount(2, $response->getRawResponse());

        $request = $this->history()->getLastRequest();
        $this->assertEquals('/v2.1/payments/', $request->getPath());
    }

    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage Payment ID cannot be empty
     */
    public function loadPaymentWithoutId()
    {
        $this->controller->loadPayment(null);
    }

    /**
     * @test
     * @expectedResponseJson demoPayment
     */
    public function loadPayment()
    {
        $response = $this->controller->loadPayment('dummy_payment_1');
        $data = $response->getRawResponse();

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals('dummy_payment_1', $data->id);
        $this->assertEquals('dummy_website_1', $data->website);
        $this->assertEquals(10, $data->amount);

        $request = $this->history()->getLastRequest();

        $this->assertEquals('/v2.1/payments/dummy_payment_1/', $request->getPath());
    }

    /**
     * @test
     * @expectedResponseJson demoScheduledPayment
     */
    public function loadScheduledPayment()
    {
        $response = $this->controller->loadScheduledPayment('dummy_payment_1');
        $data = $response->getRawResponse();

        $this->assertEquals(200, $response->statusCode);
        $this->assertEquals('dummy_payment_1', $data->id);
        $this->assertObjectNotHasAttribute('website', $data);
        $this->assertObjectHasAttribute('payment', $data);

        $request = $this->history()->getLastRequest();

        $this->assertEquals('/v2.1/queue/payments/dummy_payment_1/', $request->getPath());
    }

    /**
     * @test
     * @expectedResponseStatus 303
     * @expectedResponseJson demoScheduledPayment
     */
    public function loadProcessedPayment()
    {
        $response = $this->controller->loadScheduledPayment('dummy_payment_1');

        $this->assertEquals(303, $response->statusCode);

        $request = $this->history()->getLastRequest();

        $this->assertEquals('/v2.1/queue/payments/dummy_payment_1/', $request->getPath());
    }

    /**
     * @test
     * @expectedResponseJson demoScheduledPayment
     */
    public function checkPaymentState()
    {
        $this->assertTrue($this->controller->checkPaymentState('dummy_payment_1'));

        $request = $this->history()->getLastRequest();

        $this->assertEquals('/v2.1/queue/payments/dummy_payment_1/', $request->getPath());
    }

    /**
     * @test
     * @expectedResponseStatus 422
     * @expectedResponseJson demoInvalidPayment
     */
    public function createPaymentWithInvalidData()
    {
        $response = $this->controller->createPayment();
        $data = $response->getRawResponse();

        $this->assertEquals(422, $response->statusCode);
        $this->assertObjectHasAttribute('details', $data);
    }

    /**
     * @test
     * @expectedResponseStatus 202
     * @expectedResponseJson demoPayment
     */
    public function createPayment()
    {
        $response = $this->controller->createPayment();

        $this->assertEquals(202, $response->statusCode);

        $request = $this->history()->getLastRequest();
        $result = json_decode((string) $request->getBody());

        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('/v2.1/payments/', $request->getPath());
        $this->assertEquals('my_website', $result->website);
        $this->assertEquals('my_payment_card', $result->paymentInstrument->paymentCard);
    }
}
