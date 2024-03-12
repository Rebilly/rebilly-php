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

class QuoteFactory
{
    public static function from(array $data = []): Quote
    {
        return match ($data['action']) {
            'change' => QuoteChangeOrder::from($data),
            'create' => QuoteCreateOrder::from($data),
            'reactivate' => QuoteReactivateOrder::from($data),
            'trial-conversion' => QuoteTrialConversionOrder::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
