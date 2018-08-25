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
use Psr\Log\LogLevel;
use Rebilly\Client;
use Rebilly\Middleware\LogHandler;
use Rebilly\Tests\Stub\EchoLogger;
use Rebilly\Tests\TestCase as TestCase;
use RuntimeException;

/**
 * Class LogHandlerTest.
 *
 */
class LogHandlerTest extends TestCase
{
    /**
     * @test
     */
    public function useMiddleware()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        $done = function (Request $request, Response $response) {
            unset($request);

            return $response->withHeader('Vendor', ['foo', 'bar']);
        };

        $request = $client->createRequest('GET', '/dummy', null);
        $response = $client->createResponse();

        $middleware = new LogHandler(new EchoLogger());

        $this->expectOutputRegex('/-> Request/i');
        call_user_func($middleware, $request, $response, $done);

        $middleware = new LogHandler(new EchoLogger(), [
            'level' => LogLevel::DEBUG,
            'maxStreamSize' => 1024,
            'hideAuth' => true,
            'formatter' => function ($request, $response) {
                return spl_object_hash($request) . PHP_EOL . spl_object_hash($response);
            },
        ]);

        $this->expectOutputRegex('/' . spl_object_hash($request) . '/i');
        call_user_func($middleware, $request, $response, $done);

        try {
            new LogHandler(new EchoLogger(), [
                'formatter' => 'invalid',
            ]);
        } catch (RuntimeException $e) {
            $this->assertSame('Formatter should be callable', $e->getMessage());
        }
    }
}
