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

class CommonSubscriptionOrder extends CommonOrder
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_CANCELED = 'canceled';

    public const STATUS_CHURNED = 'churned';

    public const STATUS_PAUSED = 'paused';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_TRIAL_ENDED = 'trial-ended';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('inTrial', $data)) {
            $this->setInTrial($data['inTrial']);
        }
        if (array_key_exists('trial', $data)) {
            $this->setTrial($data['trial']);
        }
        if (array_key_exists('isTrialOnly', $data)) {
            $this->setIsTrialOnly($data['isTrialOnly']);
        }
        if (array_key_exists('invoiceTimeShift', $data)) {
            $this->setInvoiceTimeShift($data['invoiceTimeShift']);
        }
        if (array_key_exists('recurringInterval', $data)) {
            $this->setRecurringInterval($data['recurringInterval']);
        }
        if (array_key_exists('autopay', $data)) {
            $this->setAutopay($data['autopay']);
        }
        if (array_key_exists('startTime', $data)) {
            $this->setStartTime($data['startTime']);
        }
        if (array_key_exists('endTime', $data)) {
            $this->setEndTime($data['endTime']);
        }
        if (array_key_exists('renewalTime', $data)) {
            $this->setRenewalTime($data['renewalTime']);
        }
        if (array_key_exists('rebillNumber', $data)) {
            $this->setRebillNumber($data['rebillNumber']);
        }
        if (array_key_exists('lineItems', $data)) {
            $this->setLineItems($data['lineItems']);
        }
        if (array_key_exists('lineItemSubtotal', $data)) {
            $this->setLineItemSubtotal($data['lineItemSubtotal']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getInTrial(): ?bool
    {
        return $this->fields['inTrial'] ?? null;
    }

    public function getTrial(): ?CommonSubscriptionOrderTrial
    {
        return $this->fields['trial'] ?? null;
    }

    public function setTrial(null|CommonSubscriptionOrderTrial|array $trial): static
    {
        if ($trial !== null && !($trial instanceof CommonSubscriptionOrderTrial)) {
            $trial = CommonSubscriptionOrderTrial::from($trial);
        }

        $this->fields['trial'] = $trial;

        return $this;
    }

    public function getIsTrialOnly(): ?bool
    {
        return $this->fields['isTrialOnly'] ?? null;
    }

    public function setIsTrialOnly(null|bool $isTrialOnly): static
    {
        $this->fields['isTrialOnly'] = $isTrialOnly;

        return $this;
    }

    public function getInvoiceTimeShift(): ?InvoiceTimeShift
    {
        return $this->fields['invoiceTimeShift'] ?? null;
    }

    public function setInvoiceTimeShift(null|InvoiceTimeShift|array $invoiceTimeShift): static
    {
        if ($invoiceTimeShift !== null && !($invoiceTimeShift instanceof InvoiceTimeShift)) {
            $invoiceTimeShift = InvoiceTimeShift::from($invoiceTimeShift);
        }

        $this->fields['invoiceTimeShift'] = $invoiceTimeShift;

        return $this;
    }

    public function getRecurringInterval(): ?CommonSubscriptionOrderRecurringInterval
    {
        return $this->fields['recurringInterval'] ?? null;
    }

    public function setRecurringInterval(null|CommonSubscriptionOrderRecurringInterval|array $recurringInterval): static
    {
        if ($recurringInterval !== null && !($recurringInterval instanceof CommonSubscriptionOrderRecurringInterval)) {
            $recurringInterval = CommonSubscriptionOrderRecurringInterval::from($recurringInterval);
        }

        $this->fields['recurringInterval'] = $recurringInterval;

        return $this;
    }

    public function getAutopay(): ?bool
    {
        return $this->fields['autopay'] ?? null;
    }

    public function setAutopay(null|bool $autopay): static
    {
        $this->fields['autopay'] = $autopay;

        return $this;
    }

    public function getStartTime(): ?DateTimeImmutable
    {
        return $this->fields['startTime'] ?? null;
    }

    public function setStartTime(null|DateTimeImmutable|string $startTime): static
    {
        if ($startTime !== null && !($startTime instanceof DateTimeImmutable)) {
            $startTime = new DateTimeImmutable($startTime);
        }

        $this->fields['startTime'] = $startTime;

        return $this;
    }

    public function getEndTime(): ?DateTimeImmutable
    {
        return $this->fields['endTime'] ?? null;
    }

    public function getRenewalTime(): ?DateTimeImmutable
    {
        return $this->fields['renewalTime'] ?? null;
    }

    public function setRenewalTime(null|DateTimeImmutable|string $renewalTime): static
    {
        if ($renewalTime !== null && !($renewalTime instanceof DateTimeImmutable)) {
            $renewalTime = new DateTimeImmutable($renewalTime);
        }

        $this->fields['renewalTime'] = $renewalTime;

        return $this;
    }

    public function getRebillNumber(): ?int
    {
        return $this->fields['rebillNumber'] ?? null;
    }

    /**
     * @return null|UpcomingInvoiceItemCollection[]
     */
    public function getLineItems(): ?array
    {
        return $this->fields['lineItems'] ?? null;
    }

    public function getLineItemSubtotal(): ?CommonSubscriptionOrderLineItemSubtotal
    {
        return $this->fields['lineItemSubtotal'] ?? null;
    }

    public function setLineItemSubtotal(null|CommonSubscriptionOrderLineItemSubtotal|array $lineItemSubtotal): static
    {
        if ($lineItemSubtotal !== null && !($lineItemSubtotal instanceof CommonSubscriptionOrderLineItemSubtotal)) {
            $lineItemSubtotal = CommonSubscriptionOrderLineItemSubtotal::from($lineItemSubtotal);
        }

        $this->fields['lineItemSubtotal'] = $lineItemSubtotal;

        return $this;
    }

    public function getPaymentInstrumentId(): ?string
    {
        return $this->fields['paymentInstrumentId'] ?? null;
    }

    public function setPaymentInstrumentId(null|string $paymentInstrumentId): static
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('inTrial', $this->fields)) {
            $data['inTrial'] = $this->fields['inTrial'];
        }
        if (array_key_exists('trial', $this->fields)) {
            $data['trial'] = $this->fields['trial']?->jsonSerialize();
        }
        if (array_key_exists('isTrialOnly', $this->fields)) {
            $data['isTrialOnly'] = $this->fields['isTrialOnly'];
        }
        if (array_key_exists('invoiceTimeShift', $this->fields)) {
            $data['invoiceTimeShift'] = $this->fields['invoiceTimeShift']?->jsonSerialize();
        }
        if (array_key_exists('recurringInterval', $this->fields)) {
            $data['recurringInterval'] = $this->fields['recurringInterval']?->jsonSerialize();
        }
        if (array_key_exists('autopay', $this->fields)) {
            $data['autopay'] = $this->fields['autopay'];
        }
        if (array_key_exists('startTime', $this->fields)) {
            $data['startTime'] = $this->fields['startTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('endTime', $this->fields)) {
            $data['endTime'] = $this->fields['endTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('renewalTime', $this->fields)) {
            $data['renewalTime'] = $this->fields['renewalTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('rebillNumber', $this->fields)) {
            $data['rebillNumber'] = $this->fields['rebillNumber'];
        }
        if (array_key_exists('lineItems', $this->fields)) {
            $data['lineItems'] = $this->fields['lineItems'];
        }
        if (array_key_exists('lineItemSubtotal', $this->fields)) {
            $data['lineItemSubtotal'] = $this->fields['lineItemSubtotal']?->jsonSerialize();
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }

        return parent::jsonSerialize() + $data;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setInTrial(null|bool $inTrial): static
    {
        $this->fields['inTrial'] = $inTrial;

        return $this;
    }

    private function setEndTime(null|DateTimeImmutable|string $endTime): static
    {
        if ($endTime !== null && !($endTime instanceof DateTimeImmutable)) {
            $endTime = new DateTimeImmutable($endTime);
        }

        $this->fields['endTime'] = $endTime;

        return $this;
    }

    private function setRebillNumber(null|int $rebillNumber): static
    {
        $this->fields['rebillNumber'] = $rebillNumber;

        return $this;
    }

    /**
     * @param null|UpcomingInvoiceItemCollection[] $lineItems
     */
    private function setLineItems(null|array $lineItems): static
    {
        $lineItems = $lineItems !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof UpcomingInvoiceItemCollection ? $value : UpcomingInvoiceItemCollection::from($value)) : null, $lineItems) : null;

        $this->fields['lineItems'] = $lineItems;

        return $this;
    }
}
