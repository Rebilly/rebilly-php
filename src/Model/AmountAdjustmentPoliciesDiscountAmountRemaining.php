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

use Rebilly\Sdk\Trait\HasMetadata;

class AmountAdjustmentPoliciesDiscountAmountRemaining implements AmountAdjustmentInstructionPartialAfterApprovalPolicy
{
    use HasMetadata;

    public function __construct(array $data = [], array $metadata = [])
    {
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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
