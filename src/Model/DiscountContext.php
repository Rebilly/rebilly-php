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

enum DiscountContext: string
{
    case ITEMS = 'items';
    case SHIPPING = 'shipping';
    case ITEMS_AND_SHIPPING = 'items-and-shipping';
}
