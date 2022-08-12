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
use Rebilly\Sdk\Model\AuthenticationToken;
use Rebilly\Sdk\Model\AuthenticationTokenResponse;
use Rebilly\Sdk\Model\CustomerJWT;

class AuthenticationTokensApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CustomerJWT
     *
     */
    public function exchangeToken(
        string $token,
        CustomerJWT $customerJWT,
    ): CustomerJWT {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/authentication-tokens/{token}/exchange');

        $request = new Request('POST', $uri, body: json_encode($customerJWT));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerJWT::from($data);
    }

    /**
     * @return AuthenticationTokenResponse[]
     *
     */
    public function getAllAuthTokens(
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/authentication-tokens' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): AuthenticationTokenResponse => AuthenticationTokenResponse::from($item), $data);
    }

    /**
     * @return AuthenticationTokenResponse
     *
     */
    public function login(
        AuthenticationToken $authenticationToken,
    ): AuthenticationTokenResponse {
        $uri = '/authentication-tokens';

        $request = new Request('POST', $uri, body: json_encode($authenticationToken));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return AuthenticationTokenResponse::from($data);
    }

    public function logout(
        string $token,
    ): void {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/authentication-tokens/{token}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return AuthenticationTokenResponse
     *
     */
    public function verify(
        string $token,
    ): AuthenticationTokenResponse {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/authentication-tokens/{token}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return AuthenticationTokenResponse::from($data);
    }
}
