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

class PartialAfterApprovalPolicyFactory
{
    public static function from(array $data = []): PartialAfterApprovalPolicy
    {
        return match ($data['method']) {
            'discount-amount-remaining' => DiscountAmountRemaining::from($data),
            'none' => None::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
