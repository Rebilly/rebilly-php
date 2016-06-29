<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Middleware;

use Rebilly\Client;
use Rebilly\Middleware\CompositeMiddleware;
use Rebilly\Tests\TestCase as TestCase;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class CompositeMiddlewareTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
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
        $this->assertEquals('dummy', $result->getHeaderLine('Header2'));
        $this->assertEquals('dummy', $result->getHeaderLine('Header3'));

        // Middleware was cleared, so first handler not applied
        $this->assertFalse($result->hasHeader('Header1'));
    }
}
