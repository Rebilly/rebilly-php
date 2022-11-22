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

class GlobalWebhook implements JsonSerializable
{
    public const METHOD_GET = 'GET';

    public const METHOD_POST = 'POST';

    public const METHOD_PUT = 'PUT';

    public const METHOD_PATCH = 'PATCH';

    public const METHOD_DELETE = 'DELETE';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('eventsFilter', $data)) {
            $this->setEventsFilter($data['eventsFilter']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
        }
        if (array_key_exists('headers', $data)) {
            $this->setHeaders($data['headers']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
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

    /**
     * @return null|GlobalWebhookEventType[]
     */
    public function getEventsFilter(): ?array
    {
        return $this->fields['eventsFilter'] ?? null;
    }

    /**
     * @param null|GlobalWebhookEventType[] $eventsFilter
     */
    public function setEventsFilter(null|array $eventsFilter): self
    {
        $eventsFilter = $eventsFilter !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof GlobalWebhookEventType ? $value : GlobalWebhookEventType::from($value)) : null, $eventsFilter) : null;

        $this->fields['eventsFilter'] = $eventsFilter;

        return $this;
    }

    public function getStatus(): ?OnOff
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|OnOff|string $status): self
    {
        if ($status !== null && !($status instanceof OnOff)) {
            $status = OnOff::from($status);
        }

        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    public function setMethod(string $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->fields['url'];
    }

    public function setUrl(string $url): self
    {
        $this->fields['url'] = $url;

        return $this;
    }

    /**
     * @return null|WebhookHeader[]
     */
    public function getHeaders(): ?array
    {
        return $this->fields['headers'] ?? null;
    }

    /**
     * @param null|WebhookHeader[] $headers
     */
    public function setHeaders(null|array $headers): self
    {
        $headers = $headers !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof WebhookHeader ? $value : WebhookHeader::from($value)) : null, $headers) : null;

        $this->fields['headers'] = $headers;

        return $this;
    }

    public function getCredentialHash(): string
    {
        return $this->fields['credentialHash'];
    }

    public function setCredentialHash(string $credentialHash): self
    {
        $this->fields['credentialHash'] = $credentialHash;

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

    public function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
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
        if (array_key_exists('eventsFilter', $this->fields)) {
            $data['eventsFilter'] = $this->fields['eventsFilter'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status']?->value;
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }
        if (array_key_exists('headers', $this->fields)) {
            $data['headers'] = $this->fields['headers'];
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
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

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

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
