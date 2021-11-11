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
use Rebilly\Middleware\BaseUri;
use Rebilly\Tests\TestCase as TestCase;

/**
 * Class BaseUriTest.
 *
 */
class BaseUriTest extends TestCase
{
    /**
     * @test
     */
    public function useMiddleware()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $baseUrl = $client->createUri('http://google.com/map');

        $middleware = new BaseUri($baseUrl);

        $done = function (Request $request) {
            return $request;
        };

        $request = $client->createRequest('GET', '/demo', null);
        $response = $client->createResponse();

        /**
         * @var Request $result
         */
        $result = call_user_func($middleware, $request, $response, $done);
        $url = $result->getUri();

        $this->assertSame('google.com', $url->getHost());
        $this->assertSame('/map/demo', $url->getPath());
    }

    /**
     * @test
     */
    public function useMiddlewareWithOrganizationId()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $baseUrl = $client->createUri('http://google.com/map');

        $middleware = new BaseUri($baseUrl, 'foo');

        $done = function (Request $request) {
            return $request;
        };

        $request = $client->createRequest('GET', '/demo', null);
        $response = $client->createResponse();

        /**
         * @var Request $result
         */
        $result = call_user_func($middleware, $request, $response, $done);
        $url = $result->getUri();

        $this->assertSame('google.com', $url->getHost());
        $this->assertSame('/map/organizations/foo/demo', $url->getPath());
    }
}
