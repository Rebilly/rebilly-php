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

class ExternalIdentifier implements JsonSerializable
{
    public const RESOURCE_CUSTOMERS = 'customers';

    public const RESOURCE_INVOICES = 'invoices';

    public const RESOURCE_INVOICE_ITEMS = 'invoice-items';

    public const RESOURCE_TRANSACTIONS = 'transactions';

    public const RESOURCE_JOURNAL_ACCOUNTS = 'journal-accounts';

    public const RESOURCE_JOURNAL_ENTRIES = 'journal-entries';

    public const SERVICE_QUICKBOOKS_ONLINE = 'quickbooks-online';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('resource', $data)) {
            $this->setResource($data['resource']);
        }
        if (array_key_exists('resourceId', $data)) {
            $this->setResourceId($data['resourceId']);
        }
        if (array_key_exists('service', $data)) {
            $this->setService($data['service']);
        }
        if (array_key_exists('externalIdentifier', $data)) {
            $this->setExternalIdentifier($data['externalIdentifier']);
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

    public function getResource(): ?string
    {
        return $this->fields['resource'] ?? null;
    }

    public function getResourceId(): ?string
    {
        return $this->fields['resourceId'] ?? null;
    }

    public function getService(): ?string
    {
        return $this->fields['service'] ?? null;
    }

    public function getExternalIdentifier(): string
    {
        return $this->fields['externalIdentifier'];
    }

    public function setExternalIdentifier(string $externalIdentifier): static
    {
        $this->fields['externalIdentifier'] = $externalIdentifier;

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
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('resource', $this->fields)) {
            $data['resource'] = $this->fields['resource'];
        }
        if (array_key_exists('resourceId', $this->fields)) {
            $data['resourceId'] = $this->fields['resourceId'];
        }
        if (array_key_exists('service', $this->fields)) {
            $data['service'] = $this->fields['service'];
        }
        if (array_key_exists('externalIdentifier', $this->fields)) {
            $data['externalIdentifier'] = $this->fields['externalIdentifier'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setResource(null|string $resource): static
    {
        $this->fields['resource'] = $resource;

        return $this;
    }

    private function setResourceId(null|string $resourceId): static
    {
        $this->fields['resourceId'] = $resourceId;

        return $this;
    }

    private function setService(null|string $service): static
    {
        $this->fields['service'] = $service;

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
