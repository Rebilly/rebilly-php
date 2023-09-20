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

use JsonSerializable;

class AmountAdjustmentPoliciesNone implements AmountAdjustmentInstructionPartialAfterApprovalPolicy, JsonSerializable
{
    public function __construct()
    {
    }

    public static function from(): self
    {
        return new self();
    }

    public function getMethod(): string
    {
        return 'none';
    }

    public function jsonSerialize(): array
    {
        return [
            'method' => 'none',
        ];
    }
}
