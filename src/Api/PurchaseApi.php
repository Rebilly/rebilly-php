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
use Rebilly\Sdk\Model\CoreReadyToPay;
use Rebilly\Sdk\Model\ReadyToPayMethods;

class PurchaseApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return ReadyToPayMethods[]
     */
    public function readyToPay(
        ?CoreReadyToPay $coreReadyToPay = null,
    ): array {
        $uri = '/ready-to-pay';

        $request = new Request('POST', $uri, body: json_encode($coreReadyToPay));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): ReadyToPayMethods => ReadyToPayMethods::from($item), $data);
    }
}
