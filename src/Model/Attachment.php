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

    public function setFileId(string $fileId): self
    {
        $this->fields['fileId'] = $fileId;

        return $this;
    }

    /**
     * @psalm-return self::RELATED_TYPE_* $relatedType
     */
    public function getRelatedType(): string
    {
        return $this->fields['relatedType'];
    }

    /**
     * @psalm-param self::RELATED_TYPE_* $relatedType
     */
    public function setRelatedType(string $relatedType): self
    {
        $this->fields['relatedType'] = $relatedType;

        return $this;
    }

    public function getRelatedId(): string
    {
        return $this->fields['relatedId'];
    }

    public function setRelatedId(string $relatedId): self
    {
        $this->fields['relatedId'] = $relatedId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): self
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
     * @return null|array<AttachmentResourceLink|FileLink|SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{file:File}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
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
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
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

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|array<AttachmentResourceLink|FileLink|SelfLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{file:File} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        if ($embedded !== null) {
            $embedded['file'] = isset($embedded['file']) ? ($embedded['file'] instanceof File ? $embedded['file'] : File::from($embedded['file'])) : null;
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
