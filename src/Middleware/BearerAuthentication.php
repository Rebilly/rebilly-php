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

class BearerAuthentication
{
    public const HEADER = 'Authorization';

    public function __construct(private readonly string $sessionToken)
    {
    }

    public function __invoke(callable $next): Closure
    {
        return function (RequestInterface $request, array $options) use ($next) {
            return $next($request->withHeader(self::HEADER, "Bearer {$this->sessionToken}"), $options);
        };
    }
}
