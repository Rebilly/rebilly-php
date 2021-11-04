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

namespace Rebilly\Tests\Http;

use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Message\ResponseInterface as Response;
use Rebilly\Client;
use Rebilly\Http\CurlHandler;
use Rebilly\Http\CurlSession;
use Rebilly\Http\Exception\TransferException;
use Rebilly\Tests\TestCase;
use ReflectionMethod;
use RuntimeException;

/**
 * Class CurlHandlerTest.
 *
 */
class CurlHandlerTest extends TestCase
{
    /** @var Client */
    private $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client(['apiKey' => 'QWERTY']);
    }

    /**
     * @test
     */
    public function sessionFactory()
    {
        $handler = new CurlHandler();

        $ref = new ReflectionMethod(CurlHandler::class, 'createSession');
        $ref->setAccessible(true);

        $session = $ref->invoke($handler);
        self::assertInstanceOf(CurlSession::class, $session);
    }

    /**
     * @test
     * @dataProvider provideValidRequests
     *
     * @param $method
     * @param $url
     * @param $payload
     * @param $headers
     */
    public function sendRequest($method, $url, $payload, $headers)
    {
        $request = $this->client->createRequest($method, $url, $payload, $headers);

        $fakeBody = json_encode([], JSON_FORCE_OBJECT);
        $fakeHeaders = "HTTP/1.1 200 OK\r\nContent-Type: application/json; charset=utf-8\r\n";

        /** @var CurlSession|MockObject $session */
        $session = $this->createMock(CurlSession::class);
        $session->method('execute')->willReturn($fakeHeaders . $fakeBody);
        $session->method('getInfo')->willReturn(strlen($fakeHeaders));

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createPartialMock(CurlHandler::class, ['createSession']);
        $handler->method('createSession')->willReturn($session);

        /** @var Response $response */
        $response = call_user_func($handler, $request);

        self::assertInstanceOf(Response::class, $response);
        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @test
     * @dataProvider provideValidRequests
     *
     * @param $method
     * @param $url
     * @param $payload
     * @param $headers
     */
    public function sendRequestHttp2($method, $url, $payload, $headers)
    {
        $request = $this->client->createRequest($method, $url, $payload, $headers);

        $fakeBody = json_encode([], JSON_FORCE_OBJECT);
        $fakeHeaders = "HTTP/2 200 OK\r\nContent-Type: application/json; charset=utf-8\r\n";

        /** @var CurlSession|MockObject $session */
        $session = $this->createMock(CurlSession::class);
        $session->method('execute')->willReturn($fakeHeaders . $fakeBody);
        $session->method('getInfo')->willReturn(strlen($fakeHeaders));

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createPartialMock(CurlHandler::class, ['createSession']);
        $handler->method('createSession')->willReturn($session);

        /** @var Response $response */
        $response = call_user_func($handler, $request);

        self::assertInstanceOf(Response::class, $response);
        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function invalidRequest()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $request = $client->createRequest('GET', 'http://google.com', null);

        /** @var CurlSession|MockObject $session */
        $session = $this->createPartialMock(CurlSession::class, ['open']);
        $session->method('open')->willReturn(false);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createPartialMock(CurlHandler::class, ['createSession']);
        $handler->method('createSession')->willReturn($session);

        try {
            call_user_func($handler, $request);
        } catch (RuntimeException $e) {
            self::assertSame('Cannot initialize a cURL session', $e->getMessage());
        } finally {
            if (!isset($e)) {
                self::fail('Failed asserting that exception of type "RuntimeException" is thrown.');
            }
        }

        /** @var CurlSession|MockObject $session */
        $session = $this->createPartialMock(
            CurlSession::class,
            ['open', 'execute', 'setOptions', 'getErrorMessage', 'getErrorCode']
        );
        $session->method('open')->will(self::returnValue(true));
        $session->method('execute')->will(self::returnValue(false));

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createPartialMock(CurlHandler::class, ['createSession']);
        $handler->method('createSession')->will(self::returnValue($session));

        try {
            call_user_func($handler, $request);
        } catch (TransferException $e) {
        } finally {
            if (!isset($e)) {
                self::fail('Failed asserting that exception of type "TransferException" is thrown.');
            }
        }
    }

    /**
     * @return array
     */
    public function provideValidRequests()
    {
        return [
            ['OPTIONS', 'http://google.com', null, []],
            ['HEAD', 'http://google.com', null, []],
            ['GET', 'http://google.com', null, []],
            ['POST', 'http://google.com', 'body', []],
            ['PUT', 'http://google.com', 'body', []],
            ['DELETE', 'http://google.com', null, []],
        ];
    }
}
