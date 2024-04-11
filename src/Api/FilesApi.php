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
use Psr\Http\Message\StreamInterface;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\Attachment;
use Rebilly\Sdk\Model\File;
use Rebilly\Sdk\Model\PostFileRequest;
use Rebilly\Sdk\Paginator;

class FilesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function attach(
        Attachment $attachment,
    ): Attachment {
        $uri = '/attachments';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($attachment));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Attachment::from($data);
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

    public function detach(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/attachments/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/files/{id}/download?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request, ['allow_redirects' => ['refer' => true]]);

        return $response->getBody();
    }

    public function downloadPdf(
        string $id,
        ?string $imageSize = null,
    ): StreamInterface {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'imageSize' => $imageSize,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/files/{id}/download?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/pdf',
        ]);
        $response = $this->client->send($request, ['allow_redirects' => ['refer' => true]]);

        return $response->getBody();
    }

    public function get(
        string $id,
    ): File {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/files/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return File::from($data);
    }

    /**
     * @return Collection<File>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'fields' => $fields,
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = '/files?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): File => File::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<File>
     */
    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            q: $q,
            fields: $fields,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<Attachment>
     */
    public function getAllAttachments(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $expand = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'expand' => $expand,
            'fields' => $fields,
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = '/attachments?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Attachment => Attachment::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<Attachment>
     */
    public function getAllAttachmentsPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $expand = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllAttachments(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            q: $q,
            expand: $expand,
            fields: $fields,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    public function getAttachment(
        string $id,
    ): Attachment {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/attachments/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Attachment::from($data);
    }

    public function update(
        string $id,
        File $file,
    ): File {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/files/{id}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($file));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return File::from($data);
    }

    public function updateAttachment(
        string $id,
        Attachment $attachment,
    ): Attachment {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/attachments/{id}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($attachment));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Attachment::from($data);
    }

    public function upload(
        PostFileRequest $postFileRequest,
    ): File {
        $uri = '/files';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postFileRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return File::from($data);
    }
}
