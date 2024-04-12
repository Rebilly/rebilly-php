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

class AmountAdjustmentPoliciesDiscountAmountRemaining implements AmountAdjustmentInstructionPartialAfterApprovalPolicy
{
    public function __construct(array $data = [])
    {
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return 'discount-amount-remaining';
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'discount-amount-remaining',
        ];

        return $data;
    }
}
