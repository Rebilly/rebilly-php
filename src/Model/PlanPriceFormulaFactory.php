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
    public static function from(array $data = [], array $metadata = []): PlanPriceFormula
    {
        return match ($data['formula']) {
            'fixed-fee' => PlanFormulaFixedFee::from($data, $metadata),
            'flat-rate' => PlanFormulaFlatRate::from($data, $metadata),
            'stairstep' => PlanFormulaStairstep::from($data, $metadata),
            'tiered' => PlanFormulaTiered::from($data, $metadata),
            'volume' => PlanFormulaVolume::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
