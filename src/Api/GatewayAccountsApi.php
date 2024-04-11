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
use Rebilly\Sdk\Model\GatewayAccount;
use Rebilly\Sdk\Model\GatewayAccountDowntimeSchedule;
use Rebilly\Sdk\Model\GatewayAccountFinancialSettings;
use Rebilly\Sdk\Model\GatewayAccountLimit;
use Rebilly\Sdk\Model\GatewayAccountTimeline;
use Rebilly\Sdk\Paginator;

class GatewayAccountsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function checkCredentials(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/check-credentials');

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }

    public function close(
        string $id,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/close');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    public function create(
        GatewayAccount $gatewayAccount,
    ): GatewayAccount {
        $uri = '/gateway-accounts';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($gatewayAccount));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    public function createDowntimeSchedule(
        string $id,
        GatewayAccountDowntimeSchedule $gatewayAccountDowntimeSchedule,
    ): GatewayAccountDowntimeSchedule {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/downtime-schedules');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($gatewayAccountDowntimeSchedule));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountDowntimeSchedule::from($data);
    }

    public function createTimelineComment(
        string $id,
        GatewayAccountTimeline $gatewayAccountTimeline,
    ): GatewayAccountTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/timeline');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($gatewayAccountTimeline));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountTimeline::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function deleteDowntimeSchedule(
        string $id,
        string $downtimeId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{downtimeId}' => $downtimeId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/downtime-schedules/{downtimeId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function deleteTimelineMessage(
        string $id,
        string $messageId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function deleteVolumeLimit(
        string $id,
        string $limitId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{limitId}' => $limitId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/limits/{limitId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function disable(
        string $id,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/disable');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    public function enable(
        string $id,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/enable');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    public function get(
        string $id,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    /**
     * @return Collection<GatewayAccount>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort ? implode(',', $sort) : null,
            'filter' => $filter,
            'q' => $q,
            'fields' => $fields,
        ];
        $uri = '/gateway-accounts?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): GatewayAccount => GatewayAccount::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<GatewayAccount>
     */
    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            sort: $sort,
            filter: $filter,
            q: $q,
            fields: $fields,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<GatewayAccountDowntimeSchedule>
     */
    public function getAllDowntimeSchedules(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Collection {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/downtime-schedules?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): GatewayAccountDowntimeSchedule => GatewayAccountDowntimeSchedule::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<GatewayAccountDowntimeSchedule>
     */
    public function getAllDowntimeSchedulesPaginator(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllDowntimeSchedules(
            id: $id,
            limit: $limit,
            offset: $offset,
            filter: $filter,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<GatewayAccountTimeline>
     */
    public function getAllTimelineMessages(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): Collection {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
            'q' => $q,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/timeline?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): GatewayAccountTimeline => GatewayAccountTimeline::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<GatewayAccountTimeline>
     */
    public function getAllTimelineMessagesPaginator(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllTimelineMessages(
            id: $id,
            limit: $limit,
            offset: $offset,
            filter: $filter,
            sort: $sort,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return GatewayAccountLimit[]
     */
    public function getAllVolumeLimits(
        string $id,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/limits');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): GatewayAccountLimit => GatewayAccountLimit::from($item), $data);
    }

    public function getDowntimeSchedule(
        string $id,
        string $downtimeId,
    ): GatewayAccountDowntimeSchedule {
        $pathParams = [
            '{id}' => $id,
            '{downtimeId}' => $downtimeId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/downtime-schedules/{downtimeId}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountDowntimeSchedule::from($data);
    }

    public function getFinancialSettings(
        string $id,
    ): GatewayAccountFinancialSettings {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/financial-settings');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountFinancialSettings::from($data);
    }

    public function getTimelineMessage(
        string $id,
        string $messageId,
    ): GatewayAccountTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/timeline/{messageId}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountTimeline::from($data);
    }

    public function getVolumeLimit(
        string $id,
        string $limitId,
    ): GatewayAccountLimit {
        $pathParams = [
            '{id}' => $id,
            '{limitId}' => $limitId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/limits/{limitId}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountLimit::from($data);
    }

    public function setFinancialSettings(
        string $id,
        GatewayAccountFinancialSettings $gatewayAccountFinancialSettings,
    ): GatewayAccountFinancialSettings {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/financial-settings');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($gatewayAccountFinancialSettings));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountFinancialSettings::from($data);
    }

    public function update(
        string $id,
        GatewayAccount $gatewayAccount,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}');

        $request = new Request('PATCH', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($gatewayAccount));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    public function updateDowntimeSchedule(
        string $id,
        string $downtimeId,
        GatewayAccountDowntimeSchedule $gatewayAccountDowntimeSchedule,
    ): GatewayAccountDowntimeSchedule {
        $pathParams = [
            '{id}' => $id,
            '{downtimeId}' => $downtimeId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/downtime-schedules/{downtimeId}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($gatewayAccountDowntimeSchedule));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountDowntimeSchedule::from($data);
    }

    public function updateVolumeLimit(
        string $id,
        string $limitId,
        GatewayAccountLimit $gatewayAccountLimit,
    ): GatewayAccountLimit {
        $pathParams = [
            '{id}' => $id,
            '{limitId}' => $limitId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/limits/{limitId}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($gatewayAccountLimit));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccountLimit::from($data);
    }

    public function upsert(
        string $id,
        GatewayAccount $gatewayAccount,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($gatewayAccount));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }
}
