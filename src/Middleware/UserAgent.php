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
        $release = @php_uname('r') ?: 'unknown';
        $machine = @php_uname('m') ?: 'unknown';

        return $next($request->withHeader(
            'User-Agent',
            self::generateUserAgentName(
                'PHP-SDK',
                $this->sdkVersion,
                [
                    'platform-ver=' . PHP_VERSION,
                    'os=' . str_replace(' ', '_', PHP_OS . ' ' . $release),
                    'machine=' . $machine,
                ]
            )
        ), $response);
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
    private static function generateUserAgentName($name, $version, array $features): string
    {
        return sprintf('RebillySDK/%s %s (%s)', $name, $version, implode('; ', $features));
    }
}
