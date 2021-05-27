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

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Rebilly\Client;
use Rebilly\Http\GuzzleAdapter;
use Rebilly\Tests\TestCase;

/**
 * Class GuzzleAdapterTest.
 *
 */
class GuzzleAdapterTest extends TestCase
{
    /**
     * @test
     */
    public function validRequest()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $request = $client->createRequest('GET', 'http://google.com', null);
        $response = $client->createResponse()->withStatus('204');

        /** @var GuzzleClient|MockObject $guzzle */
        $guzzle = $this->createMock(GuzzleClient::class);
        $guzzle
            ->expects(self::any())
            ->method('send')
            ->willReturn($response);

        $handler = new GuzzleAdapter($guzzle);

        $response = call_user_func($handler, $request);

        self::assertInstanceOf(Response::class, $response);
        self::assertSame(204, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function invalidRequest()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        /** @var Request $response */
        $request = $client->createRequest('GET', 'http://google.com', null);

        /** @var GuzzleClient|MockObject $guzzle */
        $guzzle = $this->createMock(GuzzleClient::class);
        $guzzle
            ->method('send')
            ->willThrowException(new RequestException('', $request));

        $handler = new GuzzleAdapter($guzzle);

        /** @var Response $response */
        $response = call_user_func($handler, $request);

        self::assertInstanceOf(Response::class, $response);
        self::assertSame(444, $response->getStatusCode());
    }
}
