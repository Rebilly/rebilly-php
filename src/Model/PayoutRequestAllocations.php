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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class PayoutRequestAllocations implements JsonSerializable
{
    public const TRANSACTION_RESULT_ABANDONED = 'abandoned';

    public const TRANSACTION_RESULT_APPROVED = 'approved';

    public const TRANSACTION_RESULT_CANCELED = 'canceled';

    public const TRANSACTION_RESULT_DECLINED = 'declined';

    public const TRANSACTION_RESULT_UNKNOWN = 'unknown';

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

    public const METHOD_SAFETY_PAY = 'SafetyPay';

    public const METHOD_SAMSUNG_PAY = 'Samsung Pay';

    public const METHOD_SEPA = 'SEPA';

    public const METHOD_SIIRTO = 'Siirto';

    public const METHOD_SKRILL = 'Skrill';

    public const METHOD_SKRILL_RAPID_TRANSFER = 'Skrill Rapid Transfer';

    public const METHOD_SMS_VOUCHER = 'SMSVoucher';

    public const METHOD_SOFORT = 'Sofort';

    public const METHOD_SPARK_PAY = 'SparkPay';

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

    public const GATEWAY_NAME_A1_GATEWAY = 'A1Gateway';

    public const GATEWAY_NAME_ACI = 'ACI';

    public const GATEWAY_NAME_ADYEN = 'Adyen';

    public const GATEWAY_NAME_AIRCASH = 'Aircash';

    public const GATEWAY_NAME_AIRPAY = 'Airpay';

    public const GATEWAY_NAME_AIRWALLEX = 'Airwallex';

    public const GATEWAY_NAME_AMAZON_PAY = 'AmazonPay';

    public const GATEWAY_NAME_AMEX_VPC = 'AmexVPC';

    public const GATEWAY_NAME_APCO_PAY = 'ApcoPay';

    public const GATEWAY_NAME_ASIA_PAYMENT_GATEWAY = 'AsiaPaymentGateway';

    public const GATEWAY_NAME_ASTRO_PAY_CARD = 'AstroPayCard';

    public const GATEWAY_NAME_AUTHORIZE_NET = 'AuthorizeNet';

    public const GATEWAY_NAME_AWEPAY = 'Awepay';

    public const GATEWAY_NAME_BAMBORA = 'Bambora';

    public const GATEWAY_NAME_BANK_SEND = 'BankSEND';

    public const GATEWAY_NAME_BIT_PAY = 'BitPay';

    public const GATEWAY_NAME_BLUE_SNAP = 'BlueSnap';

    public const GATEWAY_NAME_BRAINTREE_PAYMENTS = 'BraintreePayments';

    public const GATEWAY_NAME_BUCKAROO = 'Buckaroo';

    public const GATEWAY_NAME_BVNK = 'BVNK';

    public const GATEWAY_NAME_CARDKNOX = 'Cardknox';

    public const GATEWAY_NAME_CASHFLOWS = 'Cashflows';

    public const GATEWAY_NAME_CAS_HLIB = 'CASHlib';

    public const GATEWAY_NAME_CASHTERMINAL = 'Cashterminal';

    public const GATEWAY_NAME_CASH_TO_CODE = 'CashToCode';

    public const GATEWAY_NAME_CAURI_PAYMENT = 'CauriPayment';

    public const GATEWAY_NAME_CAYAN = 'Cayan';

    public const GATEWAY_NAME_CC_AVENUE = 'CCAvenue';

    public const GATEWAY_NAME_CHASE = 'Chase';

    public const GATEWAY_NAME_CHECKOUT_COM = 'CheckoutCom';

    public const GATEWAY_NAME_CHILLSTOCK = 'Chillstock';

    public const GATEWAY_NAME_CIRCLE = 'Circle';

    public const GATEWAY_NAME_CITADEL = 'Citadel';

    public const GATEWAY_NAME_CLEARHAUS = 'Clearhaus';

    public const GATEWAY_NAME_CLEO = 'Cleo';

    public const GATEWAY_NAME_COD_VOUCHER = 'CODVoucher';

    public const GATEWAY_NAME_COINBASE = 'Coinbase';

    public const GATEWAY_NAME_COIN_GATE = 'CoinGate';

    public const GATEWAY_NAME_COIN_PAYMENTS = 'CoinPayments';

    public const GATEWAY_NAME_CONEKTA = 'Conekta';

    public const GATEWAY_NAME_COPPR = 'Coppr';

    public const GATEWAY_NAME_CREDORAX = 'Credorax';

    public const GATEWAY_NAME_CRYPTONATOR = 'Cryptonator';

    public const GATEWAY_NAME_CYBER_SOURCE = 'CyberSource';

    public const GATEWAY_NAME_DATA_CASH = 'DataCash';

    public const GATEWAY_NAME_DENGI = 'Dengi';

    public const GATEWAY_NAME_DIMOCO = 'Dimoco';

    public const GATEWAY_NAME_DIRECTA24 = 'Directa24';

    public const GATEWAY_NAME_D_LOCAL = 'dLocal';

    public const GATEWAY_NAME_DRAGONPHOENIX = 'Dragonphoenix';

    public const GATEWAY_NAME_DROPAYMENT = 'Dropayment';

    public const GATEWAY_NAME_EASY_PAY_DIRECT = 'EasyPayDirect';

    public const GATEWAY_NAME_EBANX = 'EBANX';

    public const GATEWAY_NAME_ECO_PAYZ = 'ecoPayz';

    public const GATEWAY_NAME_ECORE_PAY = 'EcorePay';

    public const GATEWAY_NAME_ELAVON = 'Elavon';

    public const GATEWAY_NAME_EUTELLER = 'Euteller';

    public const GATEWAY_NAME_E_MERCHANT_PAY = 'eMerchantPay';

    public const GATEWAY_NAME_EMS = 'EMS';

    public const GATEWAY_NAME_E_PAY = 'ePay';

    public const GATEWAY_NAME_EPG = 'EPG';

    public const GATEWAY_NAME_E_PRO = 'EPro';

    public const GATEWAY_NAME_EZEEBILL = 'Ezeebill';

    public const GATEWAY_NAME_E_ZEE_WALLET = 'eZeeWallet';

    public const GATEWAY_NAME_EZY_EFT = 'ezyEFT';

    public const GATEWAY_NAME_FASTER_PAY = 'FasterPay';

    public const GATEWAY_NAME_FINRAX = 'Finrax';

    public const GATEWAY_NAME_FLEXEPIN = 'Flexepin';

    public const GATEWAY_NAME_FIN_TEC_SYSTEMS = 'FinTecSystems';

    public const GATEWAY_NAME_FUND_SEND = 'FundSend';

    public const GATEWAY_NAME_FORTE = 'Forte';

    public const GATEWAY_NAME_GET = 'GET';

    public const GATEWAY_NAME_GIGADAT = 'Gigadat';

    public const GATEWAY_NAME_GLOBAL_ONE_PAY = 'GlobalOnePay';

    public const GATEWAY_NAME_GOONEY = 'Gooney';

    public const GATEWAY_NAME_GPAYSAFE = 'Gpaysafe';

    public const GATEWAY_NAME_GREENBOX = 'Greenbox';

    public const GATEWAY_NAME_HI_PAY = 'HiPay';

    public const GATEWAY_NAME_I_CAN_PAY = 'iCanPay';

    public const GATEWAY_NAME_ICEPAY = 'ICEPAY';

    public const GATEWAY_NAME_I_CHEQUE = 'iCheque';

    public const GATEWAY_NAME_I_DEBIT = 'iDebit';

    public const GATEWAY_NAME_ILIXIUM = 'Ilixium';

    public const GATEWAY_NAME_INGENICO = 'Ingenico';

    public const GATEWAY_NAME_INOVAPAY = 'INOVAPAY';

    public const GATEWAY_NAME_INOVIO = 'Inovio';

    public const GATEWAY_NAME_INTUIT = 'Intuit';

    public const GATEWAY_NAME_INSTA_DEBIT = 'InstaDebit';

    public const GATEWAY_NAME_IPAY_OPTIONS = 'IpayOptions';

    public const GATEWAY_NAME_JET_PAY = 'JetPay';

    public const GATEWAY_NAME_JETON = 'Jeton';

    public const GATEWAY_NAME_JPM_ORBITAL = 'JPMOrbital';

    public const GATEWAY_NAME_KHELOCARD = 'Khelocard';

    public const GATEWAY_NAME_KLARNA = 'Klarna';

    public const GATEWAY_NAME_KONNEKTIVE = 'Konnektive';

    public const GATEWAY_NAME_LA_CORE = 'LaCore';

    public const GATEWAY_NAME_LOONIE = 'loonie';

    public const GATEWAY_NAME_LPG = 'LPG';

    public const GATEWAY_NAME_MAXI_CASH = 'MaxiCash';

    public const GATEWAY_NAME_MERCADO_PAGO = 'MercadoPago';

    public const GATEWAY_NAME_MI_FINITY = 'MiFinity';

    public const GATEWAY_NAME_MOBILE_PAY = 'MobilePay';

    public const GATEWAY_NAME_MONERIS = 'Moneris';

    public const GATEWAY_NAME_MTA_PAY = 'MtaPay';

    public const GATEWAY_NAME_MUCH_BETTER = 'MuchBetter';

    public const GATEWAY_NAME_MUCH_BETTER_GATEWAY = 'MuchBetterGateway';

    public const GATEWAY_NAME_MY_FATOORAH = 'MyFatoorah';

    public const GATEWAY_NAME_NEOSURF = 'Neosurf';

    public const GATEWAY_NAME_NETBANKING = 'Netbanking';

    public const GATEWAY_NAME_NETELLER = 'Neteller';

    public const GATEWAY_NAME_N_GENIUS = 'NGenius';

    public const GATEWAY_NAME_NINJA_WALLET = 'NinjaWallet';

    public const GATEWAY_NAME_NMI = 'NMI';

    public const GATEWAY_NAME_NORDIK_COIN = 'NordikCoin';

    public const GATEWAY_NAME_NOW_PAYMENTS = 'NOWPayments';

    public const GATEWAY_NAME_NUA_PAY = 'NuaPay';

    public const GATEWAY_NAME_OCHA_PAY = 'OchaPay';

    public const GATEWAY_NAME_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const GATEWAY_NAME_ON_RAMP = 'OnRamp';

    public const GATEWAY_NAME_ORBITAL = 'Orbital';

    public const GATEWAY_NAME_PAGADITO = 'Pagadito';

    public const GATEWAY_NAME_PAGSMILE = 'Pagsmile';

    public const GATEWAY_NAME_PANAMERICAN = 'Panamerican';

    public const GATEWAY_NAME_PARAMOUNT_COMMERCE = 'ParamountCommerce';

    public const GATEWAY_NAME_PARAMOUNT_EFT = 'ParamountEft';

    public const GATEWAY_NAME_PARAMOUNT_INTERAC = 'ParamountInterac';

    public const GATEWAY_NAME_PANDA_GATEWAY = 'PandaGateway';

    public const GATEWAY_NAME_PAY4_FUN = 'Pay4Fun';

    public const GATEWAY_NAME_PAY_CASH = 'PayCash';

    public const GATEWAY_NAME_PAY_CLUB = 'PayClub';

    public const GATEWAY_NAME_PAY_ECARDS = 'PayEcards';

    public const GATEWAY_NAME_PAYEEZY = 'Payeezy';

    public const GATEWAY_NAME_PAYFLOW = 'Payflow';

    public const GATEWAY_NAME_PAYNOTE = 'Paynote';

    public const GATEWAY_NAME_PAYMENT_ASIA = 'PaymentAsia';

    public const GATEWAY_NAME_PAYMEN_TECHNOLOGIES = 'PaymenTechnologies';

    public const GATEWAY_NAME_PAYMENTS_OS = 'PaymentsOS';

    public const GATEWAY_NAME_PAYMERO = 'Paymero';

    public const GATEWAY_NAME_PAY_PAL = 'PayPal';

    public const GATEWAY_NAME_PAYPER = 'Payper';

    public const GATEWAY_NAME_PAYR = 'Payr';

    public const GATEWAY_NAME_PAY_REDEEM = 'PayRedeem';

    public const GATEWAY_NAME_PAY_RETAILERS = 'PayRetailers';

    public const GATEWAY_NAME_PAYSAFE = 'Paysafe';

    public const GATEWAY_NAME_PAYSAFECARD = 'Paysafecard';

    public const GATEWAY_NAME_PAYSAFECASH = 'Paysafecash';

    public const GATEWAY_NAME_PAY_TABS = 'PayTabs';

    public const GATEWAY_NAME_PAY_U_LATAM = 'PayULatam';

    public const GATEWAY_NAME_PAYVISION = 'Payvision';

    public const GATEWAY_NAME_PHAROS_PAYMENTS = 'PharosPayments';

    public const GATEWAY_NAME_PIASTRIX = 'Piastrix';

    public const GATEWAY_NAME_PIN4_PAY = 'Pin4Pay';

    public const GATEWAY_NAME_PLUGNPAY = 'Plugnpay';

    public const GATEWAY_NAME_POST_FINANCE = 'PostFinance';

    public const GATEWAY_NAME_PPRO = 'PPRO';

    public const GATEWAY_NAME_PROSA = 'Prosa';

    public const GATEWAY_NAME_P_SI_GATE = 'PSiGate';

    public const GATEWAY_NAME_RAPYD = 'Rapyd';

    public const GATEWAY_NAME_REALEX = 'Realex';

    public const GATEWAY_NAME_REALTIME = 'Realtime';

    public const GATEWAY_NAME_REDSYS = 'Redsys';

    public const GATEWAY_NAME_ROTESSA = 'Rotessa';

    public const GATEWAY_NAME_RPN = 'RPN';

    public const GATEWAY_NAME_SAFECHARGE = 'Safecharge';

    public const GATEWAY_NAME_SALTAR_PAY = 'SaltarPay';

    public const GATEWAY_NAME_SAGEPAY = 'Sagepay';

    public const GATEWAY_NAME_SEAMLESS_CHEX = 'SeamlessChex';

    public const GATEWAY_NAME_SECURE_TRADING = 'SecureTrading';

    public const GATEWAY_NAME_SECURION_PAY = 'SecurionPay';

    public const GATEWAY_NAME_SKRILL = 'Skrill';

    public const GATEWAY_NAME_SMART_INVOICE = 'SmartInvoice';

    public const GATEWAY_NAME_SMS_VOUCHER = 'SMSVoucher';

    public const GATEWAY_NAME_SOFORT = 'Sofort';

    public const GATEWAY_NAME_SPARK_PAY = 'SparkPay';

    public const GATEWAY_NAME_STATIC_GATEWAY = 'StaticGateway';

    public const GATEWAY_NAME_STP_MEXICO = 'STPMexico';

    public const GATEWAY_NAME_STRIPE = 'Stripe';

    public const GATEWAY_NAME_TELR = 'Telr';

    public const GATEWAY_NAME_TEST_PROCESSOR = 'TestProcessor';

    public const GATEWAY_NAME_TODITO_CASH = 'ToditoCash';

    public const GATEWAY_NAME_TRUEVO = 'Truevo';

    public const GATEWAY_NAME_TRUSTS_PAY = 'TrustsPay';

    public const GATEWAY_NAME_TRUSTLY = 'Trustly';

    public const GATEWAY_NAME_TWINT = 'TWINT';

    public const GATEWAY_NAME_U_PAY_CARD = 'UPayCard';

    public const GATEWAY_NAME_US_AE_PAY = 'USAePay';

    public const GATEWAY_NAME_VANTIV_LITLE = 'VantivLitle';

    public const GATEWAY_NAME_VEGAA_H = 'vegaaH';

    public const GATEWAY_NAME_V_CREDITOS = 'VCreditos';

    public const GATEWAY_NAME_VEGA_WALLET = 'VegaWallet';

    public const GATEWAY_NAME_WALLET88 = 'Wallet88';

    public const GATEWAY_NAME_WALPAY = 'Walpay';

    public const GATEWAY_NAME_WESTERN_UNION = 'WesternUnion';

    public const GATEWAY_NAME_WIRECARD = 'Wirecard';

    public const GATEWAY_NAME_WORLDLINE_ATOS_FRANKFURT = 'WorldlineAtosFrankfurt';

    public const GATEWAY_NAME_WORLDPAY = 'Worldpay';

    public const GATEWAY_NAME_X_PAY = 'XPay';

    public const GATEWAY_NAME_ZIMPLER = 'Zimpler';

    public const GATEWAY_NAME_ZOTAPAY = 'Zotapay';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('transactionResult', $data)) {
            $this->setTransactionResult($data['transactionResult']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTransactionId(): ?string
    {
        return $this->fields['transactionId'] ?? null;
    }

    public function setTransactionId(null|string $transactionId): static
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    public function getTransactionResult(): ?string
    {
        return $this->fields['transactionResult'] ?? null;
    }

    public function getMethod(): ?string
    {
        return $this->fields['method'] ?? null;
    }

    public function setMethod(null|string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getGatewayName(): ?string
    {
        return $this->fields['gatewayName'] ?? null;
    }

    public function setGatewayName(null|string $gatewayName): static
    {
        $this->fields['gatewayName'] = $gatewayName;

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

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('transactionResult', $this->fields)) {
            $data['transactionResult'] = $this->fields['transactionResult'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
            }
            if (array_key_exists('createdTime', $this->fields)) {
                $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
            }
            if (array_key_exists('updatedTime', $this->fields)) {
                $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
            }

            return $data;
            }

            private function setTransactionResult(null|string $transactionResult): static
            {
                $this->fields['transactionResult'] = $transactionResult;

                return $this;
            }

            private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
            {
                if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
                    $createdTime = new DateTimeImmutable($createdTime);
                }

                $this->fields['createdTime'] = $createdTime;

                return $this;
            }

            private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
            {
                if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
                    $updatedTime = new DateTimeImmutable($updatedTime);
                }

                $this->fields['updatedTime'] = $updatedTime;

                return $this;
            }
}
