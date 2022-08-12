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
use Rebilly\Sdk\Model\RulesEngineTimeline;
use Rebilly\Sdk\Model\RuleSet;
use Rebilly\Sdk\Model\RuleSetDraft;
use Rebilly\Sdk\Model\RuleSetHistoryItem;
use Rebilly\Sdk\Model\RuleSetVersion;
use Rebilly\Sdk\Model\SystemEvent;

class EventsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return RuleSetDraft
     *
     */
    public function createDraftRuleset(
        string $eventType,
        RuleSetDraft $ruleSetDraft,
    ): RuleSetDraft {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules/drafts');

        $request = new Request('POST', $uri, body: json_encode($ruleSetDraft));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RuleSetDraft::from($data);
    }

    /**
     * @return RuleSet
     *
     */
    public function createRules(
        string $eventType,
        RuleSet $ruleSet,
    ): RuleSet {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules');

        $request = new Request('PUT', $uri, body: json_encode($ruleSet));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RuleSet::from($data);
    }

    /**
     * @return RulesEngineTimeline
     *
     */
    public function createTimelineComment(
        string $eventType,
        RulesEngineTimeline $rulesEngineTimeline,
    ): RulesEngineTimeline {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/timeline');

        $request = new Request('POST', $uri, body: json_encode($rulesEngineTimeline));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RulesEngineTimeline::from($data);
    }

    public function deleteDraftRuleset(
        string $eventType,
        string $id,
    ): void {
        $pathParams = [
            '{eventType}' => $eventType,
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules/drafts/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function deleteTimelineMessage(
        string $eventType,
        string $messageId,
    ): void {
        $pathParams = [
            '{eventType}' => $eventType,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return SystemEvent
     *
     */
    public function get(
        string $eventType,
    ): SystemEvent {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SystemEvent::from($data);
    }

    /**
     * @return SystemEvent[]
     *
     */
    public function getAll(
    ): array {
        $uri = '/events';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): SystemEvent => SystemEvent::from($item), $data);
    }

    /**
     * @return RuleSetDraft[]
     *
     */
    public function getAllDraftRulesets(
        string $eventType,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
        ?string $fields = null,
        ?string $expand = null,
    ): array {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'sort' => $sort,
            'fields' => $fields,
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules/drafts') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): RuleSetDraft => RuleSetDraft::from($item), $data);
    }

    /**
     * @return RulesEngineTimeline[]
     *
     */
    public function getAllTimelineMessages(
        string $eventType,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): array {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/timeline') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): RulesEngineTimeline => RulesEngineTimeline::from($item), $data);
    }

    /**
     * @return RuleSetDraft
     *
     */
    public function getDraftRuleset(
        string $eventType,
        string $id,
        ?string $fields = null,
        ?string $expand = null,
    ): RuleSetDraft {
        $pathParams = [
            '{eventType}' => $eventType,
            '{id}' => $id,
        ];

        $queryParams = [
            'fields' => $fields,
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules/drafts/{id}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RuleSetDraft::from($data);
    }

    /**
     * @return RuleSet
     *
     */
    public function getRules(
        string $eventType,
    ): RuleSet {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RuleSet::from($data);
    }

    /**
     * @return RuleSetHistoryItem[]
     *
     */
    public function getRulesHistory(
        string $eventType,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
        ?string $fields = null,
        ?string $expand = null,
    ): array {
        $pathParams = [
            '{eventType}' => $eventType,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'sort' => $sort,
            'fields' => $fields,
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules/history') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): RuleSetHistoryItem => RuleSetHistoryItem::from($item), $data);
    }

    /**
     * @return RuleSetVersion
     *
     */
    public function getRulesVersionDetail(
        string $eventType,
        int $version,
        ?string $fields = null,
        ?string $expand = null,
    ): RuleSetVersion {
        $pathParams = [
            '{eventType}' => $eventType,
            '{version}' => $version,
        ];

        $queryParams = [
            'fields' => $fields,
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules/versions/{version}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RuleSetVersion::from($data);
    }

    /**
     * @return RuleSetHistoryItem
     *
     */
    public function getRulesVersionNumber(
        string $eventType,
        int $version,
        ?string $fields = null,
        ?string $expand = null,
    ): RuleSetHistoryItem {
        $pathParams = [
            '{eventType}' => $eventType,
            '{version}' => $version,
        ];

        $queryParams = [
            'fields' => $fields,
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules/history/{version}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RuleSetHistoryItem::from($data);
    }

    /**
     * @return RulesEngineTimeline
     *
     */
    public function getTimelineMessage(
        string $eventType,
        string $messageId,
    ): RulesEngineTimeline {
        $pathParams = [
            '{eventType}' => $eventType,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RulesEngineTimeline::from($data);
    }

    /**
     * @return RuleSetDraft
     *
     */
    public function updateDraftRuleset(
        string $eventType,
        string $id,
        RuleSetDraft $ruleSetDraft,
    ): RuleSetDraft {
        $pathParams = [
            '{eventType}' => $eventType,
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/events/{eventType}/rules/drafts/{id}');

        $request = new Request('PUT', $uri, body: json_encode($ruleSetDraft));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return RuleSetDraft::from($data);
    }
}
