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

final class OrganizationIdHeader implements Middleware
{
    public const HEADER = 'Organization-Id';

    /** @var string */
    private $organizationId;

    public function __construct($organizationId)
    {
        $this->organizationId = (string) $organizationId;
    }

    public function __invoke(Request $request, Response $response, callable $next)
    {
        return call_user_func(
            $next,
            $request->withHeader(self::HEADER, $this->organizationId),
            $response
        );
    }
}
