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

class PayoutRequestTimelineMessage implements JsonSerializable
{
    public const TYPE_TIMELINE_COMMENT_CREATED = 'timeline-comment-created';

    public const TYPE_PAYOUT_REQUEST_CREATED = 'payout-request-created';

    public const TYPE_PAYOUT_REQUEST_FLUSHED = 'payout-request-flushed';

    public const TYPE_PAYOUT_REQUEST_FLUSH_UNDONE = 'payout-request-flush-undone';

    public const TYPE_PAYOUT_REQUEST_APPROVED = 'payout-request-approved';

    public const TYPE_PAYOUT_REQUEST_APPROVAL_UNDONE = 'payout-request-approval-undone';

    public const TYPE_PAYOUT_REQUEST_ALLOCATED = 'payout-request-allocated';

    public const TYPE_PAYOUT_REQUEST_PROCESSING_STARTED = 'payout-request-processing-started';

    public const TYPE_PAYOUT_REQUEST_FULFILLED = 'payout-request-fulfilled';

    public const TYPE_PAYOUT_REQUEST_CANCELED = 'payout-request-canceled';

    public const TYPE_PAYOUT_REQUEST_REVERSED = 'payout-request-reversed';

    public const TYPE_PAYOUT_REQUEST_BLOCKED = 'payout-request-blocked';

    public const TYPE_PAYOUT_REQUEST_UNBLOCKED = 'payout-request-unblocked';

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
        if (array_key_exists('occurredTime', $data)) {
            $this->setOccurredTime($data['occurredTime']);
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): string
    {
        return $this->fields['id'];
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function getOccurredTime(): DateTimeImmutable
    {
        return $this->fields['occurredTime'];
    }

    public function getTriggeredBy(): string
    {
        return $this->fields['triggeredBy'];
    }

    public function getMessage(): string
    {
        return $this->fields['message'];
    }

    public function setMessage(string $message): static
    {
        $this->fields['message'] = $message;

        return $this;
    }

    public function getExtraData(): TimelineExtraData
    {
        return $this->fields['extraData'];
    }

    public function setExtraData(TimelineExtraData|array $extraData): static
    {
        if (!($extraData instanceof TimelineExtraData)) {
            $extraData = TimelineExtraData::from($extraData);
        }

        $this->fields['extraData'] = $extraData;

        return $this;
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
        if (array_key_exists('occurredTime', $this->fields)) {
            $data['occurredTime'] = $this->fields['occurredTime']->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('triggeredBy', $this->fields)) {
            $data['triggeredBy'] = $this->fields['triggeredBy'];
        }
        if (array_key_exists('message', $this->fields)) {
            $data['message'] = $this->fields['message'];
        }
        if (array_key_exists('extraData', $this->fields)) {
            $data['extraData'] = $this->fields['extraData']->jsonSerialize();
        }

        return $data;
    }

    private function setId(string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setOccurredTime(DateTimeImmutable|string $occurredTime): static
    {
        if (!($occurredTime instanceof DateTimeImmutable)) {
            $occurredTime = new DateTimeImmutable($occurredTime);
        }

        $this->fields['occurredTime'] = $occurredTime;

        return $this;
    }

    private function setTriggeredBy(string $triggeredBy): static
    {
        $this->fields['triggeredBy'] = $triggeredBy;

        return $this;
    }
}
