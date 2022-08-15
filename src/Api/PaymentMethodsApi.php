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

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\PaymentMethodMetadata;

class PaymentMethodsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return PaymentMethodMetadata
     */
    public function get(
        string $apiName,
    ): PaymentMethodMetadata {
        $pathParams = [
            '{apiName}' => $apiName,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-methods/{apiName}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PaymentMethodMetadata::from($data);
    }

    /**
     * @return PaymentMethodMetadata[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/payment-methods' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): PaymentMethodMetadata => PaymentMethodMetadata::from($item), $data);
    }
}
