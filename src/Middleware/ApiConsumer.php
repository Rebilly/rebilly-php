<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2017 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Rebilly\Middleware;

/**
 * Class ApiConsumer.
 */
final class ApiConsumer implements Middleware
{
    private $sdkVersion;

    /**
     * Constructor.
     *
     * @param string $sdkVersion
     */
    public function __construct($sdkVersion)
    {
        $this->sdkVersion = $sdkVersion;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        return call_user_func(
            $next,
            $request->withHeader('REB-API-CONSUMER', 'REB-PHP-CLIENT/' . $this->sdkVersion),
            $response
        );
    }
}
