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
use Rebilly\Sdk\Model\PostPayoutRequest;
use Rebilly\Sdk\Model\Transaction;

class PayoutsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return Transaction
     */
    public function create(
        PostPayoutRequest $postPayoutRequest,
    ): Transaction {
        $uri = '/payouts';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postPayoutRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Transaction::from($data);
    }
}
