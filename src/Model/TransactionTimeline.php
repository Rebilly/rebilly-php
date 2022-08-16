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

class TransactionTimeline implements JsonSerializable
{
    public const TYPE_AMOUNT_ADJUSTED = 'amount-adjusted';

    public const TYPE_BLOCKLIST_MATCHED = 'blocklist-matched';

    public const TYPE_BUMP_OFFER_ACCEPTED = 'bump-offer-accepted';

    public const TYPE_BUMP_OFFER_PRESENTED = 'bump-offer-presented';

    public const TYPE_BUMP_OFFER_REJECTED = 'bump-offer-rejected';

    public const TYPE_CUSTOMER_REDIRECTED_OFFSITE = 'customer-redirected-offsite';

    public const TYPE_CUSTOMER_RETURNED = 'customer-returned';

    public const TYPE_DCC_OFFER_ACCEPTED = 'dcc-offer-accepted';

    public const TYPE_DCC_OFFER_FORCED = 'dcc-offer-forced';

    public const TYPE_DCC_OFFER_PRESENTED = 'dcc-offer-presented';

    public const TYPE_DCC_OFFER_REJECTED = 'dcc-offer-rejected';

    public const TYPE_DISPUTE_CHANGED = 'dispute-changed';

    public const TYPE_DISPUTE_CREATED = 'dispute-created';

    public const TYPE_DISPUTE_FORFEITED = 'dispute-forfeited';

    public const TYPE_DISPUTE_LOST = 'dispute-lost';

    public const TYPE_DISPUTE_RESPONDED = 'dispute-responded';

    public const TYPE_DISPUTE_WON = 'dispute-won';

    public const TYPE_GATEWAY_CONNECTION_FAILED = 'gateway-connection-failed';

    public const TYPE_GATEWAY_CONNECTION_TIMED_OUT = 'gateway-connection-timed-out';

    public const TYPE_GATEWAY_RESPONSE_RECEIVED = 'gateway-response-received';

    public const TYPE_OFFSITE_TRANSACTION_COMPLETED = 'offsite-transaction-completed';

    public const TYPE_QUICKBOOKS_PAYMENT_CREATED = 'quickbooks-payment-created';

    public const TYPE_QUICKBOOKS_REFUND_RECEIPT_CREATED = 'quickbooks-refund-receipt-created';

    public const TYPE_QUICKBOOKS_TRANSACTION_TASK_FAILED = 'quickbooks-transaction-task-failed';

    public const TYPE_RISK_SCORE_CHANGED = 'risk-score-changed';

    public const TYPE_TIMELINE_COMMENT_CREATED = 'timeline-comment-created';

    public const TYPE_TRANSACTION_ABANDONED = 'transaction-abandoned';

    public const TYPE_TRANSACTION_AMOUNT_DISCREPANCY_FOUND = 'transaction-amount-discrepancy-found';

    public const TYPE_TRANSACTION_APPROVED = 'transaction-approved';

    public const TYPE_TRANSACTION_CANCELED = 'transaction-canceled';

    public const TYPE_TRANSACTION_CAPTURE_DELAYED = 'transaction-capture-delayed';

    public const TYPE_TRANSACTION_CAPTURED = 'transaction-captured';

    public const TYPE_TRANSACTION_DECLINED = 'transaction-declined';

    public const TYPE_TRANSACTION_DISCREPANCY_FOUND = 'transaction-discrepancy-found';

    public const TYPE_TRANSACTION_DISPUTED = 'transaction-disputed';

    public const TYPE_TRANSACTION_INITIATED = 'transaction-initiated';

    public const TYPE_TRANSACTION_PAYMENT_METHOD_CHANGED = 'transaction-payment-method-changed';

    public const TYPE_TRANSACTION_PROCESS_REQUESTED = 'transaction-process-requested';

    public const TYPE_TRANSACTION_PROCESSED = 'transaction-processed';

    public const TYPE_TRANSACTION_QUERIED = 'transaction-queried';

    public const TYPE_TRANSACTION_RECONCILED = 'transaction-reconciled';

    public const TYPE_TRANSACTION_REFUNDED = 'transaction-refunded';

    public const TYPE_TRANSACTION_RETRIED = 'transaction-retried';

    public const TYPE_TRANSACTION_RULES_PROCESSED = 'transaction-rules-processed';

    public const TYPE_TRANSACTION_SCHEDULED_TIME_CHANGED = 'transaction-scheduled-time-changed';

    public const TYPE_TRANSACTION_TIMEOUT_RESOLVED = 'transaction-timeout-resolved';

    public const TYPE_TRANSACTION_UPDATED = 'transaction-updated';

    public const TYPE_TRANSACTION_VOIDED = 'transaction-voided';

    public const TYPE_TRANSACTION_WAITING_GATEWAY = 'transaction-waiting-gateway';

    public const TYPE_TRANSACTION_WAITING_GATEWAY_COMPLETED = 'transaction-waiting-gateway-completed';

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
     * @return null|SelfLink[]
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
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
