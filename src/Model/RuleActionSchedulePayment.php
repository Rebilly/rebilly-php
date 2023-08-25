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

class RuleActionSchedulePayment extends RuleAction
{
    public const AMOUNT_POLICY_INVOICE_AMOUNT_DUE = 'invoice-amount-due';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'schedule-payment',
        ] + $data);

        if (array_key_exists('scheduleInstruction', $data)) {
            $this->setScheduleInstruction($data['scheduleInstruction']);
        }
        if (array_key_exists('amountPolicy', $data)) {
            $this->setAmountPolicy($data['amountPolicy']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getScheduleInstruction(): ScheduleInstruction
    {
        return $this->fields['scheduleInstruction'];
    }

    public function setScheduleInstruction(ScheduleInstruction|array $scheduleInstruction): static
    {
        if (!($scheduleInstruction instanceof ScheduleInstruction)) {
            $scheduleInstruction = ScheduleInstructionFactory::from($scheduleInstruction);
        }

        $this->fields['scheduleInstruction'] = $scheduleInstruction;

        return $this;
    }

    public function getAmountPolicy(): string
    {
        return $this->fields['amountPolicy'];
    }

    public function setAmountPolicy(string $amountPolicy): static
    {
        $this->fields['amountPolicy'] = $amountPolicy;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('scheduleInstruction', $this->fields)) {
            $data['scheduleInstruction'] = $this->fields['scheduleInstruction']?->jsonSerialize();
        }
        if (array_key_exists('amountPolicy', $this->fields)) {
            $data['amountPolicy'] = $this->fields['amountPolicy'];
        }

        return parent::jsonSerialize() + $data;
    }
}
