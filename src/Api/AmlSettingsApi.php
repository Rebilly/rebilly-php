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
use Rebilly\Sdk\Model\AmlSettings;

class AmlSettingsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return AmlSettings
     */
    public function getAmlSettings(): AmlSettings
    {
        $uri = '/aml-settings';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return AmlSettings::from($data);
    }

    /**
     * @return AmlSettings
     */
    public function putAmlSettings(
        AmlSettings $amlSettings,
    ): AmlSettings {
        $uri = '/aml-settings';

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($amlSettings));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return AmlSettings::from($data);
    }
}
