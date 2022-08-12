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
use Rebilly\Sdk\Model\KycSettings;

class KycSettingsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return KycSettings
     *
     */
    public function getKycSettings(
    ): KycSettings {
        $uri = '/kyc-settings';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycSettings::from($data);
    }

    /**
     * @return KycSettings
     *
     */
    public function updateKycSettings(
        KycSettings $kycSettings,
    ): KycSettings {
        $uri = '/kyc-settings';

        $request = new Request('PUT', $uri, body: json_encode($kycSettings));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycSettings::from($data);
    }
}
