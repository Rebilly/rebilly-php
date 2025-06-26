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

class AdjustReadyToPayoutGeneric implements AdjustReadyToPayoutPaymentMethod
{
    public const PAYMENT_METHOD_CASH = 'cash';

    public const PAYMENT_METHOD_CHECK = 'check';

    public const PAYMENT_METHOD_ADV_CASH = 'AdvCash';

    public const PAYMENT_METHOD_AFFIRM = 'Affirm';

    public const PAYMENT_METHOD_AFTERPAY = 'Afterpay';

    public const PAYMENT_METHOD_AIRCASH = 'Aircash';

    public const PAYMENT_METHOD_ALFA_CLICK = 'Alfa-click';

    public const PAYMENT_METHOD_ALIPAY = 'Alipay';

    public const PAYMENT_METHOD_ASTRO_PAY_CARD = 'AstroPay Card';

    public const PAYMENT_METHOD_ASTRO_PAY_GO = 'AstroPay-GO';

    public const PAYMENT_METHOD_BANK_REFERENCED = 'BankReferenced';

    public const PAYMENT_METHOD_BANK_TRANSFER = 'bank-transfer';

    public const PAYMENT_METHOD_BANK_TRANSFER_2 = 'bank-transfer-2';

    public const PAYMENT_METHOD_BANK_TRANSFER_3 = 'bank-transfer-3';

    public const PAYMENT_METHOD_BANK_TRANSFER_4 = 'bank-transfer-4';

    public const PAYMENT_METHOD_BANK_TRANSFER_5 = 'bank-transfer-5';

    public const PAYMENT_METHOD_BANK_TRANSFER_6 = 'bank-transfer-6';

    public const PAYMENT_METHOD_BANK_TRANSFER_7 = 'bank-transfer-7';

    public const PAYMENT_METHOD_BANK_TRANSFER_8 = 'bank-transfer-8';

    public const PAYMENT_METHOD_BANK_TRANSFER_9 = 'bank-transfer-9';

    public const PAYMENT_METHOD_BALOTO = 'Baloto';

    public const PAYMENT_METHOD_BEELINE = 'Beeline';

    public const PAYMENT_METHOD_BELFIUS_DIRECT_NET = 'Belfius-direct-net';

    public const PAYMENT_METHOD_BITCOIN = 'bitcoin';

    public const PAYMENT_METHOD_BIZUM = 'Bizum';

    public const PAYMENT_METHOD_BOLETO = 'Boleto';

    public const PAYMENT_METHOD_CASH_DEPOSIT = 'cash-deposit';

    public const PAYMENT_METHOD_CAS_HLIB = 'CASHlib';

    public const PAYMENT_METHOD_CASH_TO_CODE = 'CashToCode';

    public const PAYMENT_METHOD_CHINA_UNION_PAY = 'China UnionPay';

    public const PAYMENT_METHOD_CLEARPAY = 'Clearpay';

    public const PAYMENT_METHOD_CLEO = 'Cleo';

    public const PAYMENT_METHOD_COD_VOUCHER = 'CODVoucher';

    public const PAYMENT_METHOD_CONEKTA_OXXO = 'Conekta-oxxo';

    public const PAYMENT_METHOD_CUPON_DE_PAGOS = 'Cupon-de-pagos';

    public const PAYMENT_METHOD_CRYPTOCURRENCY = 'cryptocurrency';

    public const PAYMENT_METHOD_DOMESTIC_CARDS = 'domestic-cards';

    public const PAYMENT_METHOD_DIRECTA24_CARD = 'Directa24Card';

    public const PAYMENT_METHOD_ECO_PAYZ = 'ecoPayz';

    public const PAYMENT_METHOD_ECO_VOUCHER = 'ecoVoucher';

    public const PAYMENT_METHOD_EFECTY = 'Efecty';

    public const PAYMENT_METHOD_EPS = 'EPS';

    public const PAYMENT_METHOD_E_PAY_BG = 'ePay.bg';

    public const PAYMENT_METHOD_E_ZEE_WALLET = 'eZeeWallet';

    public const PAYMENT_METHOD_FASTER_PAY = 'FasterPay';

    public const PAYMENT_METHOD_FLEXEPIN = 'Flexepin';

    public const PAYMENT_METHOD_GIROPAY = 'Giropay';

    public const PAYMENT_METHOD_GPAYSAFE = 'Gpaysafe';

    public const PAYMENT_METHOD_GOOGLE_PAY = 'Google Pay';

    public const PAYMENT_METHOD_I_DEBIT = 'iDebit';

    public const PAYMENT_METHOD_I_DEAL = 'iDEAL';

