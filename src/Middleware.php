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

namespace Rebilly;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Interface Middleware.
 *
 * Middleware is code that exists between the request and response, and which can take the incoming request,
 * perform actions based on it, and either complete the response or pass delegation on to the next middleware in the queue.
 *
 * ```php
 * $client = new Client($host = 'rebilly.com', $sandbox = true);
 * $client->stack = new SplStack();
 * // Add Client as final middleware
 * $client->stack->push($client);
 * $client->stack->push(Authentication($apikey = 'SECRET'));
 * $client->stack->push(Logger());
 * $client->stack->push(History());
 *
 * $response = $client()->send($request);
 * ```
 *
 */
interface Middleware
{
    /**
     * Process an incoming request and/or response.
     *
     * Accepts a server-side request and a response instance, and does
     * something with them.
     *
     * If the response is not complete and/or further processing would not
     * interfere with the work done in the middleware, or if the middleware
     * wants to delegate to another process, it can use the `$out` callable
     * if present.
     *
     * If the middleware does not return a value, execution of the current
     * request is considered complete, and the response instance provided will
     * be considered the response to return.
     *
     * Alternately, the middleware may return a response instance.
     *
     * Often, middleware will `return $next();`, with the assumption that a
     * later middleware will return a response.
     *
     * @param Request $request
     * @param Response $response
     * @param callable $next
     *
     * @return Response|null
     */
    public function __invoke(Request $request, Response $response, callable $next);
}
