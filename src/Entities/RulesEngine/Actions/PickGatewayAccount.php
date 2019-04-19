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

use Rebilly\Entities\RulesEngine\Actions\GatewayAccountPick\Instruction;
use Rebilly\Entities\RulesEngine\RuleAction;

/**
 * Class PickGatewayAccount.
 */
final class PickGatewayAccount extends RuleAction
{
    /**
     * @return Instruction
     */
    public function getPickInstruction(): Instruction
    {
        return $this->getAttribute('pickInstruction');
    }

    /**
     * @param Instruction $value
     *
     * @return $this
     */
    public function setPickInstruction($value): self
    {
        return $this->setAttribute('pickInstruction', $value);
    }

    /**
     * @param array $value
     *
     * @return Instruction
     */
    public function createPickInstruction($value): Instruction
    {
        return Instruction::createFromData($value);
    }

    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_PICK_GATEWAY_ACCOUNT;
    }
}
