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
use Rebilly\Sdk\Model\ProfileMfa;
use Rebilly\Sdk\Model\UpdatePassword;
use Rebilly\Sdk\Model\User;

class UsersApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return User
     */
    public function create(
        User $user,
    ): User {
        $uri = '/users';

        $request = new Request('POST', $uri, body: json_encode($user));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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
        $data = json_decode((string) $response->getBody(), true);

        return User::from($data);
    }

    /**
     * @return User[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/users' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): User => User::from($item), $data);
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
        $data = json_decode((string) $response->getBody(), true);

        return ProfileMfa::from($data);
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
        $data = json_decode((string) $response->getBody(), true);

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

        $request = new Request('PUT', $uri, body: json_encode($user));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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

        $request = new Request('POST', $uri, body: json_encode($updatePassword));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return User::from($data);
    }
}
