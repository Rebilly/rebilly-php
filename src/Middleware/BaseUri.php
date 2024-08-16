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

namespace Rebilly\Sdk\Middleware;

use Closure;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Rebilly\Sdk\Client;

final class BaseUri
{
    public function __construct(private ?Uri $uri = null, private ?string $organizationId = null)
    {
    }

    public function __invoke(callable $next): Closure
    {
        return function (RequestInterface $request, array $options) use ($next) {
            if ($request->getHeaderLine('Host') !== '') {
                return $next($request, $options);
            }
            $newPath = $this->adjustUriPath($request->getUri()->getPath());
            $request = $request->withUri(
                $this->uri->withPath($newPath)
                    ->withQuery($request->getUri()->getQuery()),
            );

            return $next($request, $options)->then(
                function (ResponseInterface $response) {
                    if ($response->getHeaderLine('Location') === '') {
                        return $response;
                    }
                    $locationUri = new Uri($response->getHeaderLine('Location'));
                    $newPath = $this->adjustUriPath($locationUri->getPath());

                    return $response->withHeader(
                        'Location',
                        $this->uri->withPath($newPath)
                            ->withQuery($locationUri->getQuery())
                            ->__toString(),
                    );
                },
            );
        };
    }

    private function adjustUriPath(string $requestPath): string
    {
        $basePath = $this->uri->getPath();

        if (
            str_starts_with($requestPath, Client::EXPERIMENTAL_BASE)
            && !str_ends_with(rtrim($basePath, '/'), ltrim(Client::EXPERIMENTAL_BASE, '/'))
        ) {
            $basePath .= Client::EXPERIMENTAL_BASE;
            $requestPath = mb_substr($requestPath, mb_strlen(Client::EXPERIMENTAL_BASE));
        }
        $basePath .= '/';
        if ($this->organizationId) {
            $basePath .= 'organizations/' . $this->organizationId . '/';
        }

        return $basePath . ltrim($requestPath, '/');
    }
}
