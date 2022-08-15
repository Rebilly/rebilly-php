<?php

declare(strict_types=1);

namespace Rebilly\Sdk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use function \GuzzleHttp\json_encode;
use function \GuzzleHttp\json_decode;
use Rebilly\Sdk\Model\CustomerTimelineCustomEvent;
use Rebilly\Sdk\Model\Forbidden;
use Rebilly\Sdk\Model\Unauthorized;
use Rebilly\Sdk\Model\ValidationError;

class TodoApi
{
    public function __construct(protected readonly ?ClientInterface $client) {}
    /**
 * @return CustomerTimelineCustomEvent
 */
public function create(
    \Rebilly\Sdk\Model\CustomerTimelineCustomEvent $customerTimelineCustomEvent,

): \Rebilly\Sdk\Model\CustomerTimelineCustomEvent

 {

    $uri = '/customer-timeline-custom-events';

    $request = new Request('POST', $uri, body: json_encode($customerTimelineCustomEvent));
    $response = $this->client->send($request);
    $data = json_decode((string) $response->getBody(), true);

    return CustomerTimelineCustomEvent::from($data);
    

}
    /**
 * @return PaymentGatewayMetadata
 */
public function get(
    string $apiName,

): \Rebilly\Sdk\Model\PaymentGatewayMetadata

 {
    $pathParams = [
        '{apiName}
    /**
 * @return PaymentGatewayMetadata[]
 */
public function getAll(
    
): array

 {

    $uri = '/payment-gateways-metadata';

    $request = new Request('GET', $uri);
    $response = $this->client->send($request);
    $data = json_decode((string) $response->getBody(), true);

    return array_map(fn(array $item): PaymentGatewayMetadata => PaymentGatewayMetadata::from($item), $data);
    

}

}

