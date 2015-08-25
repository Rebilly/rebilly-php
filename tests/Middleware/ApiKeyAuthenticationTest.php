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
use Rebilly\Middleware\ApiKeyAuthentication;
use Rebilly\Tests\TestCase as TestCase;
use Psr\Http\Message\RequestInterface as Request;

/**
 * Class ApiKeyAuthenticationTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
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
        $this->assertEquals('QWERTY', $result->getHeaderLine(ApiKeyAuthentication::HEADER));
    }
}
