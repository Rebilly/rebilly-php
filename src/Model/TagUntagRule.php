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

class TagUntagRule implements JsonSerializable
{
    public const EVENT_TYPE_AML_LIST_POSSIBLY_MATCHED = 'aml-list-possibly-matched';

    public const EVENT_TYPE_COUPON_APPLICATION_REMOVED = 'coupon-application-removed';

    public const EVENT_TYPE_COUPON_APPLIED = 'coupon-applied';

    public const EVENT_TYPE_COUPON_EXPIRATION_MODIFIED = 'coupon-expiration-modified';

    public const EVENT_TYPE_COUPON_EXPIRED = 'coupon-expired';

    public const EVENT_TYPE_COUPON_ISSUED = 'coupon-issued';

    public const EVENT_TYPE_COUPON_MODIFIED = 'coupon-modified';

    public const EVENT_TYPE_COUPON_REDEEMED = 'coupon-redeemed';

    public const EVENT_TYPE_COUPON_REDEMPTION_CANCELED = 'coupon-redemption-canceled';

    public const EVENT_TYPE_CUSTOMER_CREATED = 'customer-created';

    public const EVENT_TYPE_CUSTOMER_MERGED = 'customer-merged';

    public const EVENT_TYPE_CUSTOMER_ONE_TIME_PASSWORD_REQUESTED = 'customer-one-time-password-requested';

    public const EVENT_TYPE_CUSTOMER_UPDATED = 'customer-updated';

    public const EVENT_TYPE_EXPERIAN_CHECK_PERFORMED = 'experian-check-performed';

    public const EVENT_TYPE_INVOICE_ABANDONED = 'invoice-abandoned';

    public const EVENT_TYPE_INVOICE_ISSUED = 'invoice-issued';

    public const EVENT_TYPE_INVOICE_PAID = 'invoice-paid';

    public const EVENT_TYPE_INVOICE_PARTIALLY_PAID = 'invoice-partially-paid';

    public const EVENT_TYPE_INVOICE_PARTIALLY_REFUNDED = 'invoice-partially-refunded';

    public const EVENT_TYPE_INVOICE_PAST_DUE = 'invoice-past-due';

    public const EVENT_TYPE_INVOICE_REFUNDED = 'invoice-refunded';

    public const EVENT_TYPE_INVOICE_REISSUED = 'invoice-reissued';

    public const EVENT_TYPE_INVOICE_VOIDED = 'invoice-voided';

    public const EVENT_TYPE_KYC_DOCUMENT_ACCEPTED = 'kyc-document-accepted';

    public const EVENT_TYPE_KYC_DOCUMENT_ARCHIVED = 'kyc-document-archived';

    public const EVENT_TYPE_KYC_DOCUMENT_CREATED = 'kyc-document-created';

    public const EVENT_TYPE_KYC_DOCUMENT_MODIFIED = 'kyc-document-modified';

    public const EVENT_TYPE_KYC_DOCUMENT_REJECTED = 'kyc-document-rejected';

    public const EVENT_TYPE_KYC_DOCUMENT_REVIEWED = 'kyc-document-reviewed';

    public const EVENT_TYPE_KYC_REQUEST_ATTEMPTED = 'kyc-request-attempted';

    public const EVENT_TYPE_KYC_REQUEST_FAILED = 'kyc-request-failed';

    public const EVENT_TYPE_KYC_REQUEST_FULFILLED = 'kyc-request-fulfilled';

    public const EVENT_TYPE_KYC_REQUEST_PARTIALLY_FULFILLED = 'kyc-request-partially-fulfilled';

    public const EVENT_TYPE_LEAD_SOURCE_CHANGED = 'lead-source-changed';

    public const EVENT_TYPE_ORDER_ABANDONED = 'order-abandoned';

    public const EVENT_TYPE_ORDER_COMPLETED = 'order-completed';

    public const EVENT_TYPE_PAYMENT_CARD_EXPIRED = 'payment-card-expired';

    public const EVENT_TYPE_PAYOUT_REQUEST_CREATED = 'payout-request-created';

