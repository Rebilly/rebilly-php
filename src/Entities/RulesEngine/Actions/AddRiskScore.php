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

use Rebilly\Entities\RulesEngine\RuleAction;

/**
 * Class AddRiskScore.
 */
final class AddRiskScore extends RuleAction
{
    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->getAttribute('score');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setScore($value): self
    {
        return $this->setAttribute('score', $value);
    }

    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_ADD_RISK_SCORE;
    }
}
