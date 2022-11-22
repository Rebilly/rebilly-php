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
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('entityId', $data)) {
            $this->setEntityId($data['entityId']);
        }
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('headers', $data)) {
            $this->setHeaders($data['headers']);
        }
        if (array_key_exists('responseCode', $data)) {
            $this->setResponseCode($data['responseCode']);
        }
        if (array_key_exists('responseBody', $data)) {
            $this->setResponseBody($data['responseBody']);
        }
        if (array_key_exists('payload', $data)) {
            $this->setPayload($data['payload']);
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
        if (array_key_exists('initiatedTime', $data)) {
            $this->setInitiatedTime($data['initiatedTime']);
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

    public function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getEventType(): ?EventType
    {
        return $this->fields['eventType'] ?? null;
    }

    public function setEventType(null|EventType|string $eventType): self
    {
        if ($eventType !== null && !($eventType instanceof EventType)) {
            $eventType = EventType::from($eventType);
        }

        $this->fields['eventType'] = $eventType;

        return $this;
    }

    public function getEntityId(): ?string
    {
        return $this->fields['entityId'] ?? null;
    }

    public function setEntityId(null|string $entityId): self
    {
        $this->fields['entityId'] = $entityId;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->fields['url'] ?? null;
    }

    public function setUrl(null|string $url): self
    {
        $this->fields['url'] = $url;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->fields['method'] ?? null;
    }

    public function setMethod(null|string $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }

    /**
     * @return null|array<string,string>
     */
    public function getHeaders(): ?array
    {
        return $this->fields['headers'] ?? null;
    }

    /**
     * @param null|array<string,string> $headers
     */
    public function setHeaders(null|array $headers): self
    {
        $this->fields['headers'] = $headers;

        return $this;
    }

    public function getResponseCode(): ?int
    {
        return $this->fields['responseCode'] ?? null;
    }

    public function setResponseCode(null|int $responseCode): self
    {
        $this->fields['responseCode'] = $responseCode;

        return $this;
    }

    public function getResponseBody(): ?string
    {
        return $this->fields['responseBody'] ?? null;
    }

    public function setResponseBody(null|string $responseBody): self
    {
        $this->fields['responseBody'] = $responseBody;

        return $this;
    }

    public function getPayload(): ?string
    {
        return $this->fields['payload'] ?? null;
    }

    public function setPayload(null|string $payload): self
    {
        $this->fields['payload'] = $payload;

        return $this;
    }

    /**
     * @psalm-return self::SOURCE_*|null $source
     */
    public function getSource(): ?string
    {
        return $this->fields['source'] ?? null;
    }

    /**
     * @psalm-param self::SOURCE_*|null $source
     */
    public function setSource(null|string $source): self
    {
        $this->fields['source'] = $source;

        return $this;
    }

    public function getAttempt(): ?int
    {
        return $this->fields['attempt'] ?? null;
    }

    public function setAttempt(null|int $attempt): self
    {
        $this->fields['attempt'] = $attempt;

        return $this;
    }

    public function getSentTime(): ?DateTimeImmutable
    {
        return $this->fields['sentTime'] ?? null;
    }

    public function setSentTime(null|DateTimeImmutable|string $sentTime): self
    {
        if ($sentTime !== null && !($sentTime instanceof DateTimeImmutable)) {
            $sentTime = new DateTimeImmutable($sentTime);
        }

        $this->fields['sentTime'] = $sentTime;

        return $this;
    }

    public function getInitiatedTime(): ?DateTimeImmutable
    {
        return $this->fields['initiatedTime'] ?? null;
    }

    public function setInitiatedTime(null|DateTimeImmutable|string $initiatedTime): self
    {
        if ($initiatedTime !== null && !($initiatedTime instanceof DateTimeImmutable)) {
            $initiatedTime = new DateTimeImmutable($initiatedTime);
        }

        $this->fields['initiatedTime'] = $initiatedTime;

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
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType']?->value;
        }
        if (array_key_exists('entityId', $this->fields)) {
            $data['entityId'] = $this->fields['entityId'];
        }
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('headers', $this->fields)) {
            $data['headers'] = $this->fields['headers'];
        }
        if (array_key_exists('responseCode', $this->fields)) {
            $data['responseCode'] = $this->fields['responseCode'];
        }
        if (array_key_exists('responseBody', $this->fields)) {
            $data['responseBody'] = $this->fields['responseBody'];
        }
        if (array_key_exists('payload', $this->fields)) {
            $data['payload'] = $this->fields['payload'];
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
        if (array_key_exists('initiatedTime', $this->fields)) {
            $data['initiatedTime'] = $this->fields['initiatedTime']?->format(DateTimeInterface::RFC3339);
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

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
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
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
