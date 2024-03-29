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
use Rebilly\Sdk\Model\GetPaymentCardsBankNamesResponse;

class PaymentCardsBankNamesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return GetPaymentCardsBankNamesResponse[]
     */
    public function getAll(
        ?int $limit = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'q' => $q,
        ];
        $uri = '/payment-cards-bank-names?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): GetPaymentCardsBankNamesResponse => GetPaymentCardsBankNamesResponse::from($item), $data);
    }
}
