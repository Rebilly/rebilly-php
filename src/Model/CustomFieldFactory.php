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
    public static function from(array $data = []): CustomField
    {
        return match ($data['type']) {
            'array' => ArrayCustomField::from($data),
            'boolean' => BooleanCustomField::from($data),
            'date' => DateCustomField::from($data),
            'datetime' => DateTimeCustomField::from($data),
            'integer' => IntegerCustomField::from($data),
            'monetary' => MonetaryCustomField::from($data),
            'number' => NumberCustomField::from($data),
            'string' => StringCustomField::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
