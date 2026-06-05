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

use DateTimeImmutable;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use Rebilly\Sdk\Model\DashboardTileReport;
use Rebilly\Sdk\Model\PostPermissionsEmulationRequest;
use Rebilly\Sdk\Model\Profile;
use Rebilly\Sdk\Model\ProfileDashboard;
use Rebilly\Sdk\Model\ProfileMfa;
use Rebilly\Sdk\Model\Session;

class ProfileApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function deleteMfa(): void
    {
        $uri = '/profile/mfa';

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function get(): Profile
    {
        $uri = '/profile';

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Profile::from($data, ['headers' => $response->getHeaders()]);
    }

    public function getDashboard(): ProfileDashboard
    {
        $uri = '/profile/dashboard';

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ProfileDashboard::from($data, ['headers' => $response->getHeaders()]);
    }

    public function getDashboardMetricReport(
        string $metric,
        DateTimeImmutable $periodStart,
        DateTimeImmutable $periodEnd,
    ): DashboardTileReport {
        $pathParams = [
            '{metric}' => $metric,
        ];

        $queryParams = [
            'periodStart' => $periodStart->format('Y-m-d\TH:i:s\Z'),
            'periodEnd' => $periodEnd->format('Y-m-d\TH:i:s\Z'),
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/profile/dashboard/metrics/{metric}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DashboardTileReport::from($data, ['headers' => $response->getHeaders()]);
    }

    public function getMfa(): ProfileMfa
    {
        $uri = '/profile/mfa';

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ProfileMfa::from($data, ['headers' => $response->getHeaders()]);
    }

    public function startPermissionsEmulation(
        PostPermissionsEmulationRequest $postPermissionsEmulationRequest,
    ): Session {
        $uri = '/permissions-emulation';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postPermissionsEmulationRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Session::from($data, ['headers' => $response->getHeaders()]);
    }

    public function stopPermissionsEmulation(): Session
    {
        $uri = '/permissions-emulation';

        $request = new Request('DELETE', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Session::from($data, ['headers' => $response->getHeaders()]);
    }

    public function update(
        Profile $profile,
    ): Profile {
        $uri = '/profile';

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($profile));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Profile::from($data, ['headers' => $response->getHeaders()]);
    }

    public function updateDashboard(
        ProfileDashboard $profileDashboard,
    ): ProfileDashboard {
        $uri = '/profile/dashboard';

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($profileDashboard));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ProfileDashboard::from($data, ['headers' => $response->getHeaders()]);
    }

    public function updateMfa(): ProfileMfa
    {
        $uri = '/profile/mfa';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ProfileMfa::from($data, ['headers' => $response->getHeaders()]);
    }
}
