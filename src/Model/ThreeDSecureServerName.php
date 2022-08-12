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

enum ThreeDSecureServerName: string
{
    case PAYVISION3DS_SERVER = 'Payvision3dsServer';
    case WIRECARD3DS_SERVER = 'Wirecard3dsServer';
    case ILIXIUM3DS_SERVER = 'Ilixium3dsServer';
    case DATA_CASH3DS_SERVER = 'DataCash3dsServer';
    case PAYSAFE3DS_SERVER = 'Paysafe3dsServer';
    case INGENICO3DS_SERVER = 'Ingenico3dsServer';
    case PANAMERICAN3DS_SERVER = 'Panamerican3dsServer';
    case E_MERCHANT_PAY3DS_SERVER = 'eMerchantPay3dsServer';
    case SECURE_TRADING3DS_SERVER = 'SecureTrading3dsServer';
    case CLEARHAUS3DS_SERVER = 'Clearhaus3dsServer';
    case OTHER = 'Other';
    case THREE_D_SECURE_IO3DS_SERVER = 'ThreeDSecureIO3dsServer';
    case WORLDLINE_ATOS_FRANKFURT3DS_SERVER = 'WorldlineAtosFrankfurt3dsServer';
    case PIASTRIX3DS_SERVER = 'Piastrix3dsServer';
    case N_GENIUS3DS_SERVER = 'NGenius3dsServer';
    case STRIPE3DS_SERVER = 'Stripe3dsServer';
}
