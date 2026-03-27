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

class PostReadyToPayFactory
{
    public static function from(array $data = [], array $metadata = []): PostReadyToPay
    {
        if (isset($data['amount']) || isset($data['currency'])) {
            return ReadyToPayAmount::from($data, $metadata);
        }
        if (isset($data['items'])) {
            return ReadyToPayItems::from($data, $metadata);
        }

        throw new UnknownDiscriminatorValueException();
    }
}
