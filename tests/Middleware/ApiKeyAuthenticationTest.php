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
use Rebilly\Middleware\ApiKeyAuthentication;
use Rebilly\Tests\TestCase as TestCase;

/**
 * Class ApiKeyAuthenticationTest.
 *
 */
class ApiKeyAuthenticationTest extends TestCase
{
    /**
     * @test
     */
    public function useMiddleware()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        $middleware = new ApiKeyAuthentication('QWERTY');
        $done = function (Request $request) {
            return $request;
        };

        $request = $client->createRequest('GET', '/', null);
        $response = $client->createResponse();

        /**
         * @var Request $result
         */
        $result = call_user_func($middleware, $request, $response, $done);

        $this->assertTrue($result->hasHeader(ApiKeyAuthentication::HEADER));
        $this->assertSame('QWERTY', $result->getHeaderLine(ApiKeyAuthentication::HEADER));
    }
}
