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
use Rebilly\Middleware\LogHandler;
use Rebilly\Tests\TestCase as TestCase;

/**
 * Class LogHandlerTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
class LogHandlerTest extends TestCase
{
    /**
     * @test
     */
    public function useMiddleware()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        $middleware = new LogHandler(null);

        $done = function ($request, $response) {
            unset($request);

            return $response;
        };

        $request = $client->createRequest('GET', '/dummy', null);
        $response = $client->createResponse();

        $result = call_user_func($middleware, $request, $response, $done);

        $this->assertEquals(spl_object_hash($response), spl_object_hash($result));
    }
}
