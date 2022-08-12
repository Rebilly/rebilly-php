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
use Rebilly\Sdk\Model\PayoutRequest;
use Rebilly\Sdk\Model\Transaction;

class PayoutsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Transaction
     *
     */
    public function create(
        PayoutRequest $payoutRequest,
    ): Transaction {
        $uri = '/payouts';

        $request = new Request('POST', $uri, body: json_encode($payoutRequest));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Transaction::from($data);
    }
}
