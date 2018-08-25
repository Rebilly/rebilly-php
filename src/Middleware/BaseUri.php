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

    /**
     * Constructor
     *
     * @param Uri $uri
     */
    public function __construct(Uri $uri = null)
    {
        $this->uri = $uri;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        // Prepare default URL
        // TODO: Improve URI modification
        $uri = $this->uri;
        $uri = $uri->withPath($uri->getPath() . '/' . ltrim($request->getUri()->getPath(), '/'));
        $uri = $uri->withQuery($request->getUri()->getQuery());
        $request = $request->withUri($uri);

        return $next($request, $response);
    }
}
