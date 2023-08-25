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
use Rebilly\Sdk\Model\ExternalServiceSettings;

class ExternalServicesSettingsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return ExternalServiceSettings
     */
    public function getExternalServiceSettings(): ExternalServiceSettings
    {
        $uri = '/external-services-settings';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ExternalServiceSettings::from($data);
    }

    /**
     * @return ExternalServiceSettings
     */
    public function updateExternalServiceSettings(
        ExternalServiceSettings $externalServiceSettings,
    ): ExternalServiceSettings {
        $uri = '/external-services-settings';

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($externalServiceSettings));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ExternalServiceSettings::from($data);
    }
}
