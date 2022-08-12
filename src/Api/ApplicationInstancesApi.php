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
use Rebilly\Sdk\Model\ApplicationInstance;

class ApplicationInstancesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    public function delete(
        string $applicationId,
    ): void {
        $pathParams = [
            '{applicationId}' => $applicationId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/application-instances/{applicationId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return ApplicationInstance
     */
    public function get(
        string $applicationId,
    ): ApplicationInstance {
        $pathParams = [
            '{applicationId}' => $applicationId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/application-instances/{applicationId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ApplicationInstance::from($data);
    }

    /**
     * @return ApplicationInstance
     */
    public function upsert(
        string $applicationId,
        ?ApplicationInstance $applicationInstance = null,
    ): ApplicationInstance {
        $pathParams = [
            '{applicationId}' => $applicationId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/application-instances/{applicationId}');

        $request = new Request('PUT', $uri, body: json_encode($applicationInstance));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ApplicationInstance::from($data);
    }
}
