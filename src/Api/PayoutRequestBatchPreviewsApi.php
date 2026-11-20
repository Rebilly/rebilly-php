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
use Rebilly\Sdk\Model\PostPayoutRequestBatchPreviewRequest;
use Rebilly\Sdk\Model\PostPayoutRequestBatchPreviewResponse;

class PayoutRequestBatchPreviewsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function create(
        PostPayoutRequestBatchPreviewRequest $postPayoutRequestBatchPreviewRequest,
    ): PostPayoutRequestBatchPreviewResponse {
        $uri = '/payout-request-batch-previews';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postPayoutRequestBatchPreviewRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PostPayoutRequestBatchPreviewResponse::from($data, ['headers' => $response->getHeaders()]);
    }
}
