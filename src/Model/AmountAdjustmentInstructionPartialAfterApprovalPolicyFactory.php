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

use Rebilly\Sdk\Exception\UnknownDiscriminatorValueException;

class AmountAdjustmentInstructionPartialAfterApprovalPolicyFactory
{
    public static function from(array $data = []): AmountAdjustmentInstructionPartialAfterApprovalPolicy
    {
        return match ($data['method']) {
            'discount-amount-remaining' => AmountAdjustmentPoliciesDiscountAmountRemaining::from($data),
            'none' => AmountAdjustmentPoliciesNone::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
