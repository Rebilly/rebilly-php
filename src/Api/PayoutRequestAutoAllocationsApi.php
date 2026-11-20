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
use Rebilly\Sdk\Model\PayoutRequestAllocation;
use Rebilly\Sdk\Model\PostPayoutRequestAutoAllocationsRequest;

class PayoutRequestAutoAllocationsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return PayoutRequestAllocation[]
     */
    public function create(
        PostPayoutRequestAutoAllocationsRequest $postPayoutRequestAutoAllocationsRequest,
    ): array {
        $uri = '/payout-request-auto-allocations';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postPayoutRequestAutoAllocationsRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): PayoutRequestAllocation => PayoutRequestAllocation::from($item, ['headers' => $response->getHeaders()]), $data);
    }
}
