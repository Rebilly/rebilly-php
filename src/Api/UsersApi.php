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
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\ProfileMfa;
use Rebilly\Sdk\Model\ResetPassword;
use Rebilly\Sdk\Model\ResetPasswordTokenInfo;
use Rebilly\Sdk\Model\UpdatePassword;
use Rebilly\Sdk\Model\User;
use Rebilly\Sdk\Paginator;

class UsersApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return User
     */
    public function create(
        User $user,
    ): User {
        $uri = '/users';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($user));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return User::from($data);
    }

    /**
     * @return User
     */
    public function get(
        string $id,
    ): User {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/users/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return User::from($data);
    }

    /**
     * @return Collection<User>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/users?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): User => User::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            sort: $sort,
            filter: $filter,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return ProfileMfa
     */
    public function getMfa(
        string $id,
    ): ProfileMfa {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/users/{id}/mfa');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ProfileMfa::from($data);
    }

    /**
     * @return ResetPasswordTokenInfo
     */
    public function getResetPasswordToken(
        string $token,
    ): ResetPasswordTokenInfo {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/reset-password/{token}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ResetPasswordTokenInfo::from($data);
    }

    /**
     * @return User
     */
    public function resetPassword(
        string $token,
        ResetPassword $resetPassword,
    ): User {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/reset-password/{token}');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($resetPassword));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return User::from($data);
    }

    /**
     * @return User
     */
    public function resetTotp(
        string $id,
    ): User {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/users/{id}/totp-reset');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return User::from($data);
    }

    /**
     * @return User
     */
    public function update(
        string $id,
        User $user,
    ): User {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/users/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($user));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return User::from($data);
    }

    /**
     * @return User
     */
    public function updatePassword(
        string $id,
        UpdatePassword $updatePassword,
    ): User {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/users/{id}/password');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($updatePassword));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return User::from($data);
    }
}
