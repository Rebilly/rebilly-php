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
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\PatchPaymentInstrumentRequest;
use Rebilly\Sdk\Model\PaymentInstrument;
use Rebilly\Sdk\Model\PaymentInstrumentFactory;
use Rebilly\Sdk\Model\PostPaymentInstrumentRequest;
use Rebilly\Sdk\Paginator;

class PaymentInstrumentsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return PaymentInstrument
     */
    public function create(
        PostPaymentInstrumentRequest $postPaymentInstrumentRequest,
    ): PaymentInstrument {
        $uri = '/payment-instruments';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postPaymentInstrumentRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PaymentInstrumentFactory::from($data);
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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PaymentInstrumentFactory::from($data);
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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PaymentInstrumentFactory::from($data);
    }

    /**
     * @return Collection<PaymentInstrument>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
            'expand' => $expand,
        ];
        $uri = '/payment-instruments?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): PaymentInstrument => PaymentInstrumentFactory::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
            q: $q,
            expand: $expand,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return PaymentInstrument
     */
    public function update(
        string $id,
        PatchPaymentInstrumentRequest $patchPaymentInstrumentRequest,
    ): PaymentInstrument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-instruments/{id}');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($patchPaymentInstrumentRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PaymentInstrumentFactory::from($data);
    }
}
