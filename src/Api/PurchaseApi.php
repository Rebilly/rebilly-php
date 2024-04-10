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
use Rebilly\Sdk\Model\PostReadyToPay;
use Rebilly\Sdk\Model\ReadyToPayMethods;
use Rebilly\Sdk\Model\ReadyToPayMethodsFactory;

class PurchaseApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return ReadyToPayMethods[]
     */
    public function readyToPay(
        PostReadyToPay $postReadyToPay,
    ): array {
        $uri = '/ready-to-pay';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postReadyToPay));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): ReadyToPayMethods => ReadyToPayMethodsFactory::from($item), $data);
    }
}
