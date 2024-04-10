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

class WebhookTracking implements JsonSerializable
{
    public const EVENT_TYPE_ACCOUNT_PASSWORD_RESET_REQUESTED = 'account-password-reset-requested';

    public const EVENT_TYPE_ACCOUNT_VERIFICATION_REQUESTED = 'account-verification-requested';

    public const EVENT_TYPE_AML_LIST_POSSIBLY_MATCHED = 'aml-list-possibly-matched';

    public const EVENT_TYPE_APPLICATION_INSTANCE_DISABLED = 'application-instance-disabled';

    public const EVENT_TYPE_APPLICATION_INSTANCE_ENABLED = 'application-instance-enabled';

    public const EVENT_TYPE_BALANCE_TRANSACTION_SETTLED = 'balance-transaction-settled';

    public const EVENT_TYPE_COUPON_APPLICATION_REMOVED = 'coupon-application-removed';

    public const EVENT_TYPE_COUPON_APPLIED = 'coupon-applied';

    public const EVENT_TYPE_COUPON_EXPIRATION_MODIFIED = 'coupon-expiration-modified';

    public const EVENT_TYPE_COUPON_EXPIRED = 'coupon-expired';

    public const EVENT_TYPE_COUPON_ISSUED = 'coupon-issued';

    public const EVENT_TYPE_COUPON_MODIFIED = 'coupon-modified';

    public const EVENT_TYPE_COUPON_REDEEMED = 'coupon-redeemed';

    public const EVENT_TYPE_COUPON_REDEMPTION_CANCELED = 'coupon-redemption-canceled';

    public const EVENT_TYPE_CUSTOMER_CREATED = 'customer-created';

    public const EVENT_TYPE_CUSTOMER_ONE_TIME_PASSWORD_REQUESTED = 'customer-one-time-password-requested';

    public const EVENT_TYPE_CUSTOMER_UPDATED = 'customer-updated';

    public const EVENT_TYPE_DISPUTE_CREATED = 'dispute-created';

    public const EVENT_TYPE_DISPUTE_MODIFIED = 'dispute-modified';

    public const EVENT_TYPE_EXPERIAN_CHECK_PERFORMED = 'experian-check-performed';

    public const EVENT_TYPE_GATEWAY_ACCOUNT_DOWNTIME_ENDED = 'gateway-account-downtime-ended';

    public const EVENT_TYPE_GATEWAY_ACCOUNT_DOWNTIME_STARTED = 'gateway-account-downtime-started';

    public const EVENT_TYPE_GATEWAY_ACCOUNT_LIMIT_REACHED = 'gateway-account-limit-reached';

    public const EVENT_TYPE_GATEWAY_ACCOUNT_ONBOARDING_COMPLETED = 'gateway-account-onboarding-completed';

    public const EVENT_TYPE_GATEWAY_ACCOUNT_ONBOARDING_FAILED = 'gateway-account-onboarding-failed';

    public const EVENT_TYPE_GATEWAY_ACCOUNT_REQUESTED = 'gateway-account-requested';

    public const EVENT_TYPE_HARD_USAGE_LIMIT_REACHED_YAML = 'hard-usage-limit-reached.yaml';

    public const EVENT_TYPE_INVOICE_ISSUED = 'invoice-issued';

    public const EVENT_TYPE_INVOICE_MODIFIED = 'invoice-modified';

    public const EVENT_TYPE_INVOICE_PAID = 'invoice-paid';

    public const EVENT_TYPE_INVOICE_PARTIALLY_PAID = 'invoice-partially-paid';

    public const EVENT_TYPE_INVOICE_PARTIALLY_REFUNDED = 'invoice-partially-refunded';

    public const EVENT_TYPE_INVOICE_PAST_DUE = 'invoice-past-due';

    public const EVENT_TYPE_INVOICE_PAST_DUE_REMINDER = 'invoice-past-due-reminder';

    public const EVENT_TYPE_INVOICE_REFUNDED = 'invoice-refunded';

    public const EVENT_TYPE_INVOICE_REVENUE_RECOGNIZED = 'invoice-revenue-recognized';

    public const EVENT_TYPE_INVOICE_TAX_CALCULATION_FAILED = 'invoice-tax-calculation-failed';

    public const EVENT_TYPE_INVOICE_VOIDED = 'invoice-voided';

    public const EVENT_TYPE_KYC_DOCUMENT_ACCEPTED = 'kyc-document-accepted';

    public const EVENT_TYPE_KYC_DOCUMENT_MODIFIED = 'kyc-document-modified';

    public const EVENT_TYPE_KYC_DOCUMENT_REJECTED = 'kyc-document-rejected';

    public const EVENT_TYPE_KYC_REQUEST_FULFILLED = 'kyc-request-fulfilled';

    public const EVENT_TYPE_NSF_RESPONSE_RECEIVED = 'nsf-response-received';

    public const EVENT_TYPE_ORDER_ABANDON_REMINDER = 'order-abandon-reminder';

    public const EVENT_TYPE_ORDER_ABANDONED = 'order-abandoned';

    public const EVENT_TYPE_ORDER_COMPLETED = 'order-completed';

    public const EVENT_TYPE_PAYMENT_CARD_CREATED = 'payment-card-created';

    public const EVENT_TYPE_PAYMENT_CARD_EXPIRATION_REMINDER = 'payment-card-expiration-reminder';

    public const EVENT_TYPE_PAYMENT_CARD_EXPIRED = 'payment-card-expired';

    public const EVENT_TYPE_PAYMENT_INSTRUMENT_MODIFIED = 'payment-instrument-modified';

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