    public const EVENT_TYPE_PAYOUT_REQUEST_MODIFIED = 'payout-request-modified';

    public const EVENT_TYPE_QUOTE_ACCEPTED = 'quote-accepted';

    public const EVENT_TYPE_QUOTE_CANCELED = 'quote-canceled';

    public const EVENT_TYPE_QUOTE_CREATED = 'quote-created';

    public const EVENT_TYPE_QUOTE_EXPIRED = 'quote-expired';

    public const EVENT_TYPE_QUOTE_ISSUED = 'quote-issued';

    public const EVENT_TYPE_QUOTE_RECALLED = 'quote-recalled';

    public const EVENT_TYPE_QUOTE_REJECTED = 'quote-rejected';

    public const EVENT_TYPE_QUOTE_UPDATED = 'quote-updated';

    public const EVENT_TYPE_RENEWAL_INVOICE_ISSUED = 'renewal-invoice-issued';

    public const EVENT_TYPE_RENEWAL_INVOICE_PAYMENT_DECLINED = 'renewal-invoice-payment-declined';

    public const EVENT_TYPE_SUBSCRIPTION_ACTIVATED = 'subscription-activated';

    public const EVENT_TYPE_SUBSCRIPTION_CANCELED = 'subscription-canceled';

    public const EVENT_TYPE_SUBSCRIPTION_CHURNED = 'subscription-churned';

    public const EVENT_TYPE_SUBSCRIPTION_DOWNGRADED = 'subscription-downgraded';

    public const EVENT_TYPE_SUBSCRIPTION_PAUSED = 'subscription-paused';

    public const EVENT_TYPE_SUBSCRIPTION_REACTIVATED = 'subscription-reactivated';

    public const EVENT_TYPE_SUBSCRIPTION_RENEWED = 'subscription-renewed';

    public const EVENT_TYPE_SUBSCRIPTION_RESUMED = 'subscription-resumed';

    public const EVENT_TYPE_SUBSCRIPTION_UPGRADED = 'subscription-upgraded';

    public const EVENT_TYPE_TRANSACTION_AMOUNT_DISCREPANCY_FOUND = 'transaction-amount-discrepancy-found';

    public const EVENT_TYPE_TRANSACTION_DECLINED = 'transaction-declined';

    public const EVENT_TYPE_TRANSACTION_DISCREPANCY_FOUND = 'transaction-discrepancy-found';

    public const EVENT_TYPE_TRANSACTION_PROCESSED = 'transaction-processed';

    public const EVENT_TYPE_ORDER_DELINQUENCY_REACHED = 'order-delinquency-reached';

    public const EVENT_TYPE_AUTODEPOSIT_LOOKUP_PERFORMED = 'autodeposit-lookup-performed';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('addTags', $data)) {
            $this->setAddTags($data['addTags']);
        }
        if (array_key_exists('removeTags', $data)) {
            $this->setRemoveTags($data['removeTags']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
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

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getEventType(): string
    {
        return $this->fields['eventType'];
    }

    public function setEventType(string $eventType): static
    {
        $this->fields['eventType'] = $eventType;

        return $this;
    }

    public function getFilter(): ?string
    {
        return $this->fields['filter'] ?? null;
    }

    public function setFilter(null|string $filter): static
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAddTags(): array
    {
        return $this->fields['addTags'];
    }

    /**
     * @param string[] $addTags
     */
    public function setAddTags(array $addTags): static
    {
        $this->fields['addTags'] = $addTags;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRemoveTags(): array
    {
        return $this->fields['removeTags'];
    }

    /**
     * @param string[] $removeTags
     */
    public function setRemoveTags(array $removeTags): static
    {
        $this->fields['removeTags'] = $removeTags;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

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
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType'];
        }
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('addTags', $this->fields)) {
            $data['addTags'] = $this->fields['addTags'];
        }
        if (array_key_exists('removeTags', $this->fields)) {
            $data['removeTags'] = $this->fields['removeTags'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
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
