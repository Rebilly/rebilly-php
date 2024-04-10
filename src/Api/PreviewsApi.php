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
use Rebilly\Sdk\Model\RulesEmailNotification;

class PreviewsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return OrderPreview
     */
    public function order(
        OrderPreview $orderPreview,
    ): OrderPreview {
        $uri = '/previews/orders';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($orderPreview));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderPreview::from($data);
    }

    /**
     * @return RulesEmailNotification
     */
    public function sendEmailRuleAction(
        RulesEmailNotification $rulesEmailNotification,
    ): RulesEmailNotification {
        $uri = '/previews/rule-actions/send-email';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($rulesEmailNotification));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RulesEmailNotification::from($data);
    }

    public function webhook(
        GlobalWebhook $globalWebhook,
    ): void {
        $uri = '/previews/webhooks';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($globalWebhook));
        $this->client->send($request);
    }
}
