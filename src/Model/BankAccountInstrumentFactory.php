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

class BankAccountInstrumentFactory
{
    public static function from(array $data = [], array $metadata = []): BankAccountInstrument
    {
        return match ($data['accountNumberType']) {
            'BBAN' => BBANInstrument::from($data, $metadata),
            'IBAN' => IBANInstrument::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
