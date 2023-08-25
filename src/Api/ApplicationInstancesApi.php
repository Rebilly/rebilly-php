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
use Rebilly\Sdk\Model\ApplicationInstance;
use Rebilly\Sdk\Model\ApplicationInstanceConfiguration;

class ApplicationInstancesApi
{
    public function __construct(protected ?ClientInterface $client)
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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ApplicationInstance::from($data);
    }

    /**
     * @return ApplicationInstanceConfiguration
     */
    public function getConfiguration(
        string $applicationId,
    ): ApplicationInstanceConfiguration {
        $pathParams = [
            '{applicationId}' => $applicationId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/application-instances/{applicationId}/configuration');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ApplicationInstanceConfiguration::from($data);
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

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($applicationInstance));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ApplicationInstance::from($data);
    }

    /**
     * @return ApplicationInstanceConfiguration
     */
    public function upsertConfiguration(
        string $applicationId,
        ?ApplicationInstanceConfiguration $applicationInstanceConfiguration = null,
    ): ApplicationInstanceConfiguration {
        $pathParams = [
            '{applicationId}' => $applicationId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/application-instances/{applicationId}/configuration');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($applicationInstanceConfiguration));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ApplicationInstanceConfiguration::from($data);
    }
}
