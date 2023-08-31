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

class AmlCheck implements JsonSerializable
{
    public const SOURCE_SIGN_UP = 'sign-up';

    public const SOURCE_RECURRING = 'recurring';

    public const SOURCE_PURCHASE = 'purchase';

    public const STATUS_PENDING_REVIEW = 'pending-review';

    public const STATUS_NO_MATCH = 'no-match';

    public const STATUS_CONFIRMED_MATCH = 'confirmed-match';

    public const STATUS_FALSE_POSITIVE = 'false-positive';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('reviewerId', $data)) {
            $this->setReviewerId($data['reviewerId']);
        }
        if (array_key_exists('reviewerName', $data)) {
            $this->setReviewerName($data['reviewerName']);
        }
        if (array_key_exists('reviewTime', $data)) {
            $this->setReviewTime($data['reviewTime']);
        }
        if (array_key_exists('priority', $data)) {
            $this->setPriority($data['priority']);
        }
        if (array_key_exists('source', $data)) {
            $this->setSource($data['source']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('hits', $data)) {
            $this->setHits($data['hits']);
        }
        if (array_key_exists('tags', $data)) {
            $this->setTags($data['tags']);
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

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getWebsiteId(): ?string
    {
        return $this->fields['websiteId'] ?? null;
    }

    public function setWebsiteId(null|string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getReviewerId(): ?string
    {
        return $this->fields['reviewerId'] ?? null;
    }

    public function setReviewerId(null|string $reviewerId): static
    {
        $this->fields['reviewerId'] = $reviewerId;

        return $this;
    }

    public function getReviewerName(): ?string
    {
        return $this->fields['reviewerName'] ?? null;
    }

    public function setReviewerName(null|string $reviewerName): static
    {
        $this->fields['reviewerName'] = $reviewerName;

        return $this;
    }

    public function getReviewTime(): ?DateTimeImmutable
    {
        return $this->fields['reviewTime'] ?? null;
    }

    public function setReviewTime(null|DateTimeImmutable|string $reviewTime): static
    {
        if ($reviewTime !== null && !($reviewTime instanceof DateTimeImmutable)) {
            $reviewTime = new DateTimeImmutable($reviewTime);
        }

        $this->fields['reviewTime'] = $reviewTime;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->fields['priority'] ?? null;
    }

    public function setPriority(null|string $priority): static
    {
        $this->fields['priority'] = $priority;

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

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getCustomer(): ?AmlCheckCustomer
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|AmlCheckCustomer|array $customer): static
    {
        if ($customer !== null && !($customer instanceof AmlCheckCustomer)) {
            $customer = AmlCheckCustomer::from($customer);
        }

        $this->fields['customer'] = $customer;

        return $this;
    }

    /**
     * @return null|AML[]
     */
    public function getHits(): ?array
    {
        return $this->fields['hits'] ?? null;
    }

    /**
     * @param null|AML[]|array[] $hits
     */
    public function setHits(null|array $hits): static
    {
        $hits = $hits !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof AML ? $value : AML::from($value)) : null,
            $hits,
        ) : null;

        $this->fields['hits'] = $hits;

        return $this;
    }

    /**
     * @return null|Tag[]
     */
    public function getTags(): ?array
    {
        return $this->fields['tags'] ?? null;
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
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('reviewerId', $this->fields)) {
            $data['reviewerId'] = $this->fields['reviewerId'];
        }
        if (array_key_exists('reviewerName', $this->fields)) {
            $data['reviewerName'] = $this->fields['reviewerName'];
        }
        if (array_key_exists('reviewTime', $this->fields)) {
            $data['reviewTime'] = $this->fields['reviewTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('priority', $this->fields)) {
            $data['priority'] = $this->fields['priority'];
        }
        if (array_key_exists('source', $this->fields)) {
            $data['source'] = $this->fields['source'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }
        if (array_key_exists('hits', $this->fields)) {
            $data['hits'] = $this->fields['hits'];
        }
        if (array_key_exists('tags', $this->fields)) {
            $data['tags'] = $this->fields['tags'];
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

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @param null|array[]|Tag[] $tags
     */
    private function setTags(null|array $tags): static
    {
        $tags = $tags !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof Tag ? $value : Tag::from($value)) : null,
            $tags,
        ) : null;

        $this->fields['tags'] = $tags;

        return $this;
    }
}
