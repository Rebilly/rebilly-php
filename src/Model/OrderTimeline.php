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

class OrderTimeline implements JsonSerializable
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

    public const TYPE_INVOICE_VOIDED = 'invoice-voided';

    public const TYPE_ORDER_ACTIVATED = 'order-activated';

    public const TYPE_ORDER_AUTOPAY_CHANGED = 'order-autopay-changed';

    public const TYPE_ORDER_BILLING_ADDRESS_CHANGED = 'order-billing-address-changed';

    public const TYPE_ORDER_BILLING_ANCHOR_CHANGED = 'order-billing-anchor-changed';

    public const TYPE_ORDER_CANCELED = 'order-canceled';

    public const TYPE_ORDER_CHURNED = 'order-churned';

    public const TYPE_ORDER_COMPLETED = 'order-completed';

    public const TYPE_ORDER_CUSTOM_FIELDS_CHANGED = 'order-custom-fields-changed';

    public const TYPE_ORDER_DELIVERY_ADDRESS_CHANGED = 'order-delivery-address-changed';

    public const TYPE_ORDER_DOWNGRADED = 'order-downgraded';

    public const TYPE_ORDER_ITEMS_CHANGED = 'order-items-changed';

    public const TYPE_ORDER_PAID_EARLY = 'order-paid-early';

    public const TYPE_ORDER_QUANTITY_CHANGED = 'order-quantity-changed';

    public const TYPE_ORDER_REACTIVATED = 'order-reactivated';

    public const TYPE_ORDER_RECURRING_INTERVAL_CHANGED = 'order-recurring-interval-changed';

    public const TYPE_ORDER_RENEWAL_TIME_CHANGED = 'order-renewal-time-changed';

    public const TYPE_ORDER_RENEWED = 'order-renewed';

    public const TYPE_ORDER_RISK_METADATA_CHANGED = 'order-risk-metadata-changed';

    public const TYPE_ORDER_UPGRADED = 'order-upgraded';

    public const TYPE_ORDER_VOIDED = 'order-voided';

    public const TYPE_SUBSCRIPTION_PAUSED = 'subscription-paused';

    public const TYPE_SUBSCRIPTION_PAUSE_CREATED = 'subscription-pause-created';

    public const TYPE_SUBSCRIPTION_PAUSE_MODIFIED = 'subscription-pause-modified';

    public const TYPE_SUBSCRIPTION_PAUSE_REVOKED = 'subscription-pause-revoked';

    public const TYPE_SUBSCRIPTION_RESUMED = 'subscription-resumed';

    public const TYPE_SUBSCRIPTION_TRIAL_END_CHANGED = 'subscription-trial-end-changed';

    public const TYPE_TIMELINE_COMMENT_CREATED = 'timeline-comment-created';

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

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    /**
     * @psalm-return self::TRIGGERED_BY_*|null $triggeredBy
     */
    public function getTriggeredBy(): ?string
    {
        return $this->fields['triggeredBy'] ?? null;
    }

    public function getMessage(): ?string
    {
        return $this->fields['message'] ?? null;
    }

    public function setMessage(null|string $message): self
    {
        $this->fields['message'] = $message;

        return $this;
    }

    public function getExtraData(): ?TimelineExtraData
    {
        return $this->fields['extraData'] ?? null;
    }

    public function setExtraData(null|TimelineExtraData|array $extraData): self
    {
        if ($extraData !== null && !($extraData instanceof \Rebilly\Sdk\Model\TimelineExtraData)) {
            $extraData = \Rebilly\Sdk\Model\TimelineExtraData::from($extraData);
        }

        $this->fields['extraData'] = $extraData;

        return $this;
    }

    public function getOccurredTime(): ?DateTimeImmutable
    {
        return $this->fields['occurredTime'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\SelfLink[]
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
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @psalm-param self::TRIGGERED_BY_*|null $triggeredBy
     */
    private function setTriggeredBy(null|string $triggeredBy): self
    {
        $this->fields['triggeredBy'] = $triggeredBy;

        return $this;
    }

    private function setOccurredTime(null|DateTimeImmutable|string $occurredTime): self
    {
        if ($occurredTime !== null && !($occurredTime instanceof DateTimeImmutable)) {
            $occurredTime = new DateTimeImmutable($occurredTime);
        }

        $this->fields['occurredTime'] = $occurredTime;

        return $this;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\SelfLink ? $value : \Rebilly\Sdk\Model\SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
