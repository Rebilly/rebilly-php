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

class TaxTracking implements JsonSerializable
{
    public const TAX_SERVICE_TAXJAR = 'taxjar';

    public const TAX_SERVICE_AVALARA = 'avalara';

    public const TAX_SERVICE_CREDENTIAL_SOURCE_DEFAULT = 'default';

    public const TAX_SERVICE_CREDENTIAL_SOURCE_MERCHANT = 'merchant';

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
        if (array_key_exists('taxService', $data)) {
            $this->setTaxService($data['taxService']);
        }
        if (array_key_exists('taxServiceCredentialSource', $data)) {
            $this->setTaxServiceCredentialSource($data['taxServiceCredentialSource']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
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

    /**
     * @return null|array<string,string>
     */
    public function getRequestHeaders(): ?array
    {
        return $this->fields['requestHeaders'] ?? null;
    }

    /**
     * @param null|array<string,string> $requestHeaders
     */
    public function setRequestHeaders(null|array $requestHeaders): static
    {
        $this->fields['requestHeaders'] = $requestHeaders;

        return $this;
    }

    /**
     * @return null|array<string,string>
     */
    public function getResponseHeaders(): ?array
    {
        return $this->fields['responseHeaders'] ?? null;
    }

    /**
     * @param null|array<string,string> $responseHeaders
     */
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

    public function getTaxService(): ?string
    {
        return $this->fields['taxService'] ?? null;
    }

    public function setTaxService(null|string $taxService): static
    {
        $this->fields['taxService'] = $taxService;

        return $this;
    }

    public function getTaxServiceCredentialSource(): ?string
    {
        return $this->fields['taxServiceCredentialSource'] ?? null;
    }

    public function setTaxServiceCredentialSource(null|string $taxServiceCredentialSource): static
    {
        $this->fields['taxServiceCredentialSource'] = $taxServiceCredentialSource;

        return $this;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
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
        if (array_key_exists('taxService', $this->fields)) {
            $data['taxService'] = $this->fields['taxService'];
        }
        if (array_key_exists('taxServiceCredentialSource', $this->fields)) {
            $data['taxServiceCredentialSource'] = $this->fields['taxServiceCredentialSource'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
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

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
