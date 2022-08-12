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
use Rebilly\Sdk\Model\CompositeToken;

class TokensApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CompositeToken
     *
     */
    public function create(
        CompositeToken $compositeToken,
    ): CompositeToken {
        $uri = '/tokens';

        $request = new Request('POST', $uri, body: json_encode($compositeToken));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CompositeToken::from($data);
    }

    /**
     * @return CompositeToken
     *
     */
    public function get(
        string $token,
    ): CompositeToken {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tokens/{token}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CompositeToken::from($data);
    }

    /**
     * @return CompositeToken[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/tokens' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CompositeToken => CompositeToken::from($item), $data);
    }
}
