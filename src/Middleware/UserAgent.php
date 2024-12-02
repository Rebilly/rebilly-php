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
use Psr\Http\Message\RequestInterface;

final class UserAgent
{
    public function __construct(private ?string $sdkVersion)
    {
    }

    public function __invoke(callable $next): Closure
    {
        return function (RequestInterface $request, array $options) use ($next) {
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
            ), $options);
        };
    }

    private static function generateUserAgentName($name, $version, array $features): string
    {
        return sprintf('RebillySDK/%s %s (%s)', $name, $version, implode('; ', $features));
    }
}
