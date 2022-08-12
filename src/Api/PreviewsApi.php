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
use Rebilly\Sdk\Model\Forbidden;
use Rebilly\Sdk\Model\OrderPreview;
use Rebilly\Sdk\Model\Unauthorized;
use Rebilly\Sdk\Model\ValidationError;

class PreviewsApi
{
    public function __construct(protected readonly ?ClientInterface $client) {}
    /**
 * @return OrderPreview
 */
public function order(
    ?\Rebilly\Sdk\Model\OrderPreview $orderPreview = null,

): \Rebilly\Sdk\Model\OrderPreview

 {

    $uri = '/previews/orders';

    $request = new Request('POST', $uri, body: json_encode($orderPreview));
    $response = $this->client->send($request);
    $data = json_decode((string) $response->getBody(), true);

    return OrderPreview::from($data);
    

}
    /**
 * @return SendTestEmail
 */
public function sendEmailRuleAction(
    \Rebilly\Sdk\Model\SendTestEmail $sendTestEmail,

): \Rebilly\Sdk\Model\SendTestEmail

 {

    $uri = '/previews/rule-actions/send-email';

    $request = new Request('POST', $uri, body: json_encode($sendTestEmail));
    $response = $this->client->send($request);
    $data = json_decode((string) $response->getBody(), true);

    return SendTestEmail::from($data);
    

}
    /**
 * @return SendPreviewWebhook
 */
public function triggerWebhookRuleAction(
    \Rebilly\Sdk\Model\SendPreviewWebhook $sendPreviewWebhook,

): \Rebilly\Sdk\Model\SendPreviewWebhook

 {

    $uri = '/previews/rule-actions/trigger-webhook';

    $request = new Request('POST', $uri, body: json_encode($sendPreviewWebhook));
    $response = $this->client->send($request);
    $data = json_decode((string) $response->getBody(), true);

    return SendPreviewWebhook::from($data);
    

}
    /**

 */
public function webhook(
    \Rebilly\Sdk\Model\GlobalWebhook $globalWebhook,

): void
 {

    $uri = '/previews/webhooks';

    $request = new Request('POST', $uri, body: json_encode($globalWebhook));
    $this->client->send($request);

}


