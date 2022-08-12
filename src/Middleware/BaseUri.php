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

final class BaseUri
{
    public function __construct(private readonly ?Uri $uri = null, private readonly ?string $organizationId = null)
    {
    }

    public function __invoke(callable $next): Closure
    {
        return function (RequestInterface $request, array $options) use ($next) {
            if ($request->getHeaderLine('Host') === '') {
                $uri = $this->uri;
                $basePath = $uri->getPath() . '/';
                if ($this->organizationId) {
                    $basePath .= 'organizations/' . $this->organizationId . '/';
                }
                $uri = $uri->withPath($basePath . ltrim($request->getUri()->getPath(), '/'));
                $uri = $uri->withQuery($request->getUri()->getQuery());
                $request = $request->withUri($uri);
            }

            return $next($request, $options);
        };
    }
}
