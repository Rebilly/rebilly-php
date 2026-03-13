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

class CustomFieldFactory
{
    public static function from(array $data = [], array $metadata = []): CustomField
    {
        return match ($data['type']) {
            'array' => ArrayCustomField::from($data, $metadata),
            'boolean' => BooleanCustomField::from($data, $metadata),
            'date' => DateCustomField::from($data, $metadata),
            'datetime' => DateTimeCustomField::from($data, $metadata),
            'integer' => IntegerCustomField::from($data, $metadata),
            'monetary' => MonetaryCustomField::from($data, $metadata),
            'number' => NumberCustomField::from($data, $metadata),
            'string' => StringCustomField::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
