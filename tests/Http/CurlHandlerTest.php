<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Http;

use ReflectionMethod;
use Rebilly\Client;
use Rebilly\Http\CurlHandler;
use Rebilly\Http\CurlSession;
use Rebilly\Http\Exception\TransferException;
use Rebilly\Tests\TestCase;
use RuntimeException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

/**
 * Class CurlHandlerTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
class CurlHandlerTest extends TestCase
{
    /**
     * @test
     */
    public function sessionFactory()
    {
        $handler = new CurlHandler();

        $ref = new ReflectionMethod(CurlHandler::class, 'createSession');
        $ref->setAccessible(true);

        $session = $ref->invoke($handler);
        $this->assertInstanceOf(CurlSession::class, $session);
    }

    /**
     * @test
     * @dataProvider provideRequests
     *
     * @param Request $request
     */
    public function sendRequest(Request $request)
    {
        $fakeBody = json_encode([], JSON_FORCE_OBJECT);
        $fakeHeaders = "HTTP/1.1 200 OK\r\nContent-Type: application/json; charset=utf-8\r\n";

        /** @var CurlSession|MockObject $session */
        $session = $this->getMock(CurlSession::class);
        $session->method('execute')->will($this->returnValue($fakeHeaders . $fakeBody));
        $session->method('getInfo')->will($this->returnValue(strlen($fakeHeaders)));

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class, ['createSession']);
        $handler
            ->method('createSession')
            ->will($this->returnValue($session))
        ;

        /** @var Response $response */
        $response = call_user_func($handler, $request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function invalidRequest()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $request = $client->createRequest('GET', 'http://google.com', null);

        /** @var CurlSession|MockObject $session */
        $session = $this->getMock(CurlSession::class, ['open']);
        $session->expects($this->any())->method('open')->will($this->returnValue(false));

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class, ['createSession']);
        $handler->expects($this->any())->method('createSession')->will($this->returnValue($session));

        try {
            call_user_func($handler, $request);
        } catch (RuntimeException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "RuntimeException" is thrown.');
            }
        }

        /** @var CurlSession|MockObject $session */
        $session = $this->getMock(
            CurlSession::class,
            ['open', 'execute', 'setOptions', 'getErrorMessage', 'getErrorCode']
        );
        $session->expects($this->any())->method('open')->will($this->returnValue(true));
        $session->expects($this->any())->method('execute')->will($this->returnValue(false));

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class, ['createSession']);
        $handler->expects($this->any())->method('createSession')->will($this->returnValue($session));

        try {
            call_user_func($handler, $request);
        } catch (TransferException $e) {
        } finally {
            if (!isset($e)) {
                $this->fail('Failed asserting that exception of type "TransferException" is thrown.');
            }
        }
    }

    /**
     * @return array
     */
    public function provideRequests()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        return [
            [$client->createRequest('OPTIONS', 'http://google.com', null)],
            [$client->createRequest('HEAD', 'http://google.com', null)],
            [$client->createRequest('GET', 'http://google.com', null)],
            [$client->createRequest('POST', 'http://google.com', [])],
            [$client->createRequest('PUT', 'http://google.com', [])],
            [$client->createRequest('DELETE', 'http://google.com', null)],
        ];
    }
}
