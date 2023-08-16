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

namespace Rebilly\Sdk\Model;

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class ApiTracking implements JsonSerializable
{
    public const METHOD_HEAD = 'HEAD';

    public const METHOD_GET = 'GET';

    public const METHOD_POST = 'POST';

    public const METHOD_PUT = 'PUT';

    public const METHOD_DELETE = 'DELETE';

    public const METHOD_PATCH = 'PATCH';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
        }
        if (array_key_exists('route', $data)) {
            $this->setRoute($data['route']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('request', $data)) {
            $this->setRequest($data['request']);
        }
        if (array_key_exists('response', $data)) {
            $this->setResponse($data['response']);
        }
        if (array_key_exists('requestHeaders', $data)) {
            $this->setRequestHeaders($data['requestHeaders']);
        }
        if (array_key_exists('responseHeaders', $data)) {
            $this->setResponseHeaders($data['responseHeaders']);
        }
        if (array_key_exists('user', $data)) {
            $this->setUser($data['user']);
        }
        if (array_key_exists('ipAddress', $data)) {
            $this->setIpAddress($data['ipAddress']);
        }
        if (array_key_exists('relatedIds', $data)) {
            $this->setRelatedIds($data['relatedIds']);
        }
        if (array_key_exists('duration', $data)) {
            $this->setDuration($data['duration']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|int $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->fields['url'] ?? null;
    }

    public function setUrl(null|string $url): static
    {
        $this->fields['url'] = $url;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->fields['route'] ?? null;
    }

    public function setRoute(null|string $route): static
    {
        $this->fields['route'] = $route;

        return $this;
    }

    /**
     * @psalm-return self::METHOD_*|null $method
     */
    public function getMethod(): ?string
    {
        return $this->fields['method'] ?? null;
    }

    /**
     * @psalm-param self::METHOD_*|null $method
     */
    public function setMethod(null|string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getRequest(): ?string
    {
        return $this->fields['request'] ?? null;
    }

    public function setRequest(null|string $request): static
    {
        $this->fields['request'] = $request;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->fields['response'] ?? null;
    }

    public function setResponse(null|string $response): static
    {
        $this->fields['response'] = $response;

        return $this;
    }

    public function getRequestHeaders(): ?array
    {
        return $this->fields['requestHeaders'] ?? null;
    }

    public function setRequestHeaders(null|array $requestHeaders): static
    {
        $this->fields['requestHeaders'] = $requestHeaders;

        return $this;
    }

    public function getResponseHeaders(): ?array
    {
        return $this->fields['responseHeaders'] ?? null;
    }

    public function setResponseHeaders(null|array $responseHeaders): static
    {
        $this->fields['responseHeaders'] = $responseHeaders;

        return $this;
    }

    public function getUser(): ?ApiTrackingUser
    {
        return $this->fields['user'] ?? null;
    }

    public function setUser(null|ApiTrackingUser|array $user): static
    {
        if ($user !== null && !($user instanceof ApiTrackingUser)) {
            $user = ApiTrackingUser::from($user);
        }

        $this->fields['user'] = $user;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->fields['ipAddress'] ?? null;
    }

    public function setIpAddress(null|string $ipAddress): static
    {
        $this->fields['ipAddress'] = $ipAddress;

        return $this;
    }

    public function getRelatedIds(): ?ApiTrackingRelatedIds
    {
        return $this->fields['relatedIds'] ?? null;
    }

    public function setRelatedIds(null|ApiTrackingRelatedIds|array $relatedIds): static
    {
        if ($relatedIds !== null && !($relatedIds instanceof ApiTrackingRelatedIds)) {
            $relatedIds = ApiTrackingRelatedIds::from($relatedIds);
        }

        $this->fields['relatedIds'] = $relatedIds;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->fields['duration'] ?? null;
    }

    public function setDuration(null|int $duration): static
    {
        $this->fields['duration'] = $duration;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }
        if (array_key_exists('route', $this->fields)) {
            $data['route'] = $this->fields['route'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('request', $this->fields)) {
            $data['request'] = $this->fields['request'];
        }
        if (array_key_exists('response', $this->fields)) {
            $data['response'] = $this->fields['response'];
        }
        if (array_key_exists('requestHeaders', $this->fields)) {
            $data['requestHeaders'] = $this->fields['requestHeaders'];
        }
        if (array_key_exists('responseHeaders', $this->fields)) {
            $data['responseHeaders'] = $this->fields['responseHeaders'];
        }
        if (array_key_exists('user', $this->fields)) {
            $data['user'] = $this->fields['user']?->jsonSerialize();
        }
        if (array_key_exists('ipAddress', $this->fields)) {
            $data['ipAddress'] = $this->fields['ipAddress'];
        }
        if (array_key_exists('relatedIds', $this->fields)) {
            $data['relatedIds'] = $this->fields['relatedIds']?->jsonSerialize();
        }
        if (array_key_exists('duration', $this->fields)) {
            $data['duration'] = $this->fields['duration'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
