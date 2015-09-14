<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests;

use ArrayObject;
use Psr\Log\NullLogger;
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Http\Exception\HttpException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\ParamBag;
use Rebilly\Rest\Service;
use RuntimeException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\UriInterface as Uri;

/**
 * Class ClientTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function autoloadClasses()
    {
        $this->assertEquals(true, class_exists(Client::class));

        Client::autoload(ParamBag::class);

        $this->assertEquals(true, class_exists(ParamBag::class, false));

        Client::registerAutoloader();
        $this->assertTrue(in_array([Client::class, 'autoload'], spl_autoload_functions()));

        Client::unregisterAutoloader();
        $this->assertFalse(in_array([Client::class, 'autoload'], spl_autoload_functions()));
    }

    /**
     * @test
     */
    public function initClient()
    {
        try {
            new Client([]);
        } catch (RuntimeException $e) {
            $this->assertEquals('Missed API Key', $e->getMessage());
        }

        try {
            new Client([
                'apiKey' => ApiKeyProvider::env(),
                'httpHandler' => 'invalid',
            ]);
        } catch (RuntimeException $e) {
            $this->assertEquals('HTTP handler should be callable', $e->getMessage());
        }

        try {
            new Client([
                'apiKey' => ApiKeyProvider::env(),
                'logger' => 'invalid',
            ]);
        } catch (RuntimeException $e) {
            $this->assertEquals('Logger should implement PSR-3 LoggerInterface', $e->getMessage());
        }

        try {
            new Client([
                'apiKey' => ApiKeyProvider::env(),
                'middleware' => 'invalid',
            ]);
        } catch (RuntimeException $e) {
            $this->assertEquals('Middleware should be callable', $e->getMessage());
        }

        $client = new Client([
            'apiKey' => ApiKeyProvider::env(),
        ]);

        $this->assertEquals(Client::BASE_HOST, $client->getOption('baseUrl'));

        $client = new Client([
            'apiKey' => ApiKeyProvider::env(),
            'baseUrl' => Client::SANDBOX_HOST,
            'httpHandler' => null,
            'logger' => new NullLogger(),
        ]);

        return $client;
    }

    /**
     * @test
     * @depends initClient
     *
     * @param Client $client
     */
    public function useFactoryMethods(Client $client)
    {
        $request = $client->createRequest('GET', $client->getOption('baseUrl'), null);
        $this->assertInstanceOf(Request::class, $request);

        $response = $client->createResponse();
        $this->assertInstanceOf(Response::class, $response);

        $uri = $client->createUri($request->getUri(), ['param' => 'value']);
        $this->assertInstanceOf(Uri::class, $uri);
        $this->assertStringEndsWith('param=value', $uri->getQuery());

        $uri = $client->createUri(
            $client->getOption('baseUrl') . '/{version}',
            [
                'version' => 'v3',
                'param' => 'value',
            ]
        );

        $this->assertInstanceOf(Uri::class, $uri);
        $this->assertStringEndsWith('v3', $uri->getPath());
        $this->assertStringEndsWith('param=value', $uri->getQuery());
    }

    /**
     * @test
     */
    public function injectHttpHandler()
    {
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => function ($request) {
                return $request;
            },
        ]);

        $request = $client->createRequest('GET', $client->getOption('baseUrl'), null);
        $this->assertInstanceOf(Request::class, $request);

        $response = $client->createResponse();
        $this->assertInstanceOf(Response::class, $response);

        $this->assertEquals($response, call_user_func($client, $request, $response));
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function callInvalidService()
    {
        /** @var mixed $client */
        $client = new Client(['apiKey' => 'QWERTY']);
        $client->invalidService();
    }

    /**
     * @test
     */
    public function callValidService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $service = $client->customers();

        $this->assertInstanceOf(Service::class, $service);
    }

    /**
     * @test
     * @dataProvider provideHttpExceptionCodes
     *
     * @param int $code
     */
    public function sendInvalidRequest($code)
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $response = $client->createResponse();

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => function () use ($response, $code) {
                return $response->withStatus($code);
            },
        ]);

        try {
            $client->post([], 'customers');
        } catch (UnprocessableEntityException $e) {
            $this->assertEquals($code, $e->getStatusCode());
            $this->assertEmpty($e->getErrors());
        } catch (HttpException $e) {
            $this->assertEquals($code, $e->getStatusCode());
        }
    }

    /**
     * @test
     */
    public function sendValidRequest()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $response = $client->createResponse();

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => function (Request $request) use ($response) {
                if ($request->getMethod() === 'HEAD') {
                    return $response;
                }

                $body = $response->getBody();
                $body->write(json_encode([['id' => 'dummy']]));

                return $response->withBody($body);
            },
        ]);

        $client->head('dummy', new ArrayObject());

        $result = $client->post([], 'customers');

        $this->assertNotNull($result);
    }

    public function provideHttpExceptionCodes()
    {
        return [
            [404],
            [410],
            [422],
            [400],
            [500],
        ];
    }
}
