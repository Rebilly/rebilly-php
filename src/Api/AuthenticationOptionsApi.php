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

use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\AuthenticationOptions;

class AuthenticationOptionsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return AuthenticationOptions
     *
     */
    public function getAuthOptions(
    ): AuthenticationOptions {
        $uri = '/authentication-options';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return AuthenticationOptions::from($data);
    }

    /**
     * @return AuthenticationOptions
     *
     */
    public function updateAuthOptions(
        AuthenticationOptions $authenticationOptions,
    ): AuthenticationOptions {
        $uri = '/authentication-options';

        $request = new Request('PUT', $uri, body: json_encode($authenticationOptions));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return AuthenticationOptions::from($data);
    }
}
