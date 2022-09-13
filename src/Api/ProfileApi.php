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
use Rebilly\Sdk\Model\PostPermissionsEmulationRequest;
use Rebilly\Sdk\Model\Profile;
use Rebilly\Sdk\Model\ProfileMfa;
use Rebilly\Sdk\Model\Session;
use Rebilly\Sdk\Model\UpdatePassword;

class ProfileApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    public function deleteMfa(): void
    {
        $uri = '/profile/mfa';

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Profile
     */
    public function get(): Profile
    {
        $uri = '/profile';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Profile::from($data);
    }

    /**
     * @return ProfileMfa
     */
    public function getMfa(): ProfileMfa
    {
        $uri = '/profile/mfa';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ProfileMfa::from($data);
    }

    /**
     * @return Profile
     */
    public function resetTotp(): Profile
    {
        $uri = '/profile/totp-reset';

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Profile::from($data);
    }

    /**
     * @return Session
     */
    public function startPermissionsEmulation(
        PostPermissionsEmulationRequest $postPermissionsEmulationRequest,
    ): Session {
        $uri = '/permissions-emulation';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postPermissionsEmulationRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Session::from($data);
    }

    /**
     * @return Session
     */
    public function stopPermissionsEmulation(): Session
    {
        $uri = '/permissions-emulation';

        $request = new Request('DELETE', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Session::from($data);
    }

    /**
     * @return Profile
     */
    public function update(
        Profile $profile,
    ): Profile {
        $uri = '/profile';

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($profile));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Profile::from($data);
    }

    /**
     * @return ProfileMfa
     */
    public function updateMfa(): ProfileMfa
    {
        $uri = '/profile/mfa';

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ProfileMfa::from($data);
    }

    /**
     * @return Profile
     */
    public function updatePassword(
        UpdatePassword $updatePassword,
    ): Profile {
        $uri = '/profile/password';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($updatePassword));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Profile::from($data);
    }
}
