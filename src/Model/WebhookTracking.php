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

class WebhookTracking implements JsonSerializable
{
    public const SOURCE_WEBHOOKS = 'webhooks';

    public const SOURCE_RULES = 'rules';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('duration', $data)) {
            $this->setDuration($data['duration']);
        }
        if (array_key_exists('initiatedTime', $data)) {
            $this->setInitiatedTime($data['initiatedTime']);
        }
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
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
        if (array_key_exists('entityId', $data)) {
            $this->setEntityId($data['entityId']);
        }
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('source', $data)) {
            $this->setSource($data['source']);
        }
        if (array_key_exists('attempt', $data)) {
            $this->setAttempt($data['attempt']);
        }
        if (array_key_exists('sentTime', $data)) {
            $this->setSentTime($data['sentTime']);
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

    public function getDuration(): ?int
    {
        return $this->fields['duration'] ?? null;
    }

    public function setDuration(null|int $duration): static
    {
        $this->fields['duration'] = $duration;

        return $this;
    }

    public function getInitiatedTime(): ?DateTimeImmutable
    {
        return $this->fields['initiatedTime'] ?? null;
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

    public function getMethod(): ?string
    {
        return $this->fields['method'] ?? null;
    }

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

    public function getEntityId(): ?string
    {
        return $this->fields['entityId'] ?? null;
    }

    public function setEntityId(null|string $entityId): static
    {
        $this->fields['entityId'] = $entityId;

        return $this;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
    }

    public function setOrganizationId(null|string $organizationId): static
    {
        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    public function getEventType(): ?string
    {
        return $this->fields['eventType'] ?? null;
    }

    public function setEventType(null|string $eventType): static
    {
        $this->fields['eventType'] = $eventType;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->fields['source'] ?? null;
    }

    public function setSource(null|string $source): static
    {
        $this->fields['source'] = $source;

        return $this;
    }

    public function getAttempt(): ?int
    {
        return $this->fields['attempt'] ?? null;
    }

    public function setAttempt(null|int $attempt): static
    {
        $this->fields['attempt'] = $attempt;

        return $this;
    }

    public function getSentTime(): ?DateTimeImmutable
    {
        return $this->fields['sentTime'] ?? null;
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
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static
    {
        $this->fields['_links'] = $links;

        return $this;
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
        if (array_key_exists('duration', $this->fields)) {
            $data['duration'] = $this->fields['duration'];
        }
        if (array_key_exists('initiatedTime', $this->fields)) {
            $data['initiatedTime'] = $this->fields['initiatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
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
        if (array_key_exists('entityId', $this->fields)) {
            $data['entityId'] = $this->fields['entityId'];
        }
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType'];
        }
        if (array_key_exists('source', $this->fields)) {
            $data['source'] = $this->fields['source'];
        }
        if (array_key_exists('attempt', $this->fields)) {
            $data['attempt'] = $this->fields['attempt'];
        }
        if (array_key_exists('sentTime', $this->fields)) {
            $data['sentTime'] = $this->fields['sentTime']?->format(DateTimeInterface::RFC3339);
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

    private function setInitiatedTime(null|DateTimeImmutable|string $initiatedTime): static
    {
        if ($initiatedTime !== null && !($initiatedTime instanceof DateTimeImmutable)) {
            $initiatedTime = new DateTimeImmutable($initiatedTime);
        }

        $this->fields['initiatedTime'] = $initiatedTime;

        return $this;
    }

    private function setSentTime(null|DateTimeImmutable|string $sentTime): static
    {
        if ($sentTime !== null && !($sentTime instanceof DateTimeImmutable)) {
            $sentTime = new DateTimeImmutable($sentTime);
        }

        $this->fields['sentTime'] = $sentTime;

        return $this;
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
}
