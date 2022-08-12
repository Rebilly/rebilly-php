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
use Rebilly\Sdk\Model\EmailDeliverySetting;

class EmailDeliverySettingVerificationsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return EmailDeliverySetting
     *
     */
    public function verify(
        string $token,
    ): EmailDeliverySetting {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/email-delivery-setting-verifications/{token}');

        $request = new Request('PUT', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return EmailDeliverySetting::from($data);
    }
}
