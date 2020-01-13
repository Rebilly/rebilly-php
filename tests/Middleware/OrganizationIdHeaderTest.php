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

namespace Rebilly\Tests\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Rebilly\Client;
use Rebilly\Middleware\OrganizationIdHeader;
use Rebilly\Tests\TestCase;

/**
 * Class OrganizationIdHeaderTest
 *
 */
class OrganizationIdHeaderTest extends TestCase
{
    /**
     * @test
     */
    public function useMiddleware()
    {
        $organizationId = 'demo-organization-id';
        $client = new Client([
            'apiKey' => 'QWERTY',
            'organizationId' => $organizationId,
        ]);
        $middleware = new OrganizationIdHeader($organizationId);

        $done = function (Request $request) {
            return $request;
        };

        $request = $client->createRequest('GET', '/demo', null);
        $response = $client->createResponse();

        /**
         * @var Request $result
         */
        $result = call_user_func($middleware, $request, $response, $done);

        $this->assertTrue($result->hasHeader(OrganizationIdHeader::HEADER));
        $this->assertSame($organizationId, $result->getHeaderLine(OrganizationIdHeader::HEADER));
    }
}
