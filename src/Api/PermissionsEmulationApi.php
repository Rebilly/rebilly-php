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
use Rebilly\Sdk\Model\PostPermissionsEmulationRequest;
use Rebilly\Sdk\Model\Session;

class PermissionsEmulationApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Session
     */
    public function startPermissionsEmulation(
        PostPermissionsEmulationRequest $postPermissionsEmulationRequest,
    ): Session {
        $uri = '/permissions-emulation';

        $request = new Request('POST', $uri, body: json_encode($postPermissionsEmulationRequest));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Session::from($data);
    }

    /**
     * @return Session
     */
    public function stopPermissionsEmulation(
    ): Session {
        $uri = '/permissions-emulation';

        $request = new Request('DELETE', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Session::from($data);
    }
}
