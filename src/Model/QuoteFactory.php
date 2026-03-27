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
    public static function from(array $data = [], array $metadata = []): Quote
    {
        return match ($data['type']) {
            'change' => ChangeQuote::from($data, $metadata),
            'creation' => CreationQuote::from($data, $metadata),
            'reactivation' => ReactivationQuote::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
