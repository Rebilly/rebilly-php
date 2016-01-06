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
use Rebilly\Middleware;

/**
 * Class BearerAuthentication.
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class BearerAuthentication implements Middleware
{
    const HEADER = 'Authorization';

    /** @var string */
    private $sessionToken;

    /**
     * Constructor
     *
     * @param string $sessionToken
     */
    public function __construct($sessionToken)
    {
        $this->sessionToken = (string) $sessionToken;
    }

    /**
     * Add HTTP header to request.
     *
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        return call_user_func(
            $next,
            $request->withHeader(self::HEADER, "Bearer {$this->sessionToken}"),
            $response
        );
    }
}
