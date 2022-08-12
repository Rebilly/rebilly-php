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

enum EddScore: string
{
    case NOT_FOUND = 'not-found';
    case UNLIKELY = 'unlikely';
    case UNCLEAR = 'unclear';
    case PROBABLE = 'probable';
    case CONFIRMED = 'confirmed';
}
