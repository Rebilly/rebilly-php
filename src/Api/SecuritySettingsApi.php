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
use Rebilly\Sdk\Model\SecuritySettings;

class SecuritySettingsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function get(): SecuritySettings
    {
        $uri = '/security-settings';

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SecuritySettings::from($data, ['headers' => $response->getHeaders()]);
    }

    public function update(
        SecuritySettings $securitySettings,
    ): SecuritySettings {
        $uri = '/security-settings';

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($securitySettings));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SecuritySettings::from($data, ['headers' => $response->getHeaders()]);
    }
}
