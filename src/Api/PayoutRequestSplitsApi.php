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
use Rebilly\Sdk\Model\PayoutRequest;
use Rebilly\Sdk\Model\PostPayoutRequestSplitRequest;

class PayoutRequestSplitsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return PayoutRequest[]
     */
    public function create(
        PostPayoutRequestSplitRequest $postPayoutRequestSplitRequest,
    ): array {
        $uri = '/payout-request-splits';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postPayoutRequestSplitRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): PayoutRequest => PayoutRequest::from($item, ['headers' => $response->getHeaders()]), $data);
    }
}
