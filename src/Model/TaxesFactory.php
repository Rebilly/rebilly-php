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

class TaxesFactory
{
    public static function from(array $data = []): Taxes
    {
        return match ($data['calculator']) {
            'manual' => Manual::from($data),
            'rebilly-avalara' => RebillyAvalara::from($data),
            'rebilly-taxjar' => RebillyTaxjar::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
