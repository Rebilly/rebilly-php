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

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\AML;

class AmlApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return AML[]
     */
    public function getAll(
        string $firstName,
        string $lastName,
        ?string $dob = null,
        ?string $country = null,
    ): array {
        $queryParams = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'dob' => $dob,
            'country' => $country,
        ];
        $uri = '/aml?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): AML => AML::from($item), $data);
    }
}
