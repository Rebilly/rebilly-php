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

use JsonSerializable;

class SystemEvent implements JsonSerializable
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

    public const EVENT_TYPE_HARD_USAGE_LIMIT_REACHED = 'hard-usage-limit-reached';

    public const EVENT_TYPE_INVOICE_ABANDONED = 'invoice-abandoned';

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

    public const EVENT_TYPE_READY_TO_PAYOUT_REQUESTED = 'ready-to-payout-requested';

    public const EVENT_TYPE_RENEWAL_INVOICE_ISSUED = 'renewal-invoice-issued';

    public const EVENT_TYPE_RENEWAL_INVOICE_PAYMENT_CANCELED = 'renewal-invoice-payment-canceled';

    public const EVENT_TYPE_RENEWAL_INVOICE_PAYMENT_DECLINED = 'renewal-invoice-payment-declined';

    public const EVENT_TYPE_RISK_SCORE_CHANGED = 'risk-score-changed';

    public const EVENT_TYPE_SOFT_USAGE_LIMIT_REACHED = 'soft-usage-limit-reached';

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

    public const EVENT_TYPE_SUBSCRIPTION_QUANTITY_FILLED_LIMIT_REACHED = 'subscription-quantity-filled-limit-reached';

    public const EVENT_TYPE_SUBSCRIPTION_REACTIVATED = 'subscription-reactivated';

    public const EVENT_TYPE_SUBSCRIPTION_RENEWAL_REMINDER = 'subscription-renewal-reminder';

    public const EVENT_TYPE_SUBSCRIPTION_RENEWED = 'subscription-renewed';

    public const EVENT_TYPE_SUBSCRIPTION_RESUMED = 'subscription-resumed';

    public const EVENT_TYPE_SUBSCRIPTION_TRIAL_CONVERTED = 'subscription-trial-converted';

    public const EVENT_TYPE_SUBSCRIPTION_TRIAL_END_CHANGED = 'subscription-trial-end-changed';

    public const EVENT_TYPE_SUBSCRIPTION_TRIAL_END_REMINDER = 'subscription-trial-end-reminder';

    public const EVENT_TYPE_SUBSCRIPTION_TRIAL_ENDED = 'subscription-trial-ended';

    public const EVENT_TYPE_SUBSCRIPTION_UPGRADED = 'subscription-upgraded';

    public const EVENT_TYPE_TRANSACTION_AMOUNT_DISCREPANCY_FOUND = 'transaction-amount-discrepancy-found';

    public const EVENT_TYPE_TRANSACTION_DECLINED = 'transaction-declined';

    public const EVENT_TYPE_TRANSACTION_DISCREPANCY_FOUND = 'transaction-discrepancy-found';

    public const EVENT_TYPE_TRANSACTION_PROCESS_REQUESTED = 'transaction-process-requested';

    public const EVENT_TYPE_TRANSACTION_PROCESSED = 'transaction-processed';

    public const EVENT_TYPE_ORDER_DELINQUENCY_REACHED = 'order-delinquency-reached';

    public const EVENT_TYPE_AUTODEPOSIT_LOOKUP_PERFORMED = 'autodeposit-lookup-performed';

    public const CATEGORY_BILLING = 'billing';

    public const CATEGORY_PAYMENTS = 'payments';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('category', $data)) {
            $this->setCategory($data['category']);
        }
        if (array_key_exists('rulesCount', $data)) {
            $this->setRulesCount($data['rulesCount']);
        }
        if (array_key_exists('bindsCount', $data)) {
            $this->setBindsCount($data['bindsCount']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEventType(): ?string
    {
        return $this->fields['eventType'] ?? null;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): static
    {
        $this->fields['title'] = $title;

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

    public function getCategory(): ?string
    {
        return $this->fields['category'] ?? null;
    }

    public function setCategory(null|string $category): static
    {
        $this->fields['category'] = $category;

        return $this;
    }

    public function getRulesCount(): ?int
    {
        return $this->fields['rulesCount'] ?? null;
    }

    public function getBindsCount(): ?int
    {
        return $this->fields['bindsCount'] ?? null;
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
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('category', $this->fields)) {
            $data['category'] = $this->fields['category'];
        }
        if (array_key_exists('rulesCount', $this->fields)) {
            $data['rulesCount'] = $this->fields['rulesCount'];
        }
        if (array_key_exists('bindsCount', $this->fields)) {
            $data['bindsCount'] = $this->fields['bindsCount'];
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

    private function setEventType(null|string $eventType): static
    {
        $this->fields['eventType'] = $eventType;

        return $this;
    }

    private function setRulesCount(null|int $rulesCount): static
    {
        $this->fields['rulesCount'] = $rulesCount;

        return $this;
    }

    private function setBindsCount(null|int $bindsCount): static
    {
        $this->fields['bindsCount'] = $bindsCount;

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
