<?php
/**
 * This file is part of Rebilly.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Deprecated;

use RebillyResponse;
use Rebilly\Test\TestCase;

/**
 * Class RebillyResponseTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class RebillyResponseTest extends TestCase
{
    /**
     * @test
     */
    public function parseCreateCustomerNewCardSuccess()
    {
        $json = <<<JSON
{
    "customer":{
        "action":"CUSTOMER_CREATE",
        "status":"Success",
        "paymentCard":{
            "action":"PAYMENT_CARD_CREATE",
            "status":"Success",
            "authorization":{
                "action":"AUTHORIZE_PAYMENT_CARD",
                "status":"Success",
                "transaction":{
                    "id":"3356446865202abe3d5044",
                    "customerId":"custB26",
                    "type":"authorize",
                    "result":"approved",
                    "currency":"USD",
                    "amount":"1.99",
                    "processorAccount":"pv123",
                    "last4":"1111",
                    "paymentMethod":"Visa"
                }
            }
        }
    }
}
JSON;

        $response = new RebillyResponse(200, $json);
        $response->prepareResponse();

        $this->assertEmpty($response->errors);
        $this->assertFalse($response->hasError());
        $this->assertNotEmpty($response->transactions);
        $this->assertTrue($response->hasTransaction());
        $this->assertEquals('3356446865202abe3d5044', $response->transactions->id);
    }

    /**
     * @test
     */
    public function parseCreateCustomerNewCardError()
    {
        $json = <<<JSON
{
    "customer":{
        "action":"CUSTOMER_CREATE",
        "status":"Failure",
        "errors":[
            "[customerId] is already used for another customer."
        ],
        "paymentCard":{
            "action":"PAYMENT_CARD_CREATE",
            "status":"Valid",
            "authorization":{
                "action":"AUTHORIZE_PAYMENT_CARD",
                "status":"Valid"
            }
        }
    }
}
JSON;

        $response = new RebillyResponse(200, $json);
        $response->prepareResponse();

        $this->assertNotEmpty($response->errors);
        $this->assertTrue($response->hasError());
        $this->assertEmpty($response->transactions);
        $this->assertFalse($response->hasTransaction());
        $this->assertEquals(
            '[customerId] is already used for another customer.',
            reset($response->errors)
        );
    }
}
