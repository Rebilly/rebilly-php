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

class SchedulePayment extends RuleAction
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

    public function getScheduleInstruction(): CommonScheduleInstruction
    {
        return $this->fields['scheduleInstruction'];
    }

    public function setScheduleInstruction(CommonScheduleInstruction|array $scheduleInstruction): self
    {
        if (!($scheduleInstruction instanceof \Rebilly\Sdk\Model\CommonScheduleInstruction)) {
            $scheduleInstruction = \Rebilly\Sdk\Model\CommonScheduleInstruction::from($scheduleInstruction);
        }

        $this->fields['scheduleInstruction'] = $scheduleInstruction;

        return $this;
    }

    /**
     * @psalm-return self::AMOUNT_POLICY_* $amountPolicy
     */
    public function getAmountPolicy(): string
    {
        return $this->fields['amountPolicy'];
    }

    /**
     * @psalm-param self::AMOUNT_POLICY_* $amountPolicy
     */
    public function setAmountPolicy(string $amountPolicy): self
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
