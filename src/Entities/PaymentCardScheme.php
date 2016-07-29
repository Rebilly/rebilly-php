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
 * Payment cards schemes.
 */
interface PaymentCardScheme
{
    const SCHEME_VISA = 'Visa';
    const SCHEME_MASTERCARD = 'MasterCard';
    const SCHEME_AMERICAN_EXPRESS = 'American Express';
    const SCHEME_DISCOVER = 'Discover';
    const SCHEME_MAESTRO = 'Maestro';
    const SCHEME_SOLO = 'Solo';
    const SCHEME_ELECTRON = 'Electron';
    const SCHEME_JCB = 'JCB';
    const SCHEME_VOYAGER = 'Voyager';
    const SCHEME_DINERS_CLUB = 'Diners Club';
    const SCHEME_SWITCH = 'Switch';
    const SCHEME_LASER = 'Laser';
    const SCHEME_CHINA_UNIONPAY = 'China UnionPay';
}
