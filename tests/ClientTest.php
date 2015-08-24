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

use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\ParamBag;
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
    public function setUp()
    {
        parent::setUp();

        if (!getenv(ApiKeyProvider::ENV_APIKEY)) {
            $this->markTestSkipped();
        }
    }

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

        $client = new Client([
            'apiKey' => ApiKeyProvider::env(),
        ]);

        $this->assertEquals(Client::BASE_HOST, $client->getOption('baseUrl'));

        $client = new Client([
            'apiKey' => ApiKeyProvider::env(),
            'baseUrl' => Client::SANDBOX_HOST,
            'httpHandler' => null,
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
            }
        ]);

        $request = $client->createRequest('GET', $client->getOption('baseUrl'), null);
        $this->assertInstanceOf(Request::class, $request);

        $response = $client->createResponse();
        $this->assertInstanceOf(Response::class, $response);

        $this->assertEquals($response, call_user_func($client, $request, $response));
    }
}
