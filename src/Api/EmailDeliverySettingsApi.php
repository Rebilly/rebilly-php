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
use Rebilly\Sdk\Model\EmailDeliverySetting;

class EmailDeliverySettingsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return EmailDeliverySetting
     */
    public function create(
        EmailDeliverySetting $emailDeliverySetting,
    ): EmailDeliverySetting {
        $uri = '/email-delivery-settings';

        $request = new Request('POST', $uri, body: json_encode($emailDeliverySetting));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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
        $data = json_decode((string) $response->getBody(), true);

        return EmailDeliverySetting::from($data);
    }

    /**
     * @return EmailDeliverySetting[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = '/email-delivery-settings' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): EmailDeliverySetting => EmailDeliverySetting::from($item), $data);
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
        $data = json_decode((string) $response->getBody(), true);

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

        $request = new Request('PATCH', $uri, body: json_encode($emailDeliverySetting));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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
        $data = json_decode((string) $response->getBody(), true);

        return EmailDeliverySetting::from($data);
    }
}
