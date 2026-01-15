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
use Rebilly\Sdk\Model\GetPayoutRequestV2PaymentInstrumentsResponse;
use Rebilly\Sdk\Model\PayoutRequestV2;

class PayoutRequestsV2Api
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return GetPayoutRequestV2PaymentInstrumentsResponse[]
     */
    public function getPaymentInstrumentsV2(
        string $id,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-requests-v2/{id}/payment-instruments');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): GetPayoutRequestV2PaymentInstrumentsResponse => GetPayoutRequestV2PaymentInstrumentsResponse::from($item), $data);
    }

    public function getV2(
        string $id,
    ): PayoutRequestV2 {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-requests-v2/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestV2::from($data);
    }
}
