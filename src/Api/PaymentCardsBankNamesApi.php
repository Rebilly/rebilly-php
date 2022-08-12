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

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\InlineResponse200;

class PaymentCardsBankNamesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return InlineResponse200[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'q' => $q,
        ];
        $uri = '/payment-cards-bank-names' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): InlineResponse200 => InlineResponse200::from($item), $data);
    }
}
