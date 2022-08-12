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

class LogoutApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    public function logout(
    ): void {
        $uri = '/logout';

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }
}
