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

enum PaymentCardBrand: string
{
    case VISA = 'Visa';
    case MASTER_CARD = 'MasterCard';
    case AMERICAN_EXPRESS = 'American Express';
    case DISCOVER = 'Discover';
    case MAESTRO = 'Maestro';
    case SOLO = 'Solo';
    case ELECTRON = 'Electron';
    case JCB = 'JCB';
    case VOYAGER = 'Voyager';
    case DINERS_CLUB = 'Diners Club';
    case _SWITCH = 'Switch';
    case LASER = 'Laser';
    case CHINA_UNION_PAY = 'China UnionPay';
    case ASTRO_PAY_CARD = 'AstroPay Card';
}
