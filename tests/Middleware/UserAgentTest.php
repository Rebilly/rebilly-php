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
use Rebilly\Middleware\UserAgent;
use Rebilly\Tests\TestCase as TestCase;
use Psr\Http\Message\RequestInterface as Request;

/**
 * Class UserAgentTest.
 */
class UserAgentTest extends TestCase
{
    /**
     * @test
     */
    public function useMiddleware()
    {
        $client = new Client(['sessionToken' => 'QWERTY']);
        $request = $client->createRequest('GET', '/', null);
        $response = $client->createResponse();

        $middleware = new UserAgent('1.0');
        $done = function (Request $request) {
            return $request;
        };

        /** @var Request $result */
        $result = call_user_func($middleware, $request, $response, $done);

        $this->assertTrue($result->hasHeader('User-Agent'));
        $this->assertContains('RebillySDK/PHP-SDK 1.0', $result->getHeaderLine('User-Agent'));
    }
}
