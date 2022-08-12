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
use Rebilly\Sdk\Model\PaymentGatewayMetadata;

class PaymentGatewaysMetadataApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return PaymentGatewayMetadata
     */
    public function get(
        string $apiName,
    ): PaymentGatewayMetadata {
        $pathParams = [
            '{apiName}' => $apiName,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-gateways-metadata/{apiName}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PaymentGatewayMetadata::from($data);
    }

    /**
     * @return PaymentGatewayMetadata[]
     */
    public function getAll(
    ): array {
        $uri = '/payment-gateways-metadata';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): PaymentGatewayMetadata => PaymentGatewayMetadata::from($item), $data);
    }
}
