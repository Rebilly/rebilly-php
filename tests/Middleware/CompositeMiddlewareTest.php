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
use Psr\Http\Message\ResponseInterface as Response;
use Rebilly\Client;
use Rebilly\Middleware\CompositeMiddleware;
use Rebilly\Tests\TestCase as TestCase;

/**
 * Class CompositeMiddlewareTest.
 *
 */
class CompositeMiddlewareTest extends TestCase
{
    /**
     * @test
     */
    public function useMiddleware()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        $middleware = new CompositeMiddleware();

        $middleware
            ->attach(function (Request $request, Response $response, $next) {
                return call_user_func($next, $request, $response->withHeader('Header1', 'dummy'));
            })
            ->clear();

        $middleware
            ->attach(function (Request $request, Response $response, $next) {
                return call_user_func($next, $request, $response->withHeader('Header2', 'dummy'));
            })
            ->attach(function (Request $request, Response $response, $next) {
                return call_user_func($next, $request, $response->withHeader('Header3', 'dummy'));
            });

        $done = function (Request $request, Response $response) {
            unset($request);

            return $response;
        };

        $request = $client->createRequest('GET', '/dummy', null);
        $response = $client->createResponse();

        /**
         * @var Response $result
         */
        $result = call_user_func($middleware, $request, $response, $done);

        // Check middleware stack
        $this->assertSame('dummy', $result->getHeaderLine('Header2'));
        $this->assertSame('dummy', $result->getHeaderLine('Header3'));

        // Middleware was cleared, so first handler not applied
        $this->assertFalse($result->hasHeader('Header1'));
    }
}
