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
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\AuthenticationOptions;
use Rebilly\Sdk\Model\AuthenticationToken;
use Rebilly\Sdk\Model\AuthenticationTokenResponse;
use Rebilly\Sdk\Model\CustomerCredential;
use Rebilly\Sdk\Model\CustomerJWT;
use Rebilly\Sdk\Model\ResetPasswordToken;
use Rebilly\Sdk\Paginator;

class CustomerAuthenticationApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CustomerCredential
     */
    public function createCredential(
        CustomerCredential $customerCredential,
    ): CustomerCredential {
        $uri = '/credentials';

        $request = new Request('POST', $uri, body: json_encode($customerCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerCredential::from($data);
    }

    /**
     * @return ResetPasswordToken
     */
    public function createResetPasswordToken(
        ResetPasswordToken $resetPasswordToken,
    ): ResetPasswordToken {
        $uri = '/password-tokens';

        $request = new Request('POST', $uri, body: json_encode($resetPasswordToken));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ResetPasswordToken::from($data);
    }

    public function deleteCredential(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credentials/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function deleteResetPasswordToken(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/password-tokens/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return CustomerJWT
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
     * @return Collection<AuthenticationTokenResponse>
     */
    public function getAllAuthTokens(
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/authentication-tokens?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): AuthenticationTokenResponse => AuthenticationTokenResponse::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllAuthTokensPaginator(
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllAuthTokens(
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<CustomerCredential>
     */
    public function getAllCredentials(
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/credentials?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): CustomerCredential => CustomerCredential::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllCredentialsPaginator(
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllCredentials(
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<ResetPasswordToken>
     */
    public function getAllResetPasswordTokens(
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/password-tokens?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): ResetPasswordToken => ResetPasswordToken::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllResetPasswordTokensPaginator(
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllResetPasswordTokens(
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return AuthenticationOptions
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
     * @return CustomerCredential
     */
    public function getCredential(
        string $id,
    ): CustomerCredential {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credentials/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerCredential::from($data);
    }

    /**
     * @return ResetPasswordToken
     */
    public function getResetPasswordToken(
        string $id,
    ): ResetPasswordToken {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/password-tokens/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ResetPasswordToken::from($data);
    }

    /**
     * @return AuthenticationTokenResponse
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
     * @return AuthenticationOptions
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

    /**
     * @return CustomerCredential
     */
    public function updateCredential(
        string $id,
        CustomerCredential $customerCredential,
    ): CustomerCredential {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credentials/{id}');

        $request = new Request('PUT', $uri, body: json_encode($customerCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerCredential::from($data);
    }

    /**
     * @return AuthenticationTokenResponse
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
