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
use Rebilly\Sdk\Model\FinancialSettings;
use Rebilly\Sdk\Model\GatewayAccount;
use Rebilly\Sdk\Model\GatewayAccountDowntimeSchedule;
use Rebilly\Sdk\Model\GatewayAccountLimit;
use Rebilly\Sdk\Model\GatewayAccountTimeline;

class GatewayAccountsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
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

    /**
     * @return GatewayAccount
     *
     */
    public function close(
        string $id,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/close');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    /**
     * @return GatewayAccount
     *
     */
    public function create(
        GatewayAccount $gatewayAccount,
    ): GatewayAccount {
        $uri = '/gateway-accounts';

        $request = new Request('POST', $uri, body: json_encode($gatewayAccount));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    /**
     * @return GatewayAccountDowntimeSchedule
     *
     */
    public function createDowntimeSchedule(
        string $id,
        GatewayAccountDowntimeSchedule $gatewayAccountDowntimeSchedule,
    ): GatewayAccountDowntimeSchedule {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/downtime-schedules');

        $request = new Request('POST', $uri, body: json_encode($gatewayAccountDowntimeSchedule));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccountDowntimeSchedule::from($data);
    }

    /**
     * @return GatewayAccountTimeline
     *
     */
    public function createTimelineComment(
        string $id,
        GatewayAccountTimeline $gatewayAccountTimeline,
    ): GatewayAccountTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/timeline');

        $request = new Request('POST', $uri, body: json_encode($gatewayAccountTimeline));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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

    /**
     * @return GatewayAccount
     *
     */
    public function disable(
        string $id,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/disable');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    /**
     * @return GatewayAccount
     *
     */
    public function enable(
        string $id,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/enable');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    /**
     * @return GatewayAccount
     *
     */
    public function get(
        string $id,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    /**
     * @return GatewayAccount[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
            'fields' => $fields,
        ];
        $uri = '/gateway-accounts' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): GatewayAccount => GatewayAccount::from($item), $data);
    }

    /**
     * @return GatewayAccountDowntimeSchedule[]
     *
     */
    public function getAllDowntimeSchedules(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/downtime-schedules') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): GatewayAccountDowntimeSchedule => GatewayAccountDowntimeSchedule::from($item), $data);
    }

    /**
     * @return GatewayAccountTimeline[]
     *
     */
    public function getAllTimelineMessages(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/timeline') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): GatewayAccountTimeline => GatewayAccountTimeline::from($item), $data);
    }

    /**
     * @return GatewayAccountLimit[]
     *
     */
    public function getAllVolumeLimits(
        string $id,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/limits');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): GatewayAccountLimit => GatewayAccountLimit::from($item), $data);
    }

    /**
     * @return GatewayAccountDowntimeSchedule
     *
     */
    public function getDowntimeSchedule(
        string $id,
        string $downtimeId,
    ): GatewayAccountDowntimeSchedule {
        $pathParams = [
            '{id}' => $id,
            '{downtimeId}' => $downtimeId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/downtime-schedules/{downtimeId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccountDowntimeSchedule::from($data);
    }

    /**
     * @return FinancialSettings
     *
     */
    public function getFinancialSettings(
        string $id,
    ): FinancialSettings {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/financial-settings');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return FinancialSettings::from($data);
    }

    /**
     * @return GatewayAccountTimeline
     *
     */
    public function getTimelineMessage(
        string $id,
        string $messageId,
    ): GatewayAccountTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccountTimeline::from($data);
    }

    /**
     * @return GatewayAccountLimit
     *
     */
    public function getVolumeLimit(
        string $id,
        string $limitId,
    ): GatewayAccountLimit {
        $pathParams = [
            '{id}' => $id,
            '{limitId}' => $limitId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/limits/{limitId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccountLimit::from($data);
    }

    /**
     * @return FinancialSettings
     *
     */
    public function setFinancialSettings(
        string $id,
        ?FinancialSettings $financialSettings = null,
    ): FinancialSettings {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/financial-settings');

        $request = new Request('PUT', $uri, body: json_encode($financialSettings));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return FinancialSettings::from($data);
    }

    /**
     * @return GatewayAccount
     *
     */
    public function update(
        string $id,
        GatewayAccount $gatewayAccount,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}');

        $request = new Request('PUT', $uri, body: json_encode($gatewayAccount));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }

    /**
     * @return GatewayAccountDowntimeSchedule
     *
     */
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

        $request = new Request('PUT', $uri, body: json_encode($gatewayAccountDowntimeSchedule));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccountDowntimeSchedule::from($data);
    }

    /**
     * @return GatewayAccountLimit
     *
     */
    public function updateVolumeLimit(
        string $id,
        string $limitId,
        ?GatewayAccountLimit $gatewayAccountLimit = null,
    ): GatewayAccountLimit {
        $pathParams = [
            '{id}' => $id,
            '{limitId}' => $limitId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}/limits/{limitId}');

        $request = new Request('PUT', $uri, body: json_encode($gatewayAccountLimit));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccountLimit::from($data);
    }

    /**
     * @return GatewayAccount
     *
     */
    public function update_0(
        string $id,
        GatewayAccount $gatewayAccount,
    ): GatewayAccount {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/gateway-accounts/{id}');

        $request = new Request('PATCH', $uri, body: json_encode($gatewayAccount));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GatewayAccount::from($data);
    }
}
