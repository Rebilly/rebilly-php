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
use Rebilly\Sdk\Model\CompositeToken;
use Rebilly\Sdk\Model\CompositeTokenFactory;

class PaymentTokensApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function create(
        CompositeToken $compositeToken,
    ): CompositeToken {
        $uri = '/tokens';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($compositeToken));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CompositeTokenFactory::from($data, ['headers' => $response->getHeaders()]);
    }

    public function get(
        string $token,
    ): CompositeToken {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tokens/{token}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CompositeTokenFactory::from($data, ['headers' => $response->getHeaders()]);
    }
}
