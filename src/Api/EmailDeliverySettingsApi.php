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
use Rebilly\Sdk\Model\EmailDeliverySetting;
use Rebilly\Sdk\Paginator;

class EmailDeliverySettingsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return EmailDeliverySetting
     */
    public function create(
        EmailDeliverySetting $emailDeliverySetting,
    ): EmailDeliverySetting {
        $uri = '/email-delivery-settings';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($emailDeliverySetting));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return EmailDeliverySetting::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/email-delivery-settings/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return EmailDeliverySetting
     */
    public function get(
        string $id,
    ): EmailDeliverySetting {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/email-delivery-settings/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return EmailDeliverySetting::from($data);
    }

    /**
     * @return Collection<EmailDeliverySetting>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
            'q' => $q,
        ];
        $uri = '/email-delivery-settings?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): EmailDeliverySetting => EmailDeliverySetting::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
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
     * @return EmailDeliverySetting
     */
    public function resendVerification(
        string $id,
    ): EmailDeliverySetting {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/email-delivery-settings/{id}/resend-email-verification');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return EmailDeliverySetting::from($data);
    }

    /**
     * @return EmailDeliverySetting
     */
    public function update(
        string $id,
        EmailDeliverySetting $emailDeliverySetting,
    ): EmailDeliverySetting {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/email-delivery-settings/{id}');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($emailDeliverySetting));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return EmailDeliverySetting::from($data);
    }

    /**
     * @return EmailDeliverySetting
     */
    public function verify(
        string $token,
    ): EmailDeliverySetting {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/email-delivery-setting-verifications/{token}');

        $request = new Request('PUT', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return EmailDeliverySetting::from($data);
    }
}
