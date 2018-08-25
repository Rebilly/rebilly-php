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

namespace Rebilly\Tests\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Rebilly\Client;
use Rebilly\Middleware\BearerAuthentication;
use Rebilly\Tests\TestCase as TestCase;

/**
 * Class BearerAuthenticationTest.
 */
class BearerAuthenticationTest extends TestCase
{
    /**
     * @test
     */
    public function useMiddleware()
    {
        $client = new Client(['sessionToken' => 'QWERTY']);
        $request = $client->createRequest('GET', '/', null);
        $response = $client->createResponse();

        $middleware = new BearerAuthentication('QWERTY');
        $done = function (Request $request) {
            return $request;
        };

        /** @var Request $result */
        $result = call_user_func($middleware, $request, $response, $done);

        $this->assertTrue($result->hasHeader(BearerAuthentication::HEADER));
        $this->assertSame('Bearer QWERTY', $result->getHeaderLine(BearerAuthentication::HEADER));
    }
}
