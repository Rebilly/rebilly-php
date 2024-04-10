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

class CustomerTimeline implements JsonSerializable
{
    public const TYPE_ACCOUNT_PASSWORD_RESET_REQUESTED = 'account-password-reset-requested';

    public const TYPE_ACCOUNT_VERIFICATION_REQUESTED = 'account-verification-requested';

    public const TYPE_AML_LIST_WAS_POSSIBLY_MATCHED = 'aml-list-was-possibly-matched';

    public const TYPE_DEPOSIT_REQUEST_COMPLETED = 'deposit-request-completed';

    public const TYPE_DEPOSIT_REQUEST_CREATED = 'deposit-request-created';

    public const TYPE_DEPOSIT_REQUEST_EXPIRED = 'deposit-request-expired';

    public const TYPE_DEPOSIT_REQUEST_STARTED = 'deposit-request-started';

    public const TYPE_COUPON_APPLIED = 'coupon-applied';

    public const TYPE_COUPON_REDEEMED = 'coupon-redeemed';

    public const TYPE_COUPON_REDEMPTION_CANCELED = 'coupon-redemption-canceled';

    public const TYPE_CUSTOM_EVENT = 'custom-event';

    public const TYPE_CUSTOM_EVENT_PROCESSED = 'custom-event-processed';

    public const TYPE_CUSTOM_FIELDS_CHANGED = 'custom-fields-changed';

    public const TYPE_CUSTOMER_BANK_ACCOUNT_BLOCKED = 'customer-bank-account-blocked';

    public const TYPE_CUSTOMER_BLOCKED = 'customer-blocked';

    public const TYPE_CUSTOMER_COMMENT_CREATED = 'customer-comment-created';

    public const TYPE_CUSTOMER_CREATED = 'customer-created';

    public const TYPE_CUSTOMER_MERGED = 'customer-merged';

    public const TYPE_CUSTOMER_PAYMENT_CARD_BLOCKED = 'customer-payment-card-blocked';

    public const TYPE_CUSTOMER_REQUESTED_OTP = 'customer-requested-otp';

    public const TYPE_CUSTOMER_TAGGED = 'customer-tagged';

    public const TYPE_CUSTOMER_UNTAGGED = 'customer-untagged';

    public const TYPE_DEFAULT_PAYMENT_INSTRUMENT_CHANGED = 'default-payment-instrument-changed';

    public const TYPE_EMAIL_MESSAGE_SENT = 'email-message-sent';

    public const TYPE_EXPERIAN_CHECK_PERFORMED = 'experian-check-performed';

    public const TYPE_INVOICE_ABANDONED = 'invoice-abandoned';

    public const TYPE_INVOICE_CREATED = 'invoice-created';

    public const TYPE_INVOICE_DISPUTED = 'invoice-disputed';

    public const TYPE_INVOICE_ISSUED = 'invoice-issued';

    public const TYPE_INVOICE_PAID = 'invoice-paid';

    public const TYPE_INVOICE_PARTIALLY_PAID = 'invoice-partially-paid';

    public const TYPE_INVOICE_PARTIALLY_REFUNDED = 'invoice-partially-refunded';

    public const TYPE_INVOICE_PAST_DUE = 'invoice-past-due';

    public const TYPE_INVOICE_REFUNDED = 'invoice-refunded';

    public const TYPE_INVOICE_REISSUED = 'invoice-reissued';

    public const TYPE_INVOICE_REVENUE_RECOGNIZED = 'invoice-revenue-recognized';

    public const TYPE_INVOICE_VOIDED = 'invoice-voided';

    public const TYPE_KYC_DOCUMENT_ACCEPTED = 'kyc-document-accepted';

    public const TYPE_KYC_DOCUMENT_CREATED = 'kyc-document-created';

    public const TYPE_KYC_DOCUMENT_MODIFIED = 'kyc-document-modified';

    public const TYPE_KYC_DOCUMENT_REJECTED = 'kyc-document-rejected';

    public const TYPE_KYC_DOCUMENT_REVIEWED = 'kyc-document-reviewed';

    public const TYPE_KYC_REQUEST_FULFILLED = 'kyc-request-fulfilled';

    public const TYPE_LEAD_SOURCE_CHANGED = 'lead-source-changed';

    public const TYPE_ORDER_ACTIVATED = 'order-activated';

    public const TYPE_ORDER_CANCELED = 'order-canceled';

    public const TYPE_ORDER_CHURNED = 'order-churned';

    public const TYPE_ORDER_COMPLETED = 'order-completed';

    public const TYPE_ORDER_CREATED = 'order-created';

    public const TYPE_ORDER_DOWNGRADED = 'order-downgraded';

    public const TYPE_ORDER_PAID_EARLY = 'order-paid-early';

    public const TYPE_ORDER_REACTIVATED = 'order-reactivated';

    public const TYPE_ORDER_RENEWED = 'order-renewed';

    public const TYPE_ORDER_UPGRADED = 'order-upgraded';

    public const TYPE_PAYMENT_CARD_EXPIRATION_WAS_MODIFIED = 'payment-card-expiration-was-modified';

    public const TYPE_PAYMENT_CARD_EXPIRED = 'payment-card-expired';

    public const TYPE_PAYMENT_INSTRUMENT_CREATED = 'payment-instrument-created';

    public const TYPE_PAYMENT_INSTRUMENT_DEACTIVATED = 'payment-instrument-deactivated';

    public const TYPE_PRIMARY_ADDRESS_CHANGED = 'primary-address-changed';

