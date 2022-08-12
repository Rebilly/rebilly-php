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

enum TimePluralUnit: string
{
    case SECONDS = 'seconds';
    case MINUTES = 'minutes';
    case HOURS = 'hours';
    case DAYS = 'days';
    case MONTHS = 'months';
    case YEARS = 'years';
}
