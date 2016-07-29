<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

/**
 * Payment cards associations names.
 */
interface CardAssociation
{
    const BRAND_VISA = 'Visa';
    const BRAND_MASTERCARD = 'MasterCard';
    const BRAND_AMERICAN_EXPRESS = 'American Express';
    const BRAND_DISCOVER = 'Discover';
    const BRAND_MAESTRO = 'Maestro';
    const BRAND_SOLO = 'Solo';
    const BRAND_ELECTRON = 'Electron';
    const BRAND_JCB = 'JCB';
    const BRAND_VOYAGER = 'Voyager';
    const BRAND_DINERS_CLUB = 'Diners Club';
    const BRAND_SWITCH = 'Switch';
    const BRAND_LASER = 'Laser';
    const BRAND_CHINA_UNIONPAY = 'China UnionPay';
}
