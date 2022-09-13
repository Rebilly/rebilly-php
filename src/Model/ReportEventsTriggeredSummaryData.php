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

class ReportEventsTriggeredSummaryData implements JsonSerializable
{
    public const EVENT_NAME_DISPUTE_CREATED = 'dispute-created';

    public const EVENT_NAME_GATEWAY_ACCOUNT_REQUESTED = 'gateway-account-requested';

    public const EVENT_NAME_TRANSACTION_PROCESSED = 'transaction-processed';

    public const EVENT_NAME_SUBSCRIPTION_CANCELED = 'subscription-canceled';

    public const EVENT_NAME_SUBSCRIPTION_RENEWED = 'subscription-renewed';

    public const EVENT_NAME_PAYMENT_CARD_EXPIRED = 'payment-card-expired';

    public const EVENT_NAME_PAYMENT_DECLINED = 'payment-declined';

    public const EVENT_NAME_TRANSACTION_PROCESS_REQUESTED = 'transaction-process-requested';

    public const EVENT_NAME_RISK_SCORE_CHANGED = 'risk-score-changed';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('eventName', $data)) {
            $this->setEventName($data['eventName']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::EVENT_NAME_*|null $eventName
     */
    public function getEventName(): ?string
    {
        return $this->fields['eventName'] ?? null;
    }

    /**
     * @psalm-param self::EVENT_NAME_*|null $eventName
     */
    public function setEventName(null|string $eventName): self
    {
        $this->fields['eventName'] = $eventName;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    public function setCount(null|int $count): self
    {
        $this->fields['count'] = $count;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('eventName', $this->fields)) {
            $data['eventName'] = $this->fields['eventName'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }

        return $data;
    }
}
