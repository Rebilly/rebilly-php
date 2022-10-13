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

use InvalidArgumentException;

class SubscriptionOrderPlan extends CommonPlan
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('recurringInterval', $data)) {
            $this->setRecurringInterval($data['recurringInterval']);
        }
        if (array_key_exists('trial', $data)) {
            $this->setTrial($data['trial']);
        }
        if (array_key_exists('meteredBilling', $data)) {
            $this->setMeteredBilling($data['meteredBilling']);
        }
        if (array_key_exists('invoiceTimeShift', $data)) {
            $this->setInvoiceTimeShift($data['invoiceTimeShift']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRecurringInterval(): PlanPeriod
    {
        return $this->fields['recurringInterval'];
    }

    public function setRecurringInterval(PlanPeriod|array $recurringInterval): self
    {
        if (!($recurringInterval instanceof PlanPeriod)) {
            $recurringInterval = PlanPeriod::from($recurringInterval);
        }

        $this->fields['recurringInterval'] = $recurringInterval;

        return $this;
    }

    /**
     * @return null|array{price:float,period:PlanPeriod}
     */
    public function getTrial(): ?array
    {
        return $this->fields['trial'] ?? null;
    }

    /**
     * @param null|array{price:float,period:PlanPeriod} $trial
     */
    public function setTrial(null|array $trial): self
    {
        if ($trial !== null) {
            if (!isset($trial['price'])) {
                throw new InvalidArgumentException('Property \'trial.price\' must be set.');
            }
            $trial['period'] = $trial['period'] instanceof PlanPeriod ? $trial['period'] : PlanPeriod::from($trial['period']);
        }

        $this->fields['trial'] = $trial;

        return $this;
    }

    /**
     * @return null|array{strategy:string,min:float,max:float}
     */
    public function getMeteredBilling(): ?array
    {
        return $this->fields['meteredBilling'] ?? null;
    }

    /**
     * @param null|array{strategy:string,min:float,max:float} $meteredBilling
     */
    public function setMeteredBilling(null|array $meteredBilling): self
    {
        if ($meteredBilling !== null) {
            if (!isset($meteredBilling['strategy'])) {
                throw new InvalidArgumentException('Property \'meteredBilling.strategy\' must be set.');
            }
            $meteredBilling['min'] = $meteredBilling['min'] ?? null;
            $meteredBilling['max'] = $meteredBilling['max'] ?? null;
        }

        $this->fields['meteredBilling'] = $meteredBilling;

        return $this;
    }

    public function getInvoiceTimeShift(): ?InvoiceTimeShift
    {
        return $this->fields['invoiceTimeShift'] ?? null;
    }

    public function setInvoiceTimeShift(null|InvoiceTimeShift|array $invoiceTimeShift): self
    {
        if ($invoiceTimeShift !== null && !($invoiceTimeShift instanceof InvoiceTimeShift)) {
            $invoiceTimeShift = InvoiceTimeShift::from($invoiceTimeShift);
        }

        $this->fields['invoiceTimeShift'] = $invoiceTimeShift;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('recurringInterval', $this->fields)) {
            $data['recurringInterval'] = $this->fields['recurringInterval']?->jsonSerialize();
        }
        if (array_key_exists('trial', $this->fields)) {
            $data['trial'] = $this->fields['trial'];
        }
        if (array_key_exists('meteredBilling', $this->fields)) {
            $data['meteredBilling'] = $this->fields['meteredBilling'];
        }
        if (array_key_exists('invoiceTimeShift', $this->fields)) {
            $data['invoiceTimeShift'] = $this->fields['invoiceTimeShift']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
