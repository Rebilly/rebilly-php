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

class AlternativePaymentInstrument implements CustomerDefaultPaymentInstrument, TransactionPaymentInstrument
{
    public const METHOD_PAYMENT_CARD = 'payment-card';

    public const METHOD_ACH = 'ach';

    public const METHOD_CASH = 'cash';

    public const METHOD_CHECK = 'check';

    public const METHOD_PAYPAL = 'paypal';

    public const METHOD_ADV_CASH = 'AdvCash';

    public const METHOD_AIRCASH = 'Aircash';

    public const METHOD_AIRPAY = 'Airpay';

    public const METHOD_ALFA_CLICK = 'Alfa-click';

    public const METHOD_ALIPAY = 'Alipay';

    public const METHOD_AMAZON_PAY = 'AmazonPay';

    public const METHOD_APPLE_PAY = 'Apple Pay';

    public const METHOD_ASTRO_PAY_CARD = 'AstroPay Card';

    public const METHOD_ASTRO_PAY_GO = 'AstroPay-GO';

    public const METHOD_BANK_SEND = 'BankSEND';

    public const METHOD_BANK_REFERENCED = 'BankReferenced';

    public const METHOD_BANK_TRANSFER = 'bank-transfer';

    public const METHOD_BANK_TRANSFER_2 = 'bank-transfer-2';

    public const METHOD_BANK_TRANSFER_3 = 'bank-transfer-3';

    public const METHOD_BANK_TRANSFER_4 = 'bank-transfer-4';

    public const METHOD_BANK_TRANSFER_5 = 'bank-transfer-5';

    public const METHOD_BANK_TRANSFER_6 = 'bank-transfer-6';

    public const METHOD_BANK_TRANSFER_7 = 'bank-transfer-7';

    public const METHOD_BANK_TRANSFER_8 = 'bank-transfer-8';

    public const METHOD_BANK_TRANSFER_9 = 'bank-transfer-9';

    public const METHOD_BALOTO = 'Baloto';

    public const METHOD_BEELINE = 'Beeline';

    public const METHOD_BELFIUS_DIRECT_NET = 'Belfius-direct-net';

    public const METHOD_BITCOIN = 'bitcoin';

    public const METHOD_BIZUM = 'Bizum';

    public const METHOD_BLIK = 'Blik';

    public const METHOD_BOLETO = 'Boleto';

    public const METHOD_BOLETO_2 = 'Boleto-2';

    public const METHOD_BOLETO_3 = 'Boleto-3';

    public const METHOD_CASH_DEPOSIT = 'cash-deposit';

    public const METHOD_CAS_HLIB = 'CASHlib';

    public const METHOD_CASH_TO_CODE = 'CashToCode';

    public const METHOD_CC_AVENUE = 'CCAvenue';

    public const METHOD_CHINA_UNION_PAY = 'China UnionPay';

    public const METHOD_CLEO = 'Cleo';

    public const METHOD_COD_VOUCHER = 'CODVoucher';

    public const METHOD_CONEKTA_OXXO = 'Conekta-oxxo';

    public const METHOD_CONEKTA_SPEI = 'Conekta-spei';

    public const METHOD_CRYPTOCURRENCY = 'cryptocurrency';

    public const METHOD_CUPON_DE_PAGOS = 'Cupon-de-pagos';

    public const METHOD_CYBER_SOURCE = 'CyberSource';

    public const METHOD_DIMOCO_PAY_SMART = 'Dimoco-pay-smart';

    public const METHOD_DIRECTA24_CARD = 'Directa24Card';

    public const METHOD_DOMESTIC_CARDS = 'domestic-cards';

    public const METHOD_EFECTY = 'Efecty';

    public const METHOD_ECHECK = 'echeck';

    public const METHOD_ECO_PAYZ = 'ecoPayz';

    public const METHOD_ECO_VOUCHER = 'ecoVoucher';

    public const METHOD_EPS = 'EPS';

    public const METHOD_E_PAY_BG = 'ePay.bg';

    public const METHOD_ETHEREUM = 'Ethereum';

    public const METHOD_E_WALLET = 'e-wallet';

    public const METHOD_EZY_EFT = 'ezyEFT';

    public const METHOD_E_ZEE_WALLET = 'eZeeWallet';

    public const METHOD_FASTER_PAY = 'FasterPay';

    public const METHOD_FLEXEPIN = 'Flexepin';

