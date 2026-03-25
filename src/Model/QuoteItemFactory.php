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

class QuoteItemFactory
{
    public static function from(array $data = [], array $metadata = []): QuoteItem
    {
        return match ($data['type']) {
            'one-time-sale' => QuoteOneTimeSaleItem::from($data, $metadata),
            'subscription' => QuoteSubscriptionItem::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
