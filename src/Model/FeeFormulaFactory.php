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

class FeeFormulaFactory
{
    public static function from(array $data = []): FeeFormula
    {
        return match ($data['type']) {
            'fixed-fee' => FixedFeeFormula::from($data),
            'percentage' => PercentageFeeFormula::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
