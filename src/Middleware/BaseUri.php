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

namespace Rebilly\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\UriInterface as Uri;
use Rebilly\Middleware;

/**
 * Class BaseUri.
 *
 */
final class BaseUri implements Middleware
{
    /** @var Uri */
    private $uri;

    /** @var string|null */
    private $organizationId;

    /**
     * Constructor
     *
     * @param Uri $uri
     * @param string|null $organizationId
     */
    public function __construct(Uri $uri = null, ?string $organizationId = null)
    {
        $this->uri = $uri;
        $this->organizationId = $organizationId;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        // Prepare default URL
        // TODO: Improve URI modification
        $uri = $this->uri;
        $basePath = $uri->getPath() . '/';
        if ($this->organizationId) {
            $basePath .= 'organizations/' . $this->organizationId . '/';
        }
        $uri = $uri->withPath($basePath . ltrim($request->getUri()->getPath(), '/'));
        $uri = $uri->withQuery($request->getUri()->getQuery());
        $request = $request->withUri($uri);

        return $next($request, $response);
    }
}
