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
use Rebilly\Sdk\Trait\HasMetadata;

class PayoutRequestBatch implements JsonSerializable
{
    use HasMetadata;

    public const STATUS_PENDING = 'pending';

    public const STATUS_PROCESSING = 'processing';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_FAILED = 'failed';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('userId', $data)) {
            $this->setUserId($data['userId']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('totalCount', $data)) {
            $this->setTotalCount($data['totalCount']);
        }
        if (array_key_exists('successCount', $data)) {
            $this->setSuccessCount($data['successCount']);
        }
        if (array_key_exists('failureCount', $data)) {
            $this->setFailureCount($data['failureCount']);
        }
        if (array_key_exists('customerCount', $data)) {
            $this->setCustomerCount($data['customerCount']);
        }
        if (array_key_exists('totalAmountByCurrency', $data)) {
            $this->setTotalAmountByCurrency($data['totalAmountByCurrency']);
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
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getUserId(): ?string
    {
        return $this->fields['userId'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getTotalCount(): ?int
    {
        return $this->fields['totalCount'] ?? null;
    }

    public function getSuccessCount(): ?int
    {
        return $this->fields['successCount'] ?? null;
    }

    public function getFailureCount(): ?int
    {
        return $this->fields['failureCount'] ?? null;
    }

    public function getCustomerCount(): ?int
    {
        return $this->fields['customerCount'] ?? null;
    }

    /**
     * @return null|PayoutRequestBatchTotalAmountByCurrency[]
     */
    public function getTotalAmountByCurrency(): ?array
    {
        return $this->fields['totalAmountByCurrency'] ?? null;
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('userId', $this->fields)) {
            $data['userId'] = $this->fields['userId'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('totalCount', $this->fields)) {
            $data['totalCount'] = $this->fields['totalCount'];
        }
        if (array_key_exists('successCount', $this->fields)) {
            $data['successCount'] = $this->fields['successCount'];
        }
        if (array_key_exists('failureCount', $this->fields)) {
            $data['failureCount'] = $this->fields['failureCount'];
        }
        if (array_key_exists('customerCount', $this->fields)) {
            $data['customerCount'] = $this->fields['customerCount'];
        }
        if (array_key_exists('totalAmountByCurrency', $this->fields)) {
            $data['totalAmountByCurrency'] = $this->fields['totalAmountByCurrency'] !== null
                ? array_map(
                    static fn (PayoutRequestBatchTotalAmountByCurrency $payoutRequestBatchTotalAmountByCurrency) => $payoutRequestBatchTotalAmountByCurrency->jsonSerialize(),
                    $this->fields['totalAmountByCurrency'],
                )
                : null;
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

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setUserId(null|string $userId): static
    {
        $this->fields['userId'] = $userId;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setTotalCount(null|int $totalCount): static
    {
        $this->fields['totalCount'] = $totalCount;

        return $this;
    }

    private function setSuccessCount(null|int $successCount): static
    {
        $this->fields['successCount'] = $successCount;

        return $this;
    }

    private function setFailureCount(null|int $failureCount): static
    {
        $this->fields['failureCount'] = $failureCount;

        return $this;
    }

    private function setCustomerCount(null|int $customerCount): static
    {
        $this->fields['customerCount'] = $customerCount;

        return $this;
    }

    /**
     * @param null|array[]|PayoutRequestBatchTotalAmountByCurrency[] $totalAmountByCurrency
     */
    private function setTotalAmountByCurrency(null|array $totalAmountByCurrency): static
    {
        $totalAmountByCurrency = $totalAmountByCurrency !== null ? array_map(
            fn ($value) => $value instanceof PayoutRequestBatchTotalAmountByCurrency ? $value : PayoutRequestBatchTotalAmountByCurrency::from($value),
            $totalAmountByCurrency,
        ) : null;

        $this->fields['totalAmountByCurrency'] = $totalAmountByCurrency;

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
