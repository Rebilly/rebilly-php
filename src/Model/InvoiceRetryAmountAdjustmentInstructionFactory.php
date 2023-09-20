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
    public static function from(array $data = []): InvoiceRetryAmountAdjustmentInstruction
    {
        return match ($data['method']) {
            'none' => AmountAdjustmentInstructionNone::from($data),
            'partial' => AmountAdjustmentInstructionPartial::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
