<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Rebilly\JwtAuth;
use Rebilly\Middleware;

/**
 * Class JwtAuthentication.
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class JwtAuthentication implements Middleware
{
    const HEADER = 'REB-APIKEY';

    /** @var string */
    private $key;

    /**
     * Constructor
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Add HTTP header to request.
     *
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $jwt = JwtAuth::getJwt();

        if (null !== $jwt && !JwtAuth::isExpiredJwt($jwt)) {
            $request = $request->withHeader(JwtAuth::HEADER, $jwt);
        } else {
            $request = $request->withHeader(self::HEADER, $this->key);
        }

        return call_user_func($next, $request, $response);
    }
}
