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
     * @return SendTestEmail
     */
    public function sendEmailRuleAction(
        SendTestEmail $sendTestEmail,
    ): SendTestEmail {
        $uri = '/previews/rule-actions/send-email';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($sendTestEmail));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SendTestEmail::from($data);
    }

    /**
     * @return SendPreviewWebhook
     */
    public function triggerWebhookRuleAction(
        SendPreviewWebhook $sendPreviewWebhook,
    ): SendPreviewWebhook {
        $uri = '/previews/rule-actions/trigger-webhook';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($sendPreviewWebhook));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SendPreviewWebhook::from($data);
    }

    public function webhook(
        GlobalWebhook $globalWebhook,
    ): void {
        $uri = '/previews/webhooks';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($globalWebhook));
        $this->client->send($request);
    }

    /**
     * @return OrderPreview
     */
    public function order(
        ?OrderPreview $orderPreview = null,
    ): OrderPreview {
        $uri = '/previews/orders';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($orderPreview));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderPreview::from($data);
    }
}