    public const METHOD_GIROPAY = 'Giropay';

    public const METHOD_GOOGLE_PAY = 'Google Pay';

    public const METHOD_GPAYSAFE = 'Gpaysafe';

    public const METHOD_I_CASH_ONE_VOUCHER = 'iCashOne Voucher';

    public const METHOD_I_DEBIT = 'iDebit';

    public const METHOD_I_DEAL = 'iDEAL';

    public const METHOD_ING_HOMEPAY = 'ING-homepay';

    public const METHOD_INOVAPAY_PIN = 'INOVAPAY-pin';

    public const METHOD_INOVAPAY_WALLET = 'INOVAPAY-wallet';

    public const METHOD_INSTA_DEBIT = 'InstaDebit';

    public const METHOD_INSTANT_PAYMENTS = 'InstantPayments';

    public const METHOD_INSTANT_BANK_TRANSFER = 'instant-bank-transfer';

    public const METHOD_INTERAC_ONLINE = 'Interac-online';

    public const METHOD_INTERAC_E_TRANSFER = 'Interac-eTransfer';

    public const METHOD_INTERAC_EXPRESS_CONNECT = 'Interac-express-connect';

    public const METHOD_INTERAC = 'Interac';

    public const METHOD_INVOICE = 'invoice';

    public const METHOD_I_WALLET = 'iWallet';

    public const METHOD_JETON = 'Jeton';

    public const METHOD_JETON_CASH = 'JetonCash';

    public const METHOD_JPAY = 'jpay';

    public const METHOD_KAKAO_PAY = 'KakaoPay';

    public const METHOD_KHELOCARD = 'Khelocard';

    public const METHOD_KLARNA = 'Klarna';

    public const METHOD_KNOT = 'KNOT';

    public const METHOD_LITECOIN = 'Litecoin';

    public const METHOD_LOONIE = 'loonie';

    public const METHOD_LPG_ONLINE = 'LPG-online';

    public const METHOD_LPG_PAYMENT_CARD = 'LPG-payment-card';

    public const METHOD_MATRIX = 'Matrix';

    public const METHOD_MAXI_CASH = 'MaxiCash';

    public const METHOD_MEGAFON = 'Megafon';

    public const METHOD_MERCADO_PAGO = 'MercadoPago';

    public const METHOD_MI_FINITY_E_WALLET = 'MiFinity-eWallet';

    public const METHOD_MISCELLANEOUS = 'miscellaneous';

    public const METHOD_MOBILE_PAY = 'MobilePay';

    public const METHOD_MULTIBANCO = 'Multibanco';

    public const METHOD_BANCONTACT = 'Bancontact';

    public const METHOD_BANCONTACT_MOBILE = 'Bancontact-mobile';

    public const METHOD_MTS = 'MTS';

    public const METHOD_MUCH_BETTER = 'MuchBetter';

    public const METHOD_MY_FATOORAH = 'MyFatoorah';

    public const METHOD_NEOSURF = 'Neosurf';

    public const METHOD_NETBANKING = 'Netbanking';

    public const METHOD_NETELLER = 'Neteller';

    public const METHOD_NORDEA_SOLO = 'Nordea-Solo';

    public const METHOD_NORDIK_COIN = 'NordikCoin';

    public const METHOD_OCHA_PAY = 'OchaPay';

    public const METHOD_ONLINE_BANK_TRANSFER = 'online-bank-transfer';

    public const METHOD_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const METHOD_ORIENTAL_WALLET = 'oriental-wallet';

    public const METHOD_OXXO = 'OXXO';

    public const METHOD_P24 = 'P24';

    public const METHOD_PAGADITO = 'Pagadito';

    public const METHOD_PAGO_EFFECTIVO = 'PagoEffectivo';

    public const METHOD_PAGSMILE_LOTTERY = 'Pagsmile-lottery';

    public const METHOD_PAGSMILE_DEPOSIT_EXPRESS = 'Pagsmile-deposit-express';

    public const METHOD_PAY_CASH = 'PayCash';

    public const METHOD_PAYCO = 'Payco';

    public const METHOD_PAYEER = 'Payeer';

    public const METHOD_PAYMENT_ASIA_CRYPTO = 'PaymentAsia-crypto';

    public const METHOD_PAYSAFECARD = 'Paysafecard';

    public const METHOD_PAY_TABS = 'PayTabs';