    public const PAYMENT_METHOD_ING_HOMEPAY = 'ING-homepay';

    public const PAYMENT_METHOD_INOVAPAY_PIN = 'INOVAPAY-pin';

    public const PAYMENT_METHOD_INOVAPAY_WALLET = 'INOVAPAY-wallet';

    public const PAYMENT_METHOD_INSTA_DEBIT = 'InstaDebit';

    public const PAYMENT_METHOD_INSTANT_BANK_TRANSFER = 'instant-bank-transfer';

    public const PAYMENT_METHOD_INSTANT_PAYMENTS = 'InstantPayments';

    public const PAYMENT_METHOD_INTERAC = 'Interac';

    public const PAYMENT_METHOD_INTERAC_ONLINE = 'Interac-online';

    public const PAYMENT_METHOD_INTERAC_E_TRANSFER = 'Interac-eTransfer';

    public const PAYMENT_METHOD_INVOICE = 'invoice';

    public const PAYMENT_METHOD_I_WALLET = 'iWallet';

    public const PAYMENT_METHOD_JETON = 'Jeton';

    public const PAYMENT_METHOD_JETON_CASH = 'JetonCash';

    public const PAYMENT_METHOD_JPAY = 'jpay';

    public const PAYMENT_METHOD_KAKAO_PAY = 'KakaoPay';

    public const PAYMENT_METHOD_KNOT = 'KNOT';

    public const PAYMENT_METHOD_LOONIE = 'loonie';

    public const PAYMENT_METHOD_MATRIX = 'Matrix';

    public const PAYMENT_METHOD_MAXI_CASH = 'MaxiCash';

    public const PAYMENT_METHOD_MEGAFON = 'Megafon';

    public const PAYMENT_METHOD_MERCADO_PAGO = 'MercadoPago';

    public const PAYMENT_METHOD_MI_FINITY_E_WALLET = 'MiFinity-eWallet';

    public const PAYMENT_METHOD_MISCELLANEOUS = 'miscellaneous';

    public const PAYMENT_METHOD_MOBILE_PAY = 'MobilePay';

    public const PAYMENT_METHOD_BANCONTACT = 'Bancontact';

    public const PAYMENT_METHOD_BANCONTACT_MOBILE = 'Bancontact-mobile';

    public const PAYMENT_METHOD_MTS = 'MTS';

    public const PAYMENT_METHOD_MUCH_BETTER = 'MuchBetter';

    public const PAYMENT_METHOD_MULTIBANCO = 'Multibanco';

    public const PAYMENT_METHOD_NEOSURF = 'Neosurf';

    public const PAYMENT_METHOD_NETBANKING = 'Netbanking';

    public const PAYMENT_METHOD_NETELLER = 'Neteller';

    public const PAYMENT_METHOD_NORDEA_SOLO = 'Nordea-Solo';

    public const PAYMENT_METHOD_OCHA_PAY = 'OchaPay';

    public const PAYMENT_METHOD_ONLINE_BANK_TRANSFER = 'online-bank-transfer';

    public const PAYMENT_METHOD_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const PAYMENT_METHOD_ORIENTAL_WALLET = 'oriental-wallet';

    public const PAYMENT_METHOD_OXXO = 'OXXO';

    public const PAYMENT_METHOD_P24 = 'P24';

    public const PAYMENT_METHOD_PAGADITO = 'Pagadito';

    public const PAYMENT_METHOD_PAGO_EFFECTIVO = 'PagoEffectivo';

    public const PAYMENT_METHOD_PAGSMILE_DEPOSIT_EXPRESS = 'Pagsmile-deposit-express';

    public const PAYMENT_METHOD_PAGSMILE_LOTTERY = 'Pagsmile-lottery';

    public const PAYMENT_METHOD_PAY_CASH = 'PayCash';

    public const PAYMENT_METHOD_PAYCO = 'Payco';

    public const PAYMENT_METHOD_PAYEER = 'Payeer';

    public const PAYMENT_METHOD_PAYMENT_ASIA_CRYPTO = 'PaymentAsia-crypto';

    public const PAYMENT_METHOD_PAYMERO = 'Paymero';

    public const PAYMENT_METHOD_PERFECT_MONEY = 'Perfect-money';

    public const PAYMENT_METHOD_PIASTRIX = 'Piastrix';

    public const PAYMENT_METHOD_PIX = 'PIX';

    public const PAYMENT_METHOD_PAY_TABS = 'PayTabs';

    public const PAYMENT_METHOD_PAYSAFECARD = 'Paysafecard';

