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
use Rebilly\Sdk\Model\CompositeToken;
use Rebilly\Sdk\Paginator;

class PaymentTokensApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CompositeToken
     */
    public function create(
        CompositeToken $compositeToken,
    ): CompositeToken {
        $uri = '/tokens';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($compositeToken));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CompositeToken::from($data);
    }

    /**
     * @return CompositeToken
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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CompositeToken::from($data);
    }

    /**
     * @return Collection<CompositeToken>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/tokens?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): CompositeToken => CompositeToken::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }
}