    public const TYPE_QUICKBOOKS_CUSTOMER_CREATED = 'quickbooks-customer-created';

    public const TYPE_QUICKBOOKS_CUSTOMER_TASK_FAILED = 'quickbooks-customer-task-failed';

    public const TYPE_QUOTE_CANCELED = 'quote-canceled';

    public const TYPE_QUOTE_CREATED = 'quote-created';

    public const TYPE_QUOTE_EXPIRED = 'quote-expired';

    public const TYPE_QUOTE_ISSUED = 'quote-issued';

    public const TYPE_QUOTE_ORDER_ATTACHED = 'quote-order-attached';

    public const TYPE_QUOTE_RECALLED = 'quote-recalled';

    public const TYPE_QUOTE_REJECTED = 'quote-rejected';

    public const TYPE_QUOTE_UPDATED = 'quote-updated';

    public const TYPE_REFUND_WAS_REFLECTED_IN_INVOICES = 'refund-was-reflected-in-invoices';

    public const TYPE_SUBSCRIPTION_PAUSED = 'subscription-paused';

    public const TYPE_SUBSCRIPTION_RESUMED = 'subscription-resumed';

    public const TYPE_SUBSCRIPTION_TRIAL_END_CHANGED = 'subscription-trial-end-changed';

    public const TYPE_TRANSACTION_ABANDONED = 'transaction-abandoned';

    public const TYPE_TRANSACTION_AMOUNT_DISCREPANCY_FOUND = 'transaction-amount-discrepancy-found';

    public const TYPE_TRANSACTION_APPROVED = 'transaction-approved';

    public const TYPE_TRANSACTION_CANCELED = 'transaction-canceled';

    public const TYPE_TRANSACTION_DECLINED = 'transaction-declined';

    public const TYPE_TRANSACTION_DISCREPANCY_FOUND = 'transaction-discrepancy-found';

    public const TYPE_TRANSACTION_DISPUTED = 'transaction-disputed';

    public const TYPE_TRANSACTION_RECONCILED = 'transaction-reconciled';

    public const TYPE_TRANSACTION_REFUNDED = 'transaction-refunded';

    public const TYPE_TRANSACTION_VOIDED = 'transaction-voided';

    public const TYPE_TRANSACTION_WAITING_GATEWAY = 'transaction-waiting-gateway';

    public const TRIGGERED_BY_REBILLY = 'rebilly';

    public const TRIGGERED_BY_APP = 'app';

    public const TRIGGERED_BY_DIRECT_API = 'direct-api';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('customEventType', $data)) {
            $this->setCustomEventType($data['customEventType']);
        }
        if (array_key_exists('customData', $data)) {
            $this->setCustomData($data['customData']);
        }
        if (array_key_exists('triggeredBy', $data)) {
            $this->setTriggeredBy($data['triggeredBy']);
        }
        if (array_key_exists('message', $data)) {
            $this->setMessage($data['message']);
        }
        if (array_key_exists('extraData', $data)) {
            $this->setExtraData($data['extraData']);
        }
        if (array_key_exists('occurredTime', $data)) {
            $this->setOccurredTime($data['occurredTime']);
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

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getCustomEventType(): ?string
    {
        return $this->fields['customEventType'] ?? null;
    }

    public function setCustomEventType(null|string $customEventType): static
    {
        $this->fields['customEventType'] = $customEventType;

        return $this;
    }

    public function getCustomData(): ?array
    {
        return $this->fields['customData'] ?? null;
    }

    public function setCustomData(null|array $customData): static
    {
        $this->fields['customData'] = $customData;

        return $this;
    }

    public function getTriggeredBy(): ?string
    {
        return $this->fields['triggeredBy'] ?? null;
    }

    public function getMessage(): ?string
    {
        return $this->fields['message'] ?? null;
    }

    public function setMessage(null|string $message): static
    {
        $this->fields['message'] = $message;

        return $this;
    }

    public function getExtraData(): ?TimelineExtraData
    {
        return $this->fields['extraData'] ?? null;
    }

    public function setExtraData(null|TimelineExtraData|array $extraData): static
    {
        if ($extraData !== null && !($extraData instanceof TimelineExtraData)) {
            $extraData = TimelineExtraData::from($extraData);
        }

        $this->fields['extraData'] = $extraData;

        return $this;
    }

    public function getOccurredTime(): ?DateTimeImmutable
    {
        return $this->fields['occurredTime'] ?? null;
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
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('customEventType', $this->fields)) {
            $data['customEventType'] = $this->fields['customEventType'];
        }
        if (array_key_exists('customData', $this->fields)) {
            $data['customData'] = $this->fields['customData'];
        }
        if (array_key_exists('triggeredBy', $this->fields)) {
            $data['triggeredBy'] = $this->fields['triggeredBy'];
        }
        if (array_key_exists('message', $this->fields)) {
            $data['message'] = $this->fields['message'];
        }
        if (array_key_exists('extraData', $this->fields)) {
            $data['extraData'] = $this->fields['extraData']?->jsonSerialize();
        }
        if (array_key_exists('occurredTime', $this->fields)) {
            $data['occurredTime'] = $this->fields['occurredTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setTriggeredBy(null|string $triggeredBy): static
    {
        $this->fields['triggeredBy'] = $triggeredBy;

        return $this;
    }

    private function setOccurredTime(null|DateTimeImmutable|string $occurredTime): static
    {
        if ($occurredTime !== null && !($occurredTime instanceof DateTimeImmutable)) {
            $occurredTime = new DateTimeImmutable($occurredTime);
        }

        $this->fields['occurredTime'] = $occurredTime;

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