    public const EVENT_TYPE_READY_TO_PAY_REQUESTED = 'ready-to-pay-requested';

    public const EVENT_TYPE_RENEWAL_INVOICE_ISSUED = 'renewal-invoice-issued';

    public const EVENT_TYPE_RENEWAL_INVOICE_PAYMENT_CANCELED = 'renewal-invoice-payment-canceled';

    public const EVENT_TYPE_RENEWAL_INVOICE_PAYMENT_DECLINED = 'renewal-invoice-payment-declined';

    public const EVENT_TYPE_RISK_SCORE_CHANGED = 'risk-score-changed';

    public const EVENT_TYPE_SOFT_USAGE_LIMIT_REACHED_YAML = 'soft-usage-limit-reached.yaml';

    public const EVENT_TYPE_SUBSCRIPTION_ACTIVATED = 'subscription-activated';

    public const EVENT_TYPE_SUBSCRIPTION_CANCELED = 'subscription-canceled';

    public const EVENT_TYPE_SUBSCRIPTION_CHURNED = 'subscription-churned';

    public const EVENT_TYPE_SUBSCRIPTION_CREATED = 'subscription-created';

    public const EVENT_TYPE_SUBSCRIPTION_DOWNGRADED = 'subscription-downgraded';

    public const EVENT_TYPE_SUBSCRIPTION_ITEMS_CHANGED = 'subscription-items-changed';

    public const EVENT_TYPE_SUBSCRIPTION_MODIFIED = 'subscription-modified';

    public const EVENT_TYPE_SUBSCRIPTION_PAUSE_CREATED = 'subscription-pause-created';

    public const EVENT_TYPE_SUBSCRIPTION_PAUSE_MODIFIED = 'subscription-pause-modified';

    public const EVENT_TYPE_SUBSCRIPTION_PAUSE_REVOKED = 'subscription-pause-revoked';

    public const EVENT_TYPE_SUBSCRIPTION_PAUSED = 'subscription-paused';

    public const EVENT_TYPE_SUBSCRIPTION_REACTIVATED = 'subscription-reactivated';

    public const EVENT_TYPE_SUBSCRIPTION_RENEWAL_REMINDER = 'subscription-renewal-reminder';

    public const EVENT_TYPE_SUBSCRIPTION_RENEWED = 'subscription-renewed';

    public const EVENT_TYPE_SUBSCRIPTION_RESUMED = 'subscription-resumed';

    public const EVENT_TYPE_SUBSCRIPTION_TRIAL_CONVERTED = 'subscription-trial-converted';

    public const EVENT_TYPE_SUBSCRIPTION_TRIAL_END_CHANGED = 'subscription-trial-end-changed';

    public const EVENT_TYPE_SUBSCRIPTION_TRIAL_END_REMINDER = 'subscription-trial-end-reminder';

    public const EVENT_TYPE_SUBSCRIPTION_UPGRADED = 'subscription-upgraded';

    public const EVENT_TYPE_TRANSACTION_AMOUNT_DISCREPANCY_FOUND = 'transaction-amount-discrepancy-found';

    public const EVENT_TYPE_TRANSACTION_DECLINED = 'transaction-declined';

    public const EVENT_TYPE_TRANSACTION_DISCREPANCY_FOUND = 'transaction-discrepancy-found';

    public const EVENT_TYPE_TRANSACTION_PROCESS_REQUESTED = 'transaction-process-requested';

    public const EVENT_TYPE_TRANSACTION_PROCESSED = 'transaction-processed';

    public const EVENT_TYPE_ORDER_DELINQUENCY_REACHED = 'order-delinquency-reached';

    public const SOURCE_WEBHOOKS = 'webhooks';

    public const SOURCE_RULES = 'rules';

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
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('source', $data)) {
            $this->setSource($data['source']);
        }
        if (array_key_exists('attempt', $data)) {
            $this->setAttempt($data['attempt']);
        }
        if (array_key_exists('sentTime', $data)) {
            $this->setSentTime($data['sentTime']);
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

    public function getEventType(): ?string
    {
        return $this->fields['eventType'] ?? null;
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

    public function getAttempt(): ?int
    {
        return $this->fields['attempt'] ?? null;
    }

    public function setAttempt(null|int $attempt): static
    {
        $this->fields['attempt'] = $attempt;

        return $this;
    }

    public function getSentTime(): ?DateTimeImmutable
    {
        return $this->fields['sentTime'] ?? null;
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
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType'];
        }
        if (array_key_exists('source', $this->fields)) {
            $data['source'] = $this->fields['source'];
        }
        if (array_key_exists('attempt', $this->fields)) {
            $data['attempt'] = $this->fields['attempt'];
        }
        if (array_key_exists('sentTime', $this->fields)) {
            $data['sentTime'] = $this->fields['sentTime']?->format(DateTimeInterface::RFC3339);
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

    private function setInitiatedTime(null|DateTimeImmutable|string $initiatedTime): static
    {
        if ($initiatedTime !== null && !($initiatedTime instanceof DateTimeImmutable)) {
            $initiatedTime = new DateTimeImmutable($initiatedTime);
        }

        $this->fields['initiatedTime'] = $initiatedTime;

        return $this;
    }

    private function setEventType(null|string $eventType): static
    {
        $this->fields['eventType'] = $eventType;

        return $this;
    }

    private function setSentTime(null|DateTimeImmutable|string $sentTime): static
    {
        if ($sentTime !== null && !($sentTime instanceof DateTimeImmutable)) {
            $sentTime = new DateTimeImmutable($sentTime);
        }

        $this->fields['sentTime'] = $sentTime;

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
