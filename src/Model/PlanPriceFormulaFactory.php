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

class PlanPriceFormulaFactory
{
    public static function from(array $data = []): PlanPriceFormula
    {
        return match ($data['formula']) {
            'fixed-fee' => PlanFormulaFixedFee::from($data),
            'flat-rate' => PlanFormulaFlatRate::from($data),
            'stairstep' => PlanFormulaStairstep::from($data),
            'tiered' => PlanFormulaTiered::from($data),
            'volume' => PlanFormulaVolume::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
