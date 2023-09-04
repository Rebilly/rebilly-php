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
use Rebilly\Sdk\Model\Allowlist;

class AllowlistsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/allowlists/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Allowlist
     */
    public function getAllowlist(
        string $id,
    ): Allowlist {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/allowlists/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Allowlist::from($data);
    }

    /**
     * @return Allowlist[]
     */
    public function getAllowlistCollection(): array
    {
        $uri = '/allowlists';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): Allowlist => Allowlist::from($item), $data);
    }

    /**
     * @return Allowlist
     */
    public function storeAllowlist(
        Allowlist $allowlist,
    ): Allowlist {
        $uri = '/allowlists';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($allowlist));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Allowlist::from($data);
    }
}
