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
use Rebilly\Sdk\Model\ResetPasswordToken;

class PasswordTokensApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return ResetPasswordToken
     *
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
     * @return ResetPasswordToken[]
     *
     */
    public function getAllResetPasswordTokens(
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/password-tokens' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): ResetPasswordToken => ResetPasswordToken::from($item), $data);
    }

    /**
     * @return ResetPasswordToken
     *
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
}
