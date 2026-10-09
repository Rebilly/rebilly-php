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

namespace Rebilly\Sdk\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

class MembershipsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function deleteUserMembership(
        string $organizationId,
        string $userId,
    ): void {
        $pathParams = [
            '{organizationId}' => $organizationId,
            '{userId}' => $userId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/memberships/{organizationId}/{userId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }
}
