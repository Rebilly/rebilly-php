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
 * Class OrganizationIdHeader
 *
 */
final class OrganizationIdHeader implements Middleware
{
    public const HEADER = 'Organization-Id';

    /** @var string */
    private $organizationId;

    /**
     * Constructor
     *
     * @param string|null $organizationId
     */
    public function __construct(string $organizationId = null)
    {
        $this->organizationId = $organizationId;
    }

    /**
     * Add HTTP header to request.
     *
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        if (!is_null($this->organizationId)) {
            $request = $request->withHeader(self::HEADER, $this->organizationId);
        }

        return call_user_func(
            $next,
            $request,
            $response
        );
    }
}
