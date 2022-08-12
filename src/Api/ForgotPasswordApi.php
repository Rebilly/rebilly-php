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

use function GuzzleHttp\json_encode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\ForgotPassword;

class ForgotPasswordApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    public function forgotPassword(
        ForgotPassword $forgotPassword,
    ): void {
        $uri = '/forgot-password';

        $request = new Request('POST', $uri, body: json_encode($forgotPassword));
        $this->client->send($request);
    }
}
