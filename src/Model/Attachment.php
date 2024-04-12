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

class Attachment implements JsonSerializable
{
    public const RELATED_TYPE_CUSTOMER = 'customer';

    public const RELATED_TYPE_CUSTOMER_TIMELINE_COMMENT = 'customer-timeline-comment';

    public const RELATED_TYPE_CUSTOMER_EDD_TIMELINE_COMMENT = 'customer-edd-timeline-comment';

    public const RELATED_TYPE_DISPUTE = 'dispute';

    public const RELATED_TYPE_GATEWAY_TIMELINE_COMMENT = 'gateway-timeline-comment';

    public const RELATED_TYPE_INVOICE = 'invoice';

    public const RELATED_TYPE_INVOICE_TIMELINE_COMMENT = 'invoice-timeline-comment';

    public const RELATED_TYPE_ORDER_TIMELINE_COMMENT = 'order-timeline-comment';

    public const RELATED_TYPE_ORGANIZATION = 'organization';

    public const RELATED_TYPE_PAYMENT = 'payment';

    public const RELATED_TYPE_PLAN = 'plan';

    public const RELATED_TYPE_PRODUCT = 'product';

    public const RELATED_TYPE_SUBSCRIPTION = 'subscription';

    public const RELATED_TYPE_TRANSACTION = 'transaction';

    public const RELATED_TYPE_TRANSACTION_TIMELINE_COMMENT = 'transaction-timeline-comment';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('fileId', $data)) {
            $this->setFileId($data['fileId']);
        }
        if (array_key_exists('relatedType', $data)) {
            $this->setRelatedType($data['relatedType']);
        }
        if (array_key_exists('relatedId', $data)) {
            $this->setRelatedId($data['relatedId']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
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
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
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

    public function getFileId(): string
    {
        return $this->fields['fileId'];
    }

    public function setFileId(string $fileId): static
    {
        $this->fields['fileId'] = $fileId;

        return $this;
    }

    public function getRelatedType(): string
    {
        return $this->fields['relatedType'];
    }

    public function setRelatedType(string $relatedType): static
    {
        $this->fields['relatedType'] = $relatedType;

        return $this;
    }

    public function getRelatedId(): string
    {
        return $this->fields['relatedId'];
    }

    public function setRelatedId(string $relatedId): static
    {
        $this->fields['relatedId'] = $relatedId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

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

    public function getEmbedded(): ?AttachmentEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|AttachmentEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof AttachmentEmbedded)) {
            $embedded = AttachmentEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('fileId', $this->fields)) {
            $data['fileId'] = $this->fields['fileId'];
        }
        if (array_key_exists('relatedType', $this->fields)) {
            $data['relatedType'] = $this->fields['relatedType'];
        }
        if (array_key_exists('relatedId', $this->fields)) {
            $data['relatedId'] = $this->fields['relatedId'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
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
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

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
