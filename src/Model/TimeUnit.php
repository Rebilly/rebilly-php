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

enum TimeUnit: string
{
    case SECOND = 'second';
    case MINUTE = 'minute';
    case HOUR = 'hour';
    case DAY = 'day';
    case MONTH = 'month';
    case YEAR = 'year';
}
