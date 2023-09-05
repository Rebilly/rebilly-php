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
use Rebilly\Sdk\Model\TagUntagRule;
use Rebilly\Sdk\Paginator;

class TagsRulesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return TagUntagRule
     */
    public function createTagsRule(
        TagUntagRule $tagUntagRule,
    ): TagUntagRule {
        $uri = '/tags-rules';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($tagUntagRule));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return TagUntagRule::from($data);
    }

    public function deleteTagsRule(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags-rules/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Collection<TagUntagRule>
     */
    public function getAllTagsRules(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort ? implode(',', $sort) : null,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/tags-rules?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): TagUntagRule => TagUntagRule::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllTagsRulesPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllTagsRules(
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
     * @return TagUntagRule
     */
    public function getTagsRule(
        string $id,
    ): TagUntagRule {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags-rules/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return TagUntagRule::from($data);
    }

    /**
     * @return TagUntagRule
     */
    public function updateTagsRule(
        string $id,
        TagUntagRule $tagUntagRule,
    ): TagUntagRule {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags-rules/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($tagUntagRule));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return TagUntagRule::from($data);
    }
}
