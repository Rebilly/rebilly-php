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
use Rebilly\Sdk\Model\PatchPayoutRequestAllocationRequest;
use Rebilly\Sdk\Model\PayoutRequestAllocation;
use Rebilly\Sdk\Model\PostPayoutRequestAllocationRequest;
use Rebilly\Sdk\Model\PostPayoutRequestAutoAllocationRequest;

class PayoutRequestAllocationsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function autoAllocate(
        PostPayoutRequestAutoAllocationRequest $postPayoutRequestAutoAllocationRequest,
    ): void {
        $uri = '/payout-request-allocations/auto';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postPayoutRequestAutoAllocationRequest));
        $this->client->send($request);
    }

    public function create(
        PostPayoutRequestAllocationRequest $postPayoutRequestAllocationRequest,
    ): PayoutRequestAllocation {
        $uri = '/payout-request-allocations';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postPayoutRequestAllocationRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestAllocation::from($data);
    }

    public function update(
        string $id,
        PatchPayoutRequestAllocationRequest $patchPayoutRequestAllocationRequest,
    ): PayoutRequestAllocation {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-request-allocations/{id}');

        $request = new Request('PATCH', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($patchPayoutRequestAllocationRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestAllocation::from($data);
    }
}
