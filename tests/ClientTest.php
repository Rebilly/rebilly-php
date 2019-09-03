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

namespace Rebilly\Tests;

use ArrayObject;
use BadMethodCallException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\UriInterface as Uri;
use Psr\Log\NullLogger;
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Customer;
use Rebilly\Http\Exception\HttpException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Service;
use RuntimeException;

/**
 * Class ClientTest.
 *
 */
final class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function initClient()
    {
        try {
            new Client([]);
        } catch (RuntimeException $e) {
            $this->assertSame('Missing Authentication information', $e->getMessage());
        }

        try {
            new Client([
                'apiKey' => ApiKeyProvider::env(),
                'httpHandler' => 'invalid',
            ]);
        } catch (RuntimeException $e) {
            $this->assertSame('HTTP handler should be callable', $e->getMessage());
        }

        try {
            new Client([
                'apiKey' => ApiKeyProvider::env(),
                'logger' => 'invalid',
            ]);
        } catch (RuntimeException $e) {
            $this->assertSame('Logger should implement PSR-3 LoggerInterface', $e->getMessage());
        }

        try {
            new Client([
                'apiKey' => ApiKeyProvider::env(),
                'middleware' => 'invalid',
            ]);
        } catch (RuntimeException $e) {
            $this->assertSame('Middleware should be callable', $e->getMessage());
        }

        $client = new Client([
            'apiKey' => ApiKeyProvider::env(),
        ]);

        $this->assertSame(Client::BASE_HOST, $client->getOption('baseUrl'));

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

        $this->assertSame($response, call_user_func($client, $request, $response));
    }

    /**
     * @test
     */
    public function callInvalidService()
    {
        /** @var mixed $client */
        $client = new Client(['apiKey' => 'QWERTY']);

        $this->expectException(BadMethodCallException::class);
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
            $this->assertSame($code, $e->getStatusCode());
            $this->assertEmpty($e->getErrors());
        } catch (HttpException $e) {
            $this->assertSame($code, $e->getStatusCode());
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


    /**
     * @test
     */
    public function sendRequestWithEmptyRedirectResponse()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $response = $client->createResponse();

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => function (Request $request) use ($response) {
                if ($request->getMethod() === 'POST') {
                    $location = Client::BASE_HOST . '/' . Client::CURRENT_VERSION . '/customers/customer-1';
                    $response = $response->withHeader('Location', $location);
                    $response = $response->withStatus(303);

                    return $response;
                }

                $body = $response->getBody();
                $body->write(json_encode(['id' => 'customer-1']));

                return $response->withBody($body);
            },
        ]);

        /** @var Customer $result */
        $result = $client->post([], 'customers');

        $this->assertInstanceOf(Customer::class, $result);
        $this->assertSame('customer-1', $result->getId());
    }

    /**
     * @test
     */
    public function sendRequestWithEmptyRedirectResponseToAnotherHost()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $response = $client->createResponse();

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => function (Request $request) use ($response) {
                if ($request->getMethod() === 'POST') {
                    $location = 'https://example.com/customers/customer-1';
                    $response = $response->withHeader('Location', $location);
                    $response = $response->withStatus(303);

                    return $response;
                }

                $body = $response->getBody();
                $body->write(json_encode(['id' => 'customer-1']));

                return $response->withBody($body);
            },
        ]);

        /** @var Customer $result */
        $result = $client->post([], 'customers');

        $this->assertInstanceOf(Customer::class, $result);
        $this->assertNull($result->getId());
    }

    /**
     * @test
     */
    public function sendRequestWithNonEmptyRedirectResponse()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $response = $client->createResponse();

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => function (Request $request) use ($response) {
                if ($request->getMethod() === 'POST') {
                    $location = Client::BASE_HOST . '/' . Client::CURRENT_VERSION . '/customers/customer-1';
                    $response = $response->withHeader('Location', $location);
                    $response = $response->withStatus(303);

                    $body = $response->getBody();
                    $body->write(json_encode(['id' => 'customer-1']));

                    return $response->withBody($body);
                }

                $body = $response->getBody();
                $body->write(json_encode(['id' => 'customer-2']));

                return $response->withBody($body);
            },
        ]);

        /** @var Customer $result */
        $result = $client->post([], 'customers');

        $this->assertInstanceOf(Customer::class, $result);
        $this->assertSame('customer-1', $result->getId());
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
