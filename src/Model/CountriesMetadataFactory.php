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

class CountriesMetadataFactory
{
    public static function from(array $data = []): CountriesMetadata
    {
        return match ($data['mode']) {
            'subset' => CountriesSubsetMetadata::from($data),
            'all' => CountriesUnrestrictedMetadata::from($data),
            'unknown' => CountriesUnrestrictedMetadata::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
