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
 * Class GuessPaymentCardExpiration.
 */
final class GuessPaymentCardExpiration extends RuleAction
{
    /**
     * @inheritdoc
     */
    public function actionName(): string
    {
        return self::NAME_GUESS_PAYMENT_CARD_EXPIRATION;
    }
}
