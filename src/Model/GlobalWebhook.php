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
    public const EVENTS_FILTER_AML_LIST_POSSIBLY_MATCHED = 'aml-list-possibly-matched';

    public const EVENTS_FILTER_COUPON_APPLICATION_REMOVED = 'coupon-application-removed';

    public const EVENTS_FILTER_COUPON_APPLIED = 'coupon-applied';

    public const EVENTS_FILTER_COUPON_EXPIRATION_MODIFIED = 'coupon-expiration-modified';

    public const EVENTS_FILTER_COUPON_EXPIRED = 'coupon-expired';

    public const EVENTS_FILTER_COUPON_ISSUED = 'coupon-issued';

    public const EVENTS_FILTER_COUPON_MODIFIED = 'coupon-modified';

    public const EVENTS_FILTER_COUPON_REDEEMED = 'coupon-redeemed';

    public const EVENTS_FILTER_COUPON_REDEMPTION_CANCELED = 'coupon-redemption-canceled';

    public const EVENTS_FILTER_CUSTOMER_CREATED = 'customer-created';

    public const EVENTS_FILTER_CUSTOMER_MERGED = 'customer-merged';

    public const EVENTS_FILTER_CUSTOMER_ONE_TIME_PASSWORD_REQUESTED = 'customer-one-time-password-requested';

    public const EVENTS_FILTER_CUSTOMER_UPDATED = 'customer-updated';

    public const EVENTS_FILTER_EXPERIAN_CHECK_PERFORMED = 'experian-check-performed';

    public const EVENTS_FILTER_INVOICE_ABANDONED = 'invoice-abandoned';

    public const EVENTS_FILTER_INVOICE_ISSUED = 'invoice-issued';

    public const EVENTS_FILTER_INVOICE_PAID = 'invoice-paid';

    public const EVENTS_FILTER_INVOICE_PARTIALLY_PAID = 'invoice-partially-paid';

    public const EVENTS_FILTER_INVOICE_PARTIALLY_REFUNDED = 'invoice-partially-refunded';

    public const EVENTS_FILTER_INVOICE_PAST_DUE = 'invoice-past-due';

    public const EVENTS_FILTER_INVOICE_REFUNDED = 'invoice-refunded';

    public const EVENTS_FILTER_INVOICE_REISSUED = 'invoice-reissued';

    public const EVENTS_FILTER_INVOICE_VOIDED = 'invoice-voided';

    public const EVENTS_FILTER_KYC_DOCUMENT_ACCEPTED = 'kyc-document-accepted';

    public const EVENTS_FILTER_KYC_DOCUMENT_ARCHIVED = 'kyc-document-archived';

    public const EVENTS_FILTER_KYC_DOCUMENT_CREATED = 'kyc-document-created';

    public const EVENTS_FILTER_KYC_DOCUMENT_MODIFIED = 'kyc-document-modified';

    public const EVENTS_FILTER_KYC_DOCUMENT_REJECTED = 'kyc-document-rejected';

    public const EVENTS_FILTER_KYC_DOCUMENT_REVIEWED = 'kyc-document-reviewed';

    public const EVENTS_FILTER_KYC_REQUEST_ATTEMPTED = 'kyc-request-attempted';

    public const EVENTS_FILTER_KYC_REQUEST_FAILED = 'kyc-request-failed';

    public const EVENTS_FILTER_KYC_REQUEST_FULFILLED = 'kyc-request-fulfilled';

    public const EVENTS_FILTER_KYC_REQUEST_PARTIALLY_FULFILLED = 'kyc-request-partially-fulfilled';

    public const EVENTS_FILTER_LEAD_SOURCE_CHANGED = 'lead-source-changed';

    public const EVENTS_FILTER_ORDER_ABANDONED = 'order-abandoned';

    public const EVENTS_FILTER_ORDER_COMPLETED = 'order-completed';

    public const EVENTS_FILTER_PAYMENT_CARD_EXPIRED = 'payment-card-expired';

    public const EVENTS_FILTER_PAYOUT_REQUEST_CREATED = 'payout-request-created';

    public const EVENTS_FILTER_PAYOUT_REQUEST_MODIFIED = 'payout-request-modified';

    public const EVENTS_FILTER_QUOTE_ACCEPTED = 'quote-accepted';

    public const EVENTS_FILTER_QUOTE_CANCELED = 'quote-canceled';

    public const EVENTS_FILTER_QUOTE_CREATED = 'quote-created';

    public const EVENTS_FILTER_QUOTE_EXPIRED = 'quote-expired';

    public const EVENTS_FILTER_QUOTE_ISSUED = 'quote-issued';

    public const EVENTS_FILTER_QUOTE_RECALLED = 'quote-recalled';

    public const EVENTS_FILTER_QUOTE_REJECTED = 'quote-rejected';

    public const EVENTS_FILTER_QUOTE_UPDATED = 'quote-updated';

    public const EVENTS_FILTER_RENEWAL_INVOICE_ISSUED = 'renewal-invoice-issued';

    public const EVENTS_FILTER_RENEWAL_INVOICE_PAYMENT_DECLINED = 'renewal-invoice-payment-declined';

    public const EVENTS_FILTER_SUBSCRIPTION_ACTIVATED = 'subscription-activated';

    public const EVENTS_FILTER_SUBSCRIPTION_CANCELED = 'subscription-canceled';

    public const EVENTS_FILTER_SUBSCRIPTION_CHURNED = 'subscription-churned';

    public const EVENTS_FILTER_SUBSCRIPTION_DOWNGRADED = 'subscription-downgraded';

    public const EVENTS_FILTER_SUBSCRIPTION_PAUSED = 'subscription-paused';

    public const EVENTS_FILTER_SUBSCRIPTION_REACTIVATED = 'subscription-reactivated';

    public const EVENTS_FILTER_SUBSCRIPTION_RENEWED = 'subscription-renewed';

    public const EVENTS_FILTER_SUBSCRIPTION_RESUMED = 'subscription-resumed';

    public const EVENTS_FILTER_SUBSCRIPTION_UPGRADED = 'subscription-upgraded';

    public const EVENTS_FILTER_TRANSACTION_AMOUNT_DISCREPANCY_FOUND = 'transaction-amount-discrepancy-found';

    public const EVENTS_FILTER_TRANSACTION_DECLINED = 'transaction-declined';

    public const EVENTS_FILTER_TRANSACTION_DISCREPANCY_FOUND = 'transaction-discrepancy-found';

    public const EVENTS_FILTER_TRANSACTION_PROCESSED = 'transaction-processed';

    public const EVENTS_FILTER_ORDER_DELINQUENCY_REACHED = 'order-delinquency-reached';

    public const EVENTS_FILTER_AUTODEPOSIT_LOOKUP_PERFORMED = 'autodeposit-lookup-performed';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

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
        if (array_key_exists('body', $data)) {
            $this->setBody($data['body']);
        }
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
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
     * @return null|string[]
     */
    public function getEventsFilter(): ?array
    {
        return $this->fields['eventsFilter'] ?? null;
    }

    /**
     * @param null|string[] $eventsFilter
     */
    public function setEventsFilter(null|array $eventsFilter): static
    {
        $this->fields['eventsFilter'] = $eventsFilter;

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

    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->fields['url'];
    }

    public function setUrl(string $url): static
    {
        $this->fields['url'] = $url;

        return $this;
    }

    /**
     * @return null|GlobalWebhookHeaders[]
     */
    public function getHeaders(): ?array
    {
        return $this->fields['headers'] ?? null;
    }

    /**
     * @param null|array[]|GlobalWebhookHeaders[] $headers
     */
    public function setHeaders(null|array $headers): static
    {
        $headers = $headers !== null ? array_map(
            fn ($value) => $value instanceof GlobalWebhookHeaders ? $value : GlobalWebhookHeaders::from($value),
            $headers,
        ) : null;

        $this->fields['headers'] = $headers;

        return $this;
    }

    public function getCredentialHash(): string
    {
        return $this->fields['credentialHash'];
    }

    public function setCredentialHash(string $credentialHash): static
    {
        $this->fields['credentialHash'] = $credentialHash;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->fields['body'] ?? null;
    }

    public function setBody(null|string $body): static
    {
        $this->fields['body'] = $body;

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
        if (array_key_exists('eventsFilter', $this->fields)) {
            $data['eventsFilter'] = $this->fields['eventsFilter'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }
        if (array_key_exists('headers', $this->fields)) {
            $data['headers'] = $this->fields['headers'] !== null
                ? array_map(
                    static fn (GlobalWebhookHeaders $globalWebhookHeaders) => $globalWebhookHeaders->jsonSerialize(),
                    $this->fields['headers'],
                )
                : null;
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
        }
        if (array_key_exists('body', $this->fields)) {
            $data['body'] = $this->fields['body'];
        }
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
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
