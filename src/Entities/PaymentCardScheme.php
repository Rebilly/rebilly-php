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

namespace Rebilly\Entities;

/**
 * Payment cards schemes.
 */
interface PaymentCardScheme
{
    public const SCHEME_VISA = 'Visa';

    public const SCHEME_MASTERCARD = 'MasterCard';

    public const SCHEME_AMERICAN_EXPRESS = 'American Express';

    public const SCHEME_DISCOVER = 'Discover';

    public const SCHEME_MAESTRO = 'Maestro';

    public const SCHEME_SOLO = 'Solo';

    public const SCHEME_ELECTRON = 'Electron';

    public const SCHEME_JCB = 'JCB';

    public const SCHEME_VOYAGER = 'Voyager';

    public const SCHEME_DINERS_CLUB = 'Diners Club';

    public const SCHEME_SWITCH = 'Switch';

    public const SCHEME_LASER = 'Laser';

    public const SCHEME_CHINA_UNIONPAY = 'China UnionPay';
}