    public const METHOD_PAY4_FUN = 'Pay4Fun';

    public const METHOD_PAYNOTE = 'Paynote';

    public const METHOD_PAYMERO = 'Paymero';

    public const METHOD_PAYMERO_QR = 'Paymero-QR';

    public const METHOD_PAY_U = 'PayU';

    public const METHOD_PAY_U_LATAM = 'PayULatam';

    public const METHOD_PERFECT_MONEY = 'Perfect-money';

    public const METHOD_PIASTRIX = 'Piastrix';

    public const METHOD_PIX = 'PIX';

    public const METHOD_PIN_PAY = 'PinPay';

    public const METHOD_PHONE = 'phone';

    public const METHOD_PHONE_PE = 'PhonePe';

    public const METHOD_PO_LI = 'POLi';

    public const METHOD_POST_FINANCE_CARD = 'PostFinance-card';

    public const METHOD_POST_FINANCE_E_FINANCE = 'PostFinance-e-finance';

    public const METHOD_QIWI = 'QIWI';

    public const METHOD_Q_PAY = 'QPay';

    public const METHOD_QQ_PAY = 'QQPay';

    public const METHOD_RAPYD_CHECKOUT = 'rapyd-checkout';

    public const METHOD_REBILLY_HOSTED_PAYMENT_FORM = 'rebilly-hosted-payment-form';

    public const METHOD_RESURS = 'Resurs';

    public const METHOD_RIPPLE = 'Ripple';

    public const METHOD_SAFETY_PAY = 'SafetyPay';

    public const METHOD_SAMSUNG_PAY = 'Samsung Pay';

    public const METHOD_SEPA = 'SEPA';

    public const METHOD_SIIRTO = 'Siirto';

    public const METHOD_SKRILL = 'Skrill';

    public const METHOD_SKRILL_RAPID_TRANSFER = 'Skrill Rapid Transfer';

    public const METHOD_SMS_VOUCHER = 'SMSVoucher';

    public const METHOD_SOFORT = 'Sofort';

    public const METHOD_SPARK_PAY = 'SparkPay';

    public const METHOD_SPEI = 'SPEI';

    public const METHOD_SWIFT_DBT = 'swift-dbt';

    public const METHOD_TELE2 = 'Tele2';

    public const METHOD_TELR = 'Telr';

    public const METHOD_TERMINALY_RF = 'Terminaly-RF';

    public const METHOD_TETHER = 'Tether';

    public const METHOD_TODITO_CASH_CARD = 'ToditoCash-card';

    public const METHOD_TRUSTLY = 'Trustly';

    public const METHOD_TUPAY = 'Tupay';

    public const METHOD_TWINT = 'TWINT';

    public const METHOD_UNI_CRYPT = 'UniCrypt';

    public const METHOD_U_PAY_CARD = 'UPayCard';

    public const METHOD_UPI = 'UPI';

    public const METHOD_USD_COIN = 'USD-coin';

    public const METHOD_V_CREDITOS = 'VCreditos';

    public const METHOD_VEGA_WALLET = 'VegaWallet';

    public const METHOD_VENUS_POINT = 'VenusPoint';

    public const METHOD_VOUCHER = 'voucher';

    public const METHOD_VOUCHER_2 = 'voucher-2';

    public const METHOD_VOUCHER_3 = 'voucher-3';

    public const METHOD_VOUCHER_4 = 'voucher-4';

    public const METHOD_WALLET88 = 'Wallet88';

    public const METHOD_WEBMONEY = 'Webmoney';

    public const METHOD_WEBPAY = 'Webpay';

    public const METHOD_WEBPAY_2 = 'Webpay-2';

    public const METHOD_WEBPAY_CARD = 'Webpay Card';

    public const METHOD_WE_CHAT_PAY = 'WeChat Pay';

    public const METHOD_X_PAY_P2_P = 'XPay-P2P';

    public const METHOD_X_PAY_QR = 'XPay-QR';

    public const METHOD_YANDEX_MONEY = 'Yandex-money';

    public const METHOD_ZOTAPAY = 'Zotapay';

    public const METHOD_ZIMPLER = 'Zimpler';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getPaymentInstrumentId(): ?string
    {
        return $this->fields['paymentInstrumentId'] ?? null;
    }

    public function setPaymentInstrumentId(null|string $paymentInstrumentId): static
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }

        return $data;
    }
}
