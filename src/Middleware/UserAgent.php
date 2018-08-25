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
 * Class UserAgent.
 */
final class UserAgent implements Middleware
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
            $request->withHeader(
                'User-Agent',
                $this->generateUserAgentName(
                    'PHP-SDK',
                    $this->sdkVersion,
                    [
                        'platform-ver=' . PHP_VERSION,
                        'os=' . str_replace(' ', '_', php_uname('s') . ' ' . php_uname('r')),
                        'machine=' . php_uname('m'),
                    ]
                )
            ),
            $response
        );
    }

    /**
     * Generate User-Agent header value.
     *
     * @param string $name
     * @param string $version
     * @param array $features
     *
     * @return string
     */
    private static function generateUserAgentName($name, $version, array $features)
    {
        return sprintf('RebillySDK/%s %s (%s)', $name, $version, implode('; ', $features));
    }
}
