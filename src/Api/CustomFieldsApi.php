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
use Rebilly\Sdk\Model\CustomField;

class CustomFieldsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CustomField
     */
    public function create(
        string $resource,
        string $name,
        CustomField $customField,
    ): CustomField {
        $pathParams = [
            '{resource}' => $resource,
            '{name}' => $name,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-fields/{resource}/{name}');

        $request = new Request('PUT', $uri, body: json_encode($customField));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomField::from($data);
    }

    /**
     * @return CustomField
     */
    public function get(
        string $resource,
        string $name,
    ): CustomField {
        $pathParams = [
            '{resource}' => $resource,
            '{name}' => $name,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-fields/{resource}/{name}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomField::from($data);
    }

    /**
     * @return CustomField[]
     */
    public function getAll(
        string $resource,
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $pathParams = [
            '{resource}' => $resource,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-fields/{resource}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CustomField => CustomField::from($item), $data);
    }
}
