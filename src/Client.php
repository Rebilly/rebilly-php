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

declare(strict_types=1);

namespace Rebilly\Sdk;

use Error;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Utils;
use Psr\Http\Client\ClientInterface as PsrClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Rebilly\Sdk\Middleware\ApiKeyAuthentication;
use Rebilly\Sdk\Middleware\BaseUri;
use Rebilly\Sdk\Middleware\BearerAuthentication;
use Rebilly\Sdk\Middleware\ErrorHandler;
use Rebilly\Sdk\Middleware\UserAgent;

/**
 * @mixin Service
 */
final class Client implements GuzzleClientInterface, PsrClientInterface
{
    public const BASE_HOST = 'https://api.rebilly.com';

    public const SANDBOX_HOST = 'https://api-sandbox.rebilly.com';

    public const EXPERIMENTAL_BASE = '/experimental';

    public const SDK_VERSION = '3.1.3';

    private GuzzleClient $client;

    /**
     * @param array{
     *     apiKey?: string,
     *     sessionToken?: string,
     *     baseUrl?: string,
     *     organizationId ?: string,
     *     timeout?: int,
     *     allow_redirects?: bool,
     *     proxy ?: string,
     *     handler ?: callable
     *     } $config
     */
    public function __construct(array $config = [])
    {
        $stack = new HandlerStack(Utils::chooseHandler());

        $stack->push(new ErrorHandler(), 'http_errors');
        $stack->push(Middleware::redirect(), 'allow_redirects');
        $stack->push(Middleware::prepareBody(), 'prepare_body');

        if (isset($config['apiKey'])) {
            $authentication = new ApiKeyAuthentication($config['apiKey']);
            $stack->push($authentication);
        } elseif (isset($config['sessionToken'])) {
            $authentication = new BearerAuthentication($config['sessionToken']);
            $stack->push($authentication);
        }

        if (isset($config['baseUrl'])) {
            $config['baseUrl'] = ltrim($config['baseUrl'], '/');
        } else {
            $config['baseUrl'] = self::BASE_HOST;
        }

        $stack->push(
            new BaseUri(
                $this->createUri($config['baseUrl']),
                $config['organizationId'] ?? null
            )
        );

        $stack->push(new UserAgent(self::SDK_VERSION));

        unset($config['baseUrl'], $config['apiKey'], $config['sessionToken'], $config['organizationId']);

        $config['handler'] = $stack;

        $this->client = new GuzzleClient($config);
    }

    public function __call(string $name, array $arguments): mixed
    {
        if (is_callable([$this->combined(), $name])) {
            return $this->service()->{$name}(...$arguments);
        }

        throw new Error(sprintf('Call to undefined method %s::%s().', __CLASS__, $name));
    }

    /**
     * @deprecated
     */
    public function combined(): CombinedService
    {
        return new CombinedService(client: $this);
    }

    public function service(): Service
    {
        return new Service(client: $this);
    }

    public function createUri($uri, array $params = []): Uri
    {
        if ($uri instanceof Uri) {
            if (!empty($params)) {
                $uri = $uri->withQuery(http_build_query($params));
            }

            return $uri;
        }

        // If URL template given, prepare URI
        if (preg_match_all('/{\w+}/i', $uri, $matches)) {
            foreach (array_unique($matches[0]) as $match) {
                $param = mb_substr($match, 1, -1);

                if (isset($params[$param])) {
                    $uri = str_replace($match, $params[$param], $uri);
                    unset($params[$param]);
                }
            }
        }

        if (!empty($params)) {
            $uri .= '?' . http_build_query($params);
        }

        return new Uri($uri);
    }

    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return $this->client->send($request, $options);
    }

    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        return $this->client->sendAsync($request, $options);
    }

    public function request(string $method, $uri, array $options = []): ResponseInterface
    {
        return $this->client->request($method, $uri, $options);
    }

    public function requestAsync(string $method, $uri, array $options = []): PromiseInterface
    {
        return $this->client->requestAsync($method, $uri, $options);
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->client->sendRequest($request);
    }

    /**
     * @deprecated
     */
    public function getConfig(?string $option = null)
    {
        return $this->client->getConfig($option);
    }
}
