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

use function GuzzleHttp\choose_handler;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Uri;
use Rebilly\Sdk\Middleware\ApiKeyAuthentication;
use Rebilly\Sdk\Middleware\BaseUri;
use Rebilly\Sdk\Middleware\BearerAuthentication;
use Rebilly\Sdk\Middleware\ErrorHandler;
use Rebilly\Sdk\Middleware\UserAgent;

final class Client extends GuzzleClient
{
    public const BASE_HOST = 'https://api.rebilly.com';

    public const SANDBOX_HOST = 'https://api-sandbox.rebilly.com';

    public const SDK_VERSION = '3.0.0';

    /**
     * @param array{
     *     apiKey?: string,
     *     sessionToken?: string,
     *     base_uri?: string,
     *     organizationId ?: string,
     *     timeout?: int,
     *     allow_redirects?: bool,
     *     proxy ?: string,
     *     handler ?: callable
     *     } $config
     */
    public function __construct(array $config = [])
    {
        $stack = new HandlerStack(choose_handler());

        $stack->push(new ErrorHandler(), 'http_errors');
        $stack->push(Middleware::prepareBody(), 'prepare_body');

        if (isset($config['apiKey'])) {
            $authentication = new ApiKeyAuthentication($config['apiKey']);
            $stack->push($authentication);
        } elseif (isset($config['sessionToken'])) {
            $authentication = new BearerAuthentication($config['sessionToken']);
            $stack->push($authentication);
        }

        if (isset($config['base_uri'])) {
            $config['base_uri'] = ltrim($config['base_uri'], '/');
        } else {
            $config['base_uri'] = self::BASE_HOST;
        }

        $stack->push(Middleware::redirect(), 'allow_redirects');
        $stack->push(new BaseUri(
            $this->createUri($config['base_uri']),
            $config['organizationId'] ?? null
        ));

        $stack->push(new UserAgent(self::SDK_VERSION));

        unset($config['base_uri'], $config['apiKey'], $config['sessionToken'], $config['organizationId']);

        $config['handler'] = $stack;

        parent::__construct($config);
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
}
