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
    public static function from(array $data = [], array $metadata = []): CountriesMetadata
    {
        return match ($data['mode']) {
            'subset' => CountriesSubsetMetadata::from($data, $metadata),
            'all' => CountriesUnrestrictedMetadata::from($data, $metadata),
            'unknown' => CountriesUnrestrictedMetadata::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
