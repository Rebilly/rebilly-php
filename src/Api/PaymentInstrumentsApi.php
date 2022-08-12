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
use Rebilly\Sdk\Model\AlternativeInstrument;
use Rebilly\Sdk\Model\BankAccountCreatePlain;
use Rebilly\Sdk\Model\BankAccountUpdatePlain;
use Rebilly\Sdk\Model\PaymentCardCreatePlain;
use Rebilly\Sdk\Model\PaymentCardUpdatePlain;
use Rebilly\Sdk\Model\PaymentInstrument;
use Rebilly\Sdk\Model\PaymentInstrumentCreateToken;
use Rebilly\Sdk\Model\PaymentInstrumentUpdateToken;
use Rebilly\Sdk\Model\PayPalAccount;

class PaymentInstrumentsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return PaymentInstrument
     */
    public function create(
        PaymentInstrumentCreateToken|PaymentCardCreatePlain|BankAccountCreatePlain|PayPalAccount|AlternativeInstrument $body,
    ): PaymentInstrument {
        $uri = '/payment-instruments';

        $request = new Request('POST', $uri, body: json_encode($body));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PaymentInstrument::from($data);
    }

    /**
     * @return PaymentInstrument
     */
    public function deactivate(
        string $id,
    ): PaymentInstrument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-instruments/{id}/deactivation');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PaymentInstrument::from($data);
    }

    /**
     * @return PaymentInstrument
     */
    public function get(
        string $id,
    ): PaymentInstrument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-instruments/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PaymentInstrument::from($data);
    }

    /**
     * @return PaymentInstrument[]
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): array {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
            'expand' => $expand,
        ];
        $uri = '/payment-instruments' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): PaymentInstrument => PaymentInstrument::from($item), $data);
    }

    /**
     * @return PaymentInstrument
     */
    public function update(
        string $id,
        PaymentInstrumentUpdateToken|PaymentCardUpdatePlain|BankAccountUpdatePlain $body,
    ): PaymentInstrument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-instruments/{id}');

        $request = new Request('PATCH', $uri, body: json_encode($body));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return PaymentInstrument::from($data);
    }
}
