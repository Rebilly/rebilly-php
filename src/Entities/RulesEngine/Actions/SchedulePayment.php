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

namespace Rebilly\Entities\RulesEngine\Actions;

use DomainException;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;
use Rebilly\Entities\RulesEngine\RuleAction;

/**
 * Class SchedulePayment.
 */
final class SchedulePayment extends RuleAction
{
    public const UNEXPECTED_POLICY = 'Unexpected policy. Only %s policies are supported';

    public const POLICY_INVOICE_AMOUNT_DUE = 'invoice-amount-due';

    /**
     * @return string[]|array
     */
    public static function amountPolicies(): array
    {
        return [
            self::POLICY_INVOICE_AMOUNT_DUE,
        ];
    }

    /**
     * @return ScheduleInstruction
     */
    public function getScheduleInstruction(): ScheduleInstruction
    {
        return $this->getAttribute('scheduleInstruction');
    }

    /**
     * @param ScheduleInstruction|array $value
     *
     * @return $this
     */
    public function setScheduleInstruction($value): self
    {
        return $this->setAttribute('scheduleInstruction', $value);
    }

    /**
     * @param ScheduleInstruction|array $value
     *
     * @return ScheduleInstruction
     */
    public function createScheduleInstruction($value): ScheduleInstruction
    {
        if ($value instanceof ScheduleInstruction) {
            return $value;
        }

        return ScheduleInstruction::createFromData((array) $value);
    }

    /**
     * @return string
     */
    public function getAmountPolicy(): string
    {
        return $this->getAttribute('amountPolicy');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAmountPolicy($value): self
    {
        if (!in_array($value, self::amountPolicies(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_POLICY, implode(', ', self::amountPolicies())));
        }

        return $this->setAttribute('amountPolicy', $value);
    }

    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_SCHEDULE_PAYMENT;
    }
}
