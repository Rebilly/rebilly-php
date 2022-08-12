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
use Rebilly\Sdk\Model\CustomerTimelineCustomEvent;

class CustomerTimelineCustomEventsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CustomerTimelineCustomEvent
     */
    public function create(
        CustomerTimelineCustomEvent $customerTimelineCustomEvent,
    ): CustomerTimelineCustomEvent {
        $uri = '/customer-timeline-custom-events';

        $request = new Request('POST', $uri, body: json_encode($customerTimelineCustomEvent));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerTimelineCustomEvent::from($data);
    }

    /**
     * @return CustomerTimelineCustomEvent
     */
    public function get(
        string $id,
    ): CustomerTimelineCustomEvent {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customer-timeline-custom-events/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerTimelineCustomEvent::from($data);
    }

    /**
     * @return CustomerTimelineCustomEvent[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/customer-timeline-custom-events' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CustomerTimelineCustomEvent => CustomerTimelineCustomEvent::from($item), $data);
    }
}