    public const PAYMENT_METHOD_PAYSAFECASH = 'Paysafecash';

    public const PAYMENT_METHOD_PAY4_FUN = 'Pay4Fun';

    public const PAYMENT_METHOD_PAYNOTE = 'Paynote';

    public const PAYMENT_METHOD_PIN_PAY = 'PinPay';

    public const PAYMENT_METHOD_PHONE = 'phone';

    public const PAYMENT_METHOD_PHONE_PE = 'PhonePe';

    public const PAYMENT_METHOD_PO_LI = 'POLi';

    public const PAYMENT_METHOD_POST_FINANCE_CARD = 'PostFinance-card';

    public const PAYMENT_METHOD_POST_FINANCE_E_FINANCE = 'PostFinance-e-finance';

    public const PAYMENT_METHOD_QIWI = 'QIWI';

    public const PAYMENT_METHOD_Q_PAY = 'QPay';

    public const PAYMENT_METHOD_QQ_PAY = 'QQPay';

    public const PAYMENT_METHOD_RAPYD_CHECKOUT = 'rapyd-checkout';

    public const PAYMENT_METHOD_RESURS = 'Resurs';

    public const PAYMENT_METHOD_SAFETY_PAY = 'SafetyPay';

    public const PAYMENT_METHOD_SAMSUNG_PAY = 'Samsung Pay';

    public const PAYMENT_METHOD_SEPA = 'SEPA';

    public const PAYMENT_METHOD_SKRILL = 'Skrill';

    public const PAYMENT_METHOD_SKRILL_RAPID_TRANSFER = 'Skrill Rapid Transfer';

    public const PAYMENT_METHOD_SMS_VOUCHER = 'SMSVoucher';

    public const PAYMENT_METHOD_SOFORT = 'Sofort';

    public const PAYMENT_METHOD_SPARK_PAY = 'SparkPay';

    public const PAYMENT_METHOD_SWIFT_DBT = 'swift-dbt';

    public const PAYMENT_METHOD_TELE2 = 'Tele2';

    public const PAYMENT_METHOD_TERMINALY_RF = 'Terminaly-RF';

    public const PAYMENT_METHOD_TODITO_CASH_CARD = 'ToditoCash-card';

    public const PAYMENT_METHOD_TRUSTLY = 'Trustly';

    public const PAYMENT_METHOD_TUPAY = 'Tupay';

    public const PAYMENT_METHOD_U_PAY_CARD = 'UPayCard';

    public const PAYMENT_METHOD_UPI = 'UPI';

    public const PAYMENT_METHOD_USD_COIN = 'USD-coin';

    public const PAYMENT_METHOD_V_CREDITOS = 'VCreditos';

    public const PAYMENT_METHOD_VENUS_POINT = 'VenusPoint';

    public const PAYMENT_METHOD_VOUCHER = 'voucher';

    public const PAYMENT_METHOD_VOUCHER_2 = 'voucher-2';

    public const PAYMENT_METHOD_VOUCHER_3 = 'voucher-3';

    public const PAYMENT_METHOD_VOUCHER_4 = 'voucher-4';

    public const PAYMENT_METHOD_WALLET88 = 'Wallet88';

    public const PAYMENT_METHOD_WEBMONEY = 'Webmoney';

    public const PAYMENT_METHOD_WEBPAY = 'Webpay';

    public const PAYMENT_METHOD_WEBPAY_2 = 'Webpay-2';

    public const PAYMENT_METHOD_WEBPAY_CARD = 'Webpay Card';

    public const PAYMENT_METHOD_WE_CHAT_PAY = 'WeChat Pay';

    public const PAYMENT_METHOD_WIRE = 'wire';

    public const PAYMENT_METHOD_X_PAY_P2_P = 'XPay-P2P';

    public const PAYMENT_METHOD_X_PAY_QR = 'XPay-QR';

    public const PAYMENT_METHOD_YANDEX_MONEY = 'Yandex-money';

    public const PAYMENT_METHOD_ZOTAPAY = 'Zotapay';

    public const PAYMENT_METHOD_ZIMPLER = 'Zimpler';

    public const PAYMENT_METHOD_ZIP = 'Zip';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('paymentMethod', $data)) {
            $this->setPaymentMethod($data['paymentMethod']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPaymentMethod(): string
    {
        return $this->fields['paymentMethod'];
    }

    public function setPaymentMethod(string $paymentMethod): static
    {
        $this->fields['paymentMethod'] = $paymentMethod;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentMethod', $this->fields)) {
            $data['paymentMethod'] = $this->fields['paymentMethod'];
        }

        return $data;
    }
}
