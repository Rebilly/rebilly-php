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
use GuzzleHttp\Utils;
use Rebilly\Sdk\Model\ForgotPassword;

class AccountApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function forgotPassword(
        ForgotPassword $forgotPassword,
    ): void {
        $uri = '/forgot-password';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($forgotPassword));
        $this->client->send($request);
    }
}
