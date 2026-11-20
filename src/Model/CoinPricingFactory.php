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

class CoinPricingFactory
{
    public static function from(array $data = [], array $metadata = []): CoinPricing
    {
        return match ($data['formula']) {
            'flat-rate' => CoinPricingFlatRate::from($data, $metadata),
            'volume' => CoinPricingVolume::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
