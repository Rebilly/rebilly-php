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
use Rebilly\Middleware\BaseUri;
use Rebilly\Tests\TestCase as TestCase;
use Psr\Http\Message\RequestInterface as Request;

/**
 * Class BaseUriTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
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

        $this->assertEquals('google.com', $url->getHost());
        $this->assertEquals('/map/demo', $url->getPath());
    }
}
