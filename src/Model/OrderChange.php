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

class OrderChange implements JsonSerializable
{
    use HasMetadata;

    public const STATUS_PENDING = 'pending';

    public const STATUS_APPLIED = 'applied';

    public const STATUS_CANCELED = 'canceled';

    public const STATUS_SUPERSEDED = 'superseded';

    public const APPLY_AT_NOW = 'now';

    public const APPLY_AT_NEXT_RENEWAL = 'nextRenewal';

    public const RENEWAL_POLICY_RESET_TO_RECURRING = 'resetToRecurring';

    public const RENEWAL_POLICY_RETAIN_RECURRING = 'retainRecurring';

    public const RENEWAL_POLICY_RETAIN_TRIAL_THEN_RECURRING = 'retainTrialThenRecurring';

    public const RENEWAL_POLICY_RETAIN_TRIAL_ONLY = 'retainTrialOnly';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('orderId', $data)) {
            $this->setOrderId($data['orderId']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('applyAt', $data)) {
            $this->setApplyAt($data['applyAt']);
        }
        if (array_key_exists('effectiveTime', $data)) {
            $this->setEffectiveTime($data['effectiveTime']);
        }
        if (array_key_exists('lockedTime', $data)) {
            $this->setLockedTime($data['lockedTime']);
        }
        if (array_key_exists('appliedTime', $data)) {
            $this->setAppliedTime($data['appliedTime']);
        }
        if (array_key_exists('quoteId', $data)) {
            $this->setQuoteId($data['quoteId']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('renewalPolicy', $data)) {
            $this->setRenewalPolicy($data['renewalPolicy']);
        }
        if (array_key_exists('prorated', $data)) {
            $this->setProrated($data['prorated']);
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

    public function getOrderId(): string
    {
        return $this->fields['orderId'];
    }

    public function setOrderId(string $orderId): static
    {
        $this->fields['orderId'] = $orderId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getApplyAt(): ?string
    {
        return $this->fields['applyAt'] ?? null;
    }

    public function setApplyAt(null|string $applyAt): static
    {
        $this->fields['applyAt'] = $applyAt;

        return $this;
    }

    public function getEffectiveTime(): ?DateTimeImmutable
    {
        return $this->fields['effectiveTime'] ?? null;
    }

    public function setEffectiveTime(null|DateTimeImmutable|string $effectiveTime): static
    {
        if ($effectiveTime !== null && !($effectiveTime instanceof DateTimeImmutable)) {
            $effectiveTime = new DateTimeImmutable($effectiveTime);
        }

        $this->fields['effectiveTime'] = $effectiveTime;

        return $this;
    }

    public function getLockedTime(): ?DateTimeImmutable
    {
        return $this->fields['lockedTime'] ?? null;
    }

    public function getAppliedTime(): ?DateTimeImmutable
    {
        return $this->fields['appliedTime'] ?? null;
    }

    public function getQuoteId(): ?string
    {
        return $this->fields['quoteId'] ?? null;
    }

    /**
     * @return OrderChangeItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|OrderChangeItems[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof OrderChangeItems ? $value : OrderChangeItems::from($value),
            $items,
        );

        $this->fields['items'] = $items;

        return $this;
    }

    public function getRenewalPolicy(): ?string
    {
        return $this->fields['renewalPolicy'] ?? null;
    }

    public function setRenewalPolicy(null|string $renewalPolicy): static
    {
        $this->fields['renewalPolicy'] = $renewalPolicy;

        return $this;
    }

    public function getProrated(): ?bool
    {
        return $this->fields['prorated'] ?? null;
    }

    public function setProrated(null|bool $prorated): static
    {
        $this->fields['prorated'] = $prorated;

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
        if (array_key_exists('orderId', $this->fields)) {
            $data['orderId'] = $this->fields['orderId'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('applyAt', $this->fields)) {
            $data['applyAt'] = $this->fields['applyAt'];
        }
        if (array_key_exists('effectiveTime', $this->fields)) {
            $data['effectiveTime'] = $this->fields['effectiveTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('lockedTime', $this->fields)) {
            $data['lockedTime'] = $this->fields['lockedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('appliedTime', $this->fields)) {
            $data['appliedTime'] = $this->fields['appliedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('quoteId', $this->fields)) {
            $data['quoteId'] = $this->fields['quoteId'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = array_map(
                static fn (OrderChangeItems $orderChangeItems) => $orderChangeItems->jsonSerialize(),
                $this->fields['items'],
            );
        }
        if (array_key_exists('renewalPolicy', $this->fields)) {
            $data['renewalPolicy'] = $this->fields['renewalPolicy'];
        }
        if (array_key_exists('prorated', $this->fields)) {
            $data['prorated'] = $this->fields['prorated'];
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

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setLockedTime(null|DateTimeImmutable|string $lockedTime): static
    {
        if ($lockedTime !== null && !($lockedTime instanceof DateTimeImmutable)) {
            $lockedTime = new DateTimeImmutable($lockedTime);
        }

        $this->fields['lockedTime'] = $lockedTime;

        return $this;
    }

    private function setAppliedTime(null|DateTimeImmutable|string $appliedTime): static
    {
        if ($appliedTime !== null && !($appliedTime instanceof DateTimeImmutable)) {
            $appliedTime = new DateTimeImmutable($appliedTime);
        }

        $this->fields['appliedTime'] = $appliedTime;

        return $this;
    }

    private function setQuoteId(null|string $quoteId): static
    {
        $this->fields['quoteId'] = $quoteId;

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
