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
use Rebilly\Sdk\Model\GlobalWebhook;
use Rebilly\Sdk\Model\OrderPreview;
use Rebilly\Sdk\Model\SendPreviewWebhook;
use Rebilly\Sdk\Model\SendTestEmail;

class PreviewsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return OrderPreview
     */
    public function order(
        ?OrderPreview $orderPreview = null,
    ): OrderPreview {
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
        SendTestEmail $sendTestEmail,
    ): SendTestEmail {
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
        SendPreviewWebhook $sendPreviewWebhook,
    ): SendPreviewWebhook {
        $uri = '/previews/rule-actions/trigger-webhook';

        $request = new Request('POST', $uri, body: json_encode($sendPreviewWebhook));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SendPreviewWebhook::from($data);
    }

    public function webhook(
        GlobalWebhook $globalWebhook,
    ): void {
        $uri = '/previews/webhooks';

        $request = new Request('POST', $uri, body: json_encode($globalWebhook));
        $this->client->send($request);
    }
}