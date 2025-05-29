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

class PaymentInstructionMethods implements PaymentInstruction
{
    public const METHODS_PAYMENT_CARD = 'payment-card';

    public const METHODS_ACH = 'ach';

    public const METHODS_CASH = 'cash';

    public const METHODS_CHECK = 'check';

    public const METHODS_PAYPAL = 'paypal';

    public const METHODS_ADV_CASH = 'AdvCash';

    public const METHODS_AIRCASH = 'Aircash';

    public const METHODS_AIRPAY = 'Airpay';

    public const METHODS_ALFA_CLICK = 'Alfa-click';

    public const METHODS_ALIPAY = 'Alipay';

    public const METHODS_AMAZON_PAY = 'AmazonPay';

    public const METHODS_APPLE_PAY = 'Apple Pay';

    public const METHODS_ASTRO_PAY_CARD = 'AstroPay Card';

    public const METHODS_ASTRO_PAY_GO = 'AstroPay-GO';

    public const METHODS_BANK_SEND = 'BankSEND';

    public const METHODS_BANK_REFERENCED = 'BankReferenced';

    public const METHODS_BANK_TRANSFER = 'bank-transfer';

    public const METHODS_BANK_TRANSFER_2 = 'bank-transfer-2';

    public const METHODS_BANK_TRANSFER_3 = 'bank-transfer-3';

    public const METHODS_BANK_TRANSFER_4 = 'bank-transfer-4';

    public const METHODS_BANK_TRANSFER_5 = 'bank-transfer-5';

    public const METHODS_BANK_TRANSFER_6 = 'bank-transfer-6';

    public const METHODS_BANK_TRANSFER_7 = 'bank-transfer-7';

    public const METHODS_BANK_TRANSFER_8 = 'bank-transfer-8';

    public const METHODS_BANK_TRANSFER_9 = 'bank-transfer-9';

    public const METHODS_BALOTO = 'Baloto';

    public const METHODS_BEELINE = 'Beeline';

    public const METHODS_BELFIUS_DIRECT_NET = 'Belfius-direct-net';

    public const METHODS_BITCOIN = 'bitcoin';

    public const METHODS_BIZUM = 'Bizum';

    public const METHODS_BLIK = 'Blik';

    public const METHODS_BOLETO = 'Boleto';

    public const METHODS_BOLETO_2 = 'Boleto-2';

    public const METHODS_BOLETO_3 = 'Boleto-3';

    public const METHODS_CASH_DEPOSIT = 'cash-deposit';

    public const METHODS_CAS_HLIB = 'CASHlib';

    public const METHODS_CASH_TO_CODE = 'CashToCode';

    public const METHODS_CC_AVENUE = 'CCAvenue';

    public const METHODS_CHINA_UNION_PAY = 'China UnionPay';

    public const METHODS_CLEO = 'Cleo';

    public const METHODS_COD_VOUCHER = 'CODVoucher';

    public const METHODS_CONEKTA_OXXO = 'Conekta-oxxo';

    public const METHODS_CONEKTA_SPEI = 'Conekta-spei';

    public const METHODS_CRYPTOCURRENCY = 'cryptocurrency';

    public const METHODS_CUPON_DE_PAGOS = 'Cupon-de-pagos';

    public const METHODS_CYBER_SOURCE = 'CyberSource';

    public const METHODS_DIMOCO_PAY_SMART = 'Dimoco-pay-smart';

    public const METHODS_DIRECTA24_CARD = 'Directa24Card';

    public const METHODS_DOMESTIC_CARDS = 'domestic-cards';

    public const METHODS_EFECTY = 'Efecty';

    public const METHODS_ECHECK = 'echeck';

    public const METHODS_ECO_PAYZ = 'ecoPayz';

    public const METHODS_ECO_VOUCHER = 'ecoVoucher';

    public const METHODS_EPS = 'EPS';

    public const METHODS_E_PAY_BG = 'ePay.bg';

    public const METHODS_ETHEREUM = 'Ethereum';

    public const METHODS_E_WALLET = 'e-wallet';

    public const METHODS_EZY_EFT = 'ezyEFT';

    public const METHODS_E_ZEE_WALLET = 'eZeeWallet';

    public const METHODS_FASTER_PAY = 'FasterPay';

    public const METHODS_FLEXEPIN = 'Flexepin';

    public const METHODS_GIROPAY = 'Giropay';

    public const METHODS_GOOGLE_PAY = 'Google Pay';

    public const METHODS_GPAYSAFE = 'Gpaysafe';

    public const METHODS_I_CASH_ONE_VOUCHER = 'iCashOne Voucher';

    public const METHODS_I_DEBIT = 'iDebit';

    public const METHODS_I_DEAL = 'iDEAL';

    public const METHODS_ING_HOMEPAY = 'ING-homepay';

    public const METHODS_INOVAPAY_PIN = 'INOVAPAY-pin';

    public const METHODS_INOVAPAY_WALLET = 'INOVAPAY-wallet';

    public const METHODS_INSTA_DEBIT = 'InstaDebit';

    public const METHODS_INSTANT_PAYMENTS = 'InstantPayments';

    public const METHODS_INSTANT_BANK_TRANSFER = 'instant-bank-transfer';

    public const METHODS_INTERAC_ONLINE = 'Interac-online';

    public const METHODS_INTERAC_E_TRANSFER = 'Interac-eTransfer';

    public const METHODS_INTERAC_EXPRESS_CONNECT = 'Interac-express-connect';

    public const METHODS_INTERAC = 'Interac';

    public const METHODS_INVOICE = 'invoice';

    public const METHODS_I_WALLET = 'iWallet';

    public const METHODS_JETON = 'Jeton';

    public const METHODS_JETON_CASH = 'JetonCash';

    public const METHODS_JPAY = 'jpay';

    public const METHODS_KAKAO_PAY = 'KakaoPay';

    public const METHODS_KHELOCARD = 'Khelocard';

    public const METHODS_KLARNA = 'Klarna';

    public const METHODS_KNOT = 'KNOT';

    public const METHODS_LITECOIN = 'Litecoin';

    public const METHODS_LOONIE = 'loonie';

    public const METHODS_LPG_ONLINE = 'LPG-online';

    public const METHODS_LPG_PAYMENT_CARD = 'LPG-payment-card';

    public const METHODS_MATRIX = 'Matrix';

    public const METHODS_MAXI_CASH = 'MaxiCash';

    public const METHODS_MEGAFON = 'Megafon';

    public const METHODS_MERCADO_PAGO = 'MercadoPago';

    public const METHODS_MI_FINITY_E_WALLET = 'MiFinity-eWallet';

    public const METHODS_MISCELLANEOUS = 'miscellaneous';

    public const METHODS_MOBILE_PAY = 'MobilePay';

    public const METHODS_MULTIBANCO = 'Multibanco';

    public const METHODS_BANCONTACT = 'Bancontact';

    public const METHODS_BANCONTACT_MOBILE = 'Bancontact-mobile';

    public const METHODS_MTS = 'MTS';

    public const METHODS_MUCH_BETTER = 'MuchBetter';

    public const METHODS_MY_FATOORAH = 'MyFatoorah';

    public const METHODS_NEOSURF = 'Neosurf';

    public const METHODS_NETBANKING = 'Netbanking';

    public const METHODS_NETELLER = 'Neteller';

    public const METHODS_NORDEA_SOLO = 'Nordea-Solo';

    public const METHODS_NORDIK_COIN = 'NordikCoin';

    public const METHODS_OCHA_PAY = 'OchaPay';

    public const METHODS_ONLINE_BANK_TRANSFER = 'online-bank-transfer';

    public const METHODS_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const METHODS_ORIENTAL_WALLET = 'oriental-wallet';

    public const METHODS_OXXO = 'OXXO';

    public const METHODS_P24 = 'P24';

    public const METHODS_PAGADITO = 'Pagadito';

    public const METHODS_PAGO_EFFECTIVO = 'PagoEffectivo';

    public const METHODS_PAGSMILE_LOTTERY = 'Pagsmile-lottery';

    public const METHODS_PAGSMILE_DEPOSIT_EXPRESS = 'Pagsmile-deposit-express';

    public const METHODS_PAY_CASH = 'PayCash';

    public const METHODS_PAYCO = 'Payco';

    public const METHODS_PAYEER = 'Payeer';

    public const METHODS_PAYMENT_ASIA_CRYPTO = 'PaymentAsia-crypto';

    public const METHODS_PAYSAFECARD = 'Paysafecard';

    public const METHODS_PAY_TABS = 'PayTabs';

    public const METHODS_PAY4_FUN = 'Pay4Fun';

    public const METHODS_PAYNOTE = 'Paynote';

    public const METHODS_PAYMERO = 'Paymero';

    public const METHODS_PAYMERO_QR = 'Paymero-QR';

    public const METHODS_PAY_U = 'PayU';

    public const METHODS_PAY_U_LATAM = 'PayULatam';

    public const METHODS_PERFECT_MONEY = 'Perfect-money';

    public const METHODS_PIASTRIX = 'Piastrix';

    public const METHODS_PIX = 'PIX';

    public const METHODS_PIN_PAY = 'PinPay';

    public const METHODS_PHONE = 'phone';

    public const METHODS_PHONE_PE = 'PhonePe';

    public const METHODS_PO_LI = 'POLi';

    public const METHODS_POST_FINANCE_CARD = 'PostFinance-card';

    public const METHODS_POST_FINANCE_E_FINANCE = 'PostFinance-e-finance';

    public const METHODS_QIWI = 'QIWI';

    public const METHODS_Q_PAY = 'QPay';

    public const METHODS_QQ_PAY = 'QQPay';

    public const METHODS_RAPYD_CHECKOUT = 'rapyd-checkout';

    public const METHODS_REBILLY_HOSTED_PAYMENT_FORM = 'rebilly-hosted-payment-form';

    public const METHODS_RESURS = 'Resurs';

    public const METHODS_RIPPLE = 'Ripple';

    public const METHODS_SAFETY_PAY = 'SafetyPay';

    public const METHODS_SAMSUNG_PAY = 'Samsung Pay';

    public const METHODS_SEPA = 'SEPA';

    public const METHODS_SIIRTO = 'Siirto';

    public const METHODS_SKRILL = 'Skrill';

    public const METHODS_SKRILL_RAPID_TRANSFER = 'Skrill Rapid Transfer';

    public const METHODS_SMS_VOUCHER = 'SMSVoucher';

    public const METHODS_SOFORT = 'Sofort';

    public const METHODS_SPARK_PAY = 'SparkPay';

    public const METHODS_SPEI = 'SPEI';

    public const METHODS_SWIFT_DBT = 'swift-dbt';

    public const METHODS_TELE2 = 'Tele2';

    public const METHODS_TELR = 'Telr';

    public const METHODS_TERMINALY_RF = 'Terminaly-RF';

    public const METHODS_TETHER = 'Tether';

    public const METHODS_TODITO_CASH_CARD = 'ToditoCash-card';

    public const METHODS_TRUSTLY = 'Trustly';

    public const METHODS_TUPAY = 'Tupay';

    public const METHODS_TWINT = 'TWINT';

    public const METHODS_UNI_CRYPT = 'UniCrypt';

    public const METHODS_U_PAY_CARD = 'UPayCard';

    public const METHODS_UPI = 'UPI';

    public const METHODS_USD_COIN = 'USD-coin';

    public const METHODS_V_CREDITOS = 'VCreditos';

    public const METHODS_VEGA_WALLET = 'VegaWallet';

    public const METHODS_VENUS_POINT = 'VenusPoint';

    public const METHODS_VOUCHER = 'voucher';

    public const METHODS_VOUCHER_2 = 'voucher-2';

    public const METHODS_VOUCHER_3 = 'voucher-3';

    public const METHODS_VOUCHER_4 = 'voucher-4';

    public const METHODS_WALLET88 = 'Wallet88';

    public const METHODS_WEBMONEY = 'Webmoney';

    public const METHODS_WEBPAY = 'Webpay';

    public const METHODS_WEBPAY_2 = 'Webpay-2';

    public const METHODS_WEBPAY_CARD = 'Webpay Card';

    public const METHODS_WE_CHAT_PAY = 'WeChat Pay';

    public const METHODS_X_PAY_P2_P = 'XPay-P2P';

    public const METHODS_X_PAY_QR = 'XPay-QR';

    public const METHODS_YANDEX_MONEY = 'Yandex-money';

    public const METHODS_ZOTAPAY = 'Zotapay';

    public const METHODS_ZIMPLER = 'Zimpler';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('methods', $data)) {
            $this->setMethods($data['methods']);
        }
        if (array_key_exists('receivedBy', $data)) {
            $this->setReceivedBy($data['receivedBy']);
        }
        if (array_key_exists('reference', $data)) {
            $this->setReference($data['reference']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getMethods(): ?array
    {
        return $this->fields['methods'] ?? null;
    }

    /**
     * @param null|string[] $methods
     */
    public function setMethods(null|array $methods): static
    {
        $this->fields['methods'] = $methods;

        return $this;
    }

    public function getReceivedBy(): ?string
    {
        return $this->fields['receivedBy'] ?? null;
    }

    public function setReceivedBy(null|string $receivedBy): static
    {
        $this->fields['receivedBy'] = $receivedBy;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->fields['reference'] ?? null;
    }

    public function setReference(null|string $reference): static
    {
        $this->fields['reference'] = $reference;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('methods', $this->fields)) {
            $data['methods'] = $this->fields['methods'];
        }
        if (array_key_exists('receivedBy', $this->fields)) {
            $data['receivedBy'] = $this->fields['receivedBy'];
        }
        if (array_key_exists('reference', $this->fields)) {
            $data['reference'] = $this->fields['reference'];
        }

        return $data;
    }
}
