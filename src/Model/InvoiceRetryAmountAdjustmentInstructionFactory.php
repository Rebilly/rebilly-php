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

class InvoiceRetryAmountAdjustmentInstructionFactory
{
    public static function from(array $data = [], array $metadata = []): InvoiceRetryAmountAdjustmentInstruction
    {
        return match ($data['method']) {
            'none' => AmountAdjustmentInstructionNone::from($data, $metadata),
            'partial' => AmountAdjustmentInstructionPartial::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
