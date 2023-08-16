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

class TrialOnlyPlan extends CommonPlan
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('trial', $data)) {
            $this->setTrial($data['trial']);
        }
        if (array_key_exists('invoiceTimeShift', $data)) {
            $this->setInvoiceTimeShift($data['invoiceTimeShift']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return array{price:float,period:PlanPeriod}
     */
    public function getTrial(): array
    {
        return $this->fields['trial'];
    }

    /**
     * @param array{price:float,period:PlanPeriod} $trial
     */
    public function setTrial(array $trial): static
    {
        if (!isset($trial['price'])) {
            throw new InvalidArgumentException('Property \'trial.price\' must be set.');
        }
        $trial['period'] = $trial['period'] instanceof PlanPeriod ? $trial['period'] : PlanPeriod::from($trial['period']);

        $this->fields['trial'] = $trial;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('trial', $this->fields)) {
            $data['trial'] = $this->fields['trial'];
        }
        if (array_key_exists('invoiceTimeShift', $this->fields)) {
            $data['invoiceTimeShift'] = $this->fields['invoiceTimeShift']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
