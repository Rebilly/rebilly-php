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

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use Rebilly\Client;
use Rebilly\Http\GuzzleAdapter;
use Rebilly\Tests\TestCase;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

/**
 * Class GuzzleAdapterTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
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
        $guzzle = $this->getMock(GuzzleClient::class);
        $guzzle
            ->expects($this->any())
            ->method('send')
            ->will($this->returnValue($response))
        ;

        $handler = new GuzzleAdapter($guzzle);

        $response = call_user_func($handler, $request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(204, $response->getStatusCode());
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
        $guzzle = $this->getMock(GuzzleClient::class);
        $guzzle
            ->expects($this->any())
            ->method('send')
            ->will($this->throwException(new RequestException('', $request)))
        ;

        $handler = new GuzzleAdapter($guzzle);

        /** @var Response $response */
        $response = call_user_func($handler, $request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(444, $response->getStatusCode());
    }
}
