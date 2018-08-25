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
use Rebilly\Middleware;

/**
 * Class ApiKeyAuthentication.
 *
 */
final class ApiKeyAuthentication implements Middleware
{
    public const HEADER = 'REB-APIKEY';

    /** @var string */
    private $key;

    /**
     * Constructor
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = (string) $key;
    }

    /**
     * Add HTTP header to request.
     *
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        return call_user_func($next, $request->withHeader(self::HEADER, $this->key), $response);
    }
}
