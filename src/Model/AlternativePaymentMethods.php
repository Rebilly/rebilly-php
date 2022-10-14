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

enum AlternativePaymentMethods: string
{
    case CASH = 'cash';
    case CHECK = 'check';
    case PAYPAL = 'paypal';
    case ADV_CASH = 'AdvCash';
    case ALFA_CLICK = 'Alfa-click';
    case ALIPAY = 'Alipay';
    case ASTRO_PAY_CARD = 'AstroPay Card';
    case ASTRO_PAY_GO = 'AstroPay-GO';
    case BANK_REFERENCED = 'BankReferenced';
    case BANK_TRANSFER = 'bank-transfer';
    case BANK_TRANSFER_2 = 'bank-transfer-2';
    case BANK_TRANSFER_3 = 'bank-transfer-3';
    case BANK_TRANSFER_4 = 'bank-transfer-4';
    case BANK_TRANSFER_5 = 'bank-transfer-5';
    case BANK_TRANSFER_6 = 'bank-transfer-6';
    case BANK_TRANSFER_7 = 'bank-transfer-7';
    case BANK_TRANSFER_8 = 'bank-transfer-8';
    case BANK_TRANSFER_9 = 'bank-transfer-9';
    case BALOTO = 'Baloto';
    case BEELINE = 'Beeline';
    case BELFIUS_DIRECT_NET = 'Belfius-direct-net';
    case BITCOIN = 'bitcoin';
    case BIZUM = 'Bizum';
    case BOLETO = 'Boleto';
    case CASH_DEPOSIT = 'cash-deposit';
    case CAS_HLIB = 'CASHlib';
    case CASH_TO_CODE = 'CashToCode';
    case CHINA_UNION_PAY = 'China UnionPay';
    case CLEO = 'Cleo';
    case COD_VOUCHER = 'CODVoucher';
    case CONEKTA_OXXO = 'Conekta-oxxo';
    case CUPON_DE_PAGOS = 'Cupon-de-pagos';
    case CRYPTOCURRENCY = 'cryptocurrency';
    case DOMESTIC_CARDS = 'domestic-cards';
    case ECHECK = 'echeck';
    case ECO_PAYZ = 'ecoPayz';
    case ECO_VOUCHER = 'ecoVoucher';
    case EFECTY = 'Efecty';
    case EPS = 'EPS';
    case E_PAY_BG = 'ePay.bg';
    case E_ZEE_WALLET = 'eZeeWallet';
    case FASTER_PAY = 'FasterPay';
    case FLEXEPIN = 'Flexepin';
    case GIROPAY = 'Giropay';
    case GPAYSAFE = 'Gpaysafe';
    case GOOGLE_PAY = 'Google Pay';
    case I_DEBIT = 'iDebit';
    case I_DEAL = 'iDEAL';
    case ING_HOMEPAY = 'ING-homepay';
    case INOVAPAY_PIN = 'INOVAPAY-pin';
    case INOVAPAY_WALLET = 'INOVAPAY-wallet';
    case INSTA_DEBIT = 'InstaDebit';
    case INSTANT_BANK_TRANSFER = 'instant-bank-transfer';
    case INSTANT_PAYMENTS = 'InstantPayments';
    case INTERAC = 'Interac';
    case INTERAC_ONLINE = 'Interac-online';
    case INTERAC_E_TRANSFER = 'Interac-eTransfer';
    case INVOICE = 'invoice';
    case I_WALLET = 'iWallet';
    case JETON = 'Jeton';
    case JPAY = 'jpay';
    case KHELOCARD = 'Khelocard';
    case KLARNA = 'Klarna';
    case KNOT = 'KNOT';
    case LOONIE = 'loonie';
    case MATRIX = 'Matrix';
    case MAXI_CASH = 'MaxiCash';
    case MEGAFON = 'Megafon';
    case MI_FINITY_E_WALLET = 'MiFinity-eWallet';
    case MISCELLANEOUS = 'miscellaneous';
    case BANCONTACT = 'Bancontact';
    case BANCONTACT_MOBILE = 'Bancontact-mobile';
    case MTS = 'MTS';
    case MUCH_BETTER = 'MuchBetter';
    case MULTIBANCO = 'Multibanco';
    case NEOSURF = 'Neosurf';
    case NETBANKING = 'Netbanking';
    case NETELLER = 'Neteller';
    case NORDEA_SOLO = 'Nordea-Solo';
    case OCHA_PAY = 'OchaPay';
    case ONLINE_BANK_TRANSFER = 'online-bank-transfer';
    case ONLINEUEBERWEISEN = 'Onlineueberweisen';
    case ORIENTAL_WALLET = 'oriental-wallet';
    case OXXO = 'OXXO';
    case P24 = 'P24';
    case PAGADITO = 'Pagadito';
    case PAGO_EFFECTIVO = 'PagoEffectivo';
    case PAGSMILE_DEPOSIT_EXPRESS = 'Pagsmile-deposit-express';
    case PAGSMILE_LOTTERY = 'Pagsmile-lottery';
    case PAY_CASH = 'PayCash';
    case PAYEER = 'Payeer';
    case PAYMENT_ASIA_CRYPTO = 'PaymentAsia-crypto';
    case PAYMERO = 'Paymero';
    case PERFECT_MONEY = 'Perfect-money';
    case PIASTRIX = 'Piastrix';
    case PLAID_ACCOUNT = 'plaid-account';
    case PAY_TABS = 'PayTabs';
    case PAYSAFECARD = 'Paysafecard';
    case PAYSAFECASH = 'Paysafecash';
    case PAY4_FUN = 'Pay4Fun';
    case PAYNOTE = 'Paynote';
    case PIN_PAY = 'PinPay';
    case PHONE = 'phone';
    case PHONE_PE = 'PhonePe';
    case POLI = 'POLi';
    case POST_FINANCE_CARD = 'PostFinance-card';
    case POST_FINANCE_E_FINANCE = 'PostFinance-e-finance';
    case QIWI = 'QIWI';
    case Q_PAY = 'QPay';
    case QQ_PAY = 'QQPay';
    case RAPYD_CHECKOUT = 'rapyd-checkout';
    case RESURS = 'Resurs';
    case SAFETY_PAY = 'SafetyPay';
    case SEPA = 'SEPA';
    case SKRILL = 'Skrill';
    case SKRILL_RAPID_TRANSFER = 'Skrill Rapid Transfer';
    case SMS_VOUCHER = 'SMSVoucher';
    case SOFORT = 'Sofort';
    case SPARK_PAY = 'SparkPay';
    case SWIFT_DBT = 'swift-dbt';
    case TELE2 = 'Tele2';
    case TERMINALY_RF = 'Terminaly-RF';
    case TODITO_CASH_CARD = 'ToditoCash-card';
    case TRUSTLY = 'Trustly';
    case U_PAY_CARD = 'UPayCard';
    case UPI = 'UPI';
    case USD_COIN = 'USD-coin';
    case V_CREDITOS = 'VCreditos';
    case VENUS_POINT = 'VenusPoint';
    case VOUCHER = 'voucher';
    case VOUCHER_2 = 'voucher-2';
    case VOUCHER_3 = 'voucher-3';
    case VOUCHER_4 = 'voucher-4';
    case WEBMONEY = 'Webmoney';
    case WEBPAY = 'Webpay';
    case WEBPAY_2 = 'Webpay-2';
    case WEBPAY_CARD = 'Webpay Card';
    case WE_CHAT_PAY = 'WeChat Pay';
    case X_PAY_P2_P = 'XPay-P2P';
    case X_PAY_QR = 'XPay-QR';
    case YANDEX_MONEY = 'Yandex-money';
    case ZOTAPAY = 'Zotapay';
    case ZIMPLER = 'Zimpler';
}
