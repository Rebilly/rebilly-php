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
use Psr\Http\Message\StreamInterface;
use Rebilly\Sdk\Model\File;
use Rebilly\Sdk\Model\FileCreateFromInline;
use Rebilly\Sdk\Model\FileCreateFromUrl;

class FilesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/files/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     *
     * @return StreamInterface
     */
    public function download(
        string $id,
        ?string $imageSize = null,
    ): StreamInterface {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'imageSize' => $imageSize,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/files/{id}/download') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request, ['allow_redirects' => ['refer' => true]]);

        return $response->getBody();
    }

    /**
     * @return File
     *
     */
    public function get(
        string $id,
    ): File {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/files/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return File::from($data);
    }

    /**
     * @return File[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $expand = null,
        ?string $fields = null,
        ?array $sort = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'expand' => $expand,
            'fields' => $fields,
            'sort' => $sort,
        ];
        $uri = '/files' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): File => File::from($item), $data);
    }

    /**
     * @return File
     *
     */
    public function update(
        string $id,
        File $file,
    ): File {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/files/{id}');

        $request = new Request('PUT', $uri, body: json_encode($file));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return File::from($data);
    }

    /**
     * @return File
     *
     */
    public function upload(
        FileCreateFromInline|FileCreateFromUrl $body,
    ): File {
        $uri = '/files';

        $request = new Request('POST', $uri, body: json_encode($body));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return File::from($data);
    }
}
