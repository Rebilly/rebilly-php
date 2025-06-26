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

class PaymentMethodMetadataSupportedCurrenciesFactory
{
    public static function from(array $data = []): PaymentMethodMetadataSupportedCurrencies
    {
        return match ($data['mode']) {
            'subset' => CurrenciesSubsetMetadata::from($data),
            'all' => CurrenciesUnrestrictedMetadata::from($data),
            'unknown' => CurrenciesUnrestrictedMetadata::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
