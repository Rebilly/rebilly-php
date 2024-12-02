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

class InvoiceTimeline implements JsonSerializable
{
    public const TYPE_COUPON_APPLIED = 'coupon-applied';

    public const TYPE_EMAIL_MESSAGE_SENT = 'email-message-sent';

    public const TYPE_INVOICE_ABANDONED = 'invoice-abandoned';

    public const TYPE_INVOICE_DISPUTED = 'invoice-disputed';

    public const TYPE_INVOICE_ISSUED = 'invoice-issued';

    public const TYPE_INVOICE_PAID = 'invoice-paid';

    public const TYPE_INVOICE_PARTIALLY_PAID = 'invoice-partially-paid';

    public const TYPE_INVOICE_PARTIALLY_REFUNDED = 'invoice-partially-refunded';

    public const TYPE_INVOICE_PAST_DUE = 'invoice-past-due';

    public const TYPE_INVOICE_REFUNDED = 'invoice-refunded';

    public const TYPE_INVOICE_REISSUED = 'invoice-reissued';

    public const TYPE_INVOICE_RENEWAL_PAYMENT_DECLINED = 'invoice-renewal-payment-declined';

    public const TYPE_INVOICE_REVENUE_RECOGNIZED = 'invoice-revenue-recognized';

    public const TYPE_INVOICE_TAX_CALCULATION_FAILED = 'invoice-tax-calculation-failed';

    public const TYPE_INVOICE_VOIDED = 'invoice-voided';

    public const TYPE_QUICKBOOKS_CREDIT_MEMO_CREATED = 'quickbooks-credit-memo-created';

    public const TYPE_QUICKBOOKS_CREDIT_MEMO_VOIDED = 'quickbooks-credit-memo-voided';

    public const TYPE_QUICKBOOKS_INVOICE_CREATED = 'quickbooks-invoice-created';

    public const TYPE_QUICKBOOKS_INVOICE_TASK_FAILED = 'quickbooks-invoice-task-failed';

    public const TYPE_QUICKBOOKS_INVOICE_UPDATED = 'quickbooks-invoice-updated';

    public const TYPE_QUICKBOOKS_INVOICE_VOIDED = 'quickbooks-invoice-voided';

    public const TYPE_QUICKBOOKS_REVENUE_RECOGNITION_CREATED = 'quickbooks-revenue-recognition-created';

    public const TYPE_TIMELINE_COMMENT_CREATED = 'timeline-comment-created';

    public const TYPE_TRANSACTION_ABANDONED = 'transaction-abandoned';

    public const TYPE_TRANSACTION_APPROVED = 'transaction-approved';

    public const TYPE_TRANSACTION_CANCELED = 'transaction-canceled';

    public const TYPE_TRANSACTION_DECLINED = 'transaction-declined';

    public const TYPE_TRANSACTION_INITIATED = 'transaction-initiated';

    public const TYPE_TRANSACTION_REFUNDED = 'transaction-refunded';

    public const TYPE_TRANSACTION_VOIDED = 'transaction-voided';

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

    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

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
