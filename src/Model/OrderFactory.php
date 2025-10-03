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

class OrderFactory
{
    public static function from(array $data = []): Order
    {
        return match ($data['type']) {
            'one-time' => OneTimeOrder::from($data),
            'recurring' => RecurringOrder::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
