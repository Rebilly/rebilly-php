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

class Transaction implements JsonSerializable
{
    public const TYPE_3DS_AUTHENTICATION = '3ds-authentication';

    public const TYPE_AUTHORIZE = 'authorize';

    public const TYPE_CAPTURE = 'capture';

    public const TYPE_CREDIT = 'credit';

    public const TYPE_REFUND = 'refund';

    public const TYPE_SALE = 'sale';

    public const TYPE_SETUP = 'setup';

    public const TYPE_VOID = 'void';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_CONN_ERROR = 'conn-error';

    public const STATUS_DISPUTED = 'disputed';

    public const STATUS_NEVER_SENT = 'never-sent';

    public const STATUS_OFFSITE = 'offsite';

    public const STATUS_PARTIALLY_REFUNDED = 'partially-refunded';

    public const STATUS_PENDING = 'pending';

    public const STATUS_REFUNDED = 'refunded';

    public const STATUS_SENDING = 'sending';

    public const STATUS_TIMEOUT = 'timeout';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_WAITING_APPROVAL = 'waiting-approval';

    public const STATUS_WAITING_CAPTURE = 'waiting-capture';

    public const STATUS_WAITING_GATEWAY = 'waiting-gateway';

    public const STATUS_WAITING_REFUND = 'waiting-refund';

    public const RESULT_ABANDONED = 'abandoned';

    public const RESULT_APPROVED = 'approved';

    public const RESULT_CANCELED = 'canceled';

    public const RESULT_DECLINED = 'declined';

    public const RESULT_UNKNOWN = 'unknown';

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

    public const GATEWAY_NAME_GATE2WAY = 'gate2way';

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

    public const GATEWAY_NAME_MONOLO = 'Monolo';

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

    public const GATEWAY_NAME_OMNI_MATRIX = 'OmniMatrix';

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

    public const GATEWAY_NAME_PAY_U = 'PayU';

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

    public const GATEWAY_NAME_UNLIMIT = 'Unlimit';

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

    public const ACQUIRER_NAME_ADYEN = 'Adyen';

    public const ACQUIRER_NAME_ACI = 'ACI';

    public const ACQUIRER_NAME_ALIPAY = 'Alipay';

    public const ACQUIRER_NAME_AIB = 'AIB';

    public const ACQUIRER_NAME_AIRCASH = 'Aircash';

    public const ACQUIRER_NAME_AIRPAY = 'Airpay';

    public const ACQUIRER_NAME_AMAZON_PAY = 'AmazonPay';

    public const ACQUIRER_NAME_APCO_PAY = 'ApcoPay';

    public const ACQUIRER_NAME_ASIA_PAYMENT_GATEWAY = 'AsiaPaymentGateway';

    public const ACQUIRER_NAME_ASTRO_PAY_CARD = 'AstroPay Card';

    public const ACQUIRER_NAME_AWEPAY = 'Awepay';

    public const ACQUIRER_NAME_IPAY_OPTIONS = 'Ipay Options';

    public const ACQUIRER_NAME_B_PLUS_S = 'B+S';

    public const ACQUIRER_NAME_BAMBORA = 'Bambora';

    public const ACQUIRER_NAME_BIT_PAY = 'BitPay';

    public const ACQUIRER_NAME_BANK_OF_AMERICA = 'Bank of America';

    public const ACQUIRER_NAME_BANK_OF_MOSCOW = 'Bank of Moscow';

    public const ACQUIRER_NAME_BANK_OF_REBILLY = 'Bank of Rebilly';

    public const ACQUIRER_NAME_BANK_ONE = 'Bank One';

    public const ACQUIRER_NAME_BANK_SEND = 'BankSEND';

    public const ACQUIRER_NAME_BMO_HARRIS_BANK = 'BMO Harris Bank';

    public const ACQUIRER_NAME_BORGUN = 'Borgun';

    public const ACQUIRER_NAME_BRAINTREE_PAYMENTS = 'BraintreePayments';

    public const ACQUIRER_NAME_BUCKAROO = 'Buckaroo';

    public const ACQUIRER_NAME_BVNK = 'BVNK';

    public const ACQUIRER_NAME_CARDKNOX = 'Cardknox';

    public const ACQUIRER_NAME_CAS_HLIB = 'CASHlib';

    public const ACQUIRER_NAME_CASHTERMINAL = 'Cashterminal';

    public const ACQUIRER_NAME_CASH_TO_CODE = 'CashToCode';

    public const ACQUIRER_NAME_CATALUNYA_CAIXA = 'Catalunya Caixa';

    public const ACQUIRER_NAME_CC_AVENUE = 'CCAvenue';

    public const ACQUIRER_NAME_CHASE = 'Chase';

    public const ACQUIRER_NAME_CHECKOUT_COM = 'CheckoutCom';

    public const ACQUIRER_NAME_CHILLSTOCK = 'Chillstock';

    public const ACQUIRER_NAME_CHINA_UNION_PAY = 'ChinaUnionPay';

    public const ACQUIRER_NAME_CIM = 'CIM';

    public const ACQUIRER_NAME_CIRCLE = 'Circle';

    public const ACQUIRER_NAME_CITADEL = 'Citadel';

    public const ACQUIRER_NAME_CLEARHAUS = 'Clearhaus';

    public const ACQUIRER_NAME_CLEO = 'Cleo';

    public const ACQUIRER_NAME_COD_VOUCHER = 'CODVoucher';

    public const ACQUIRER_NAME_COINBASE = 'Coinbase';

    public const ACQUIRER_NAME_COIN_GATE = 'CoinGate';

    public const ACQUIRER_NAME_COIN_PAYMENTS = 'CoinPayments';

    public const ACQUIRER_NAME_CONEKTA = 'Conekta';

    public const ACQUIRER_NAME_COPPR = 'Coppr';

    public const ACQUIRER_NAME_CREDORAX = 'Credorax';

    public const ACQUIRER_NAME_CRYPTONATOR = 'Cryptonator';

    public const ACQUIRER_NAME_CYBER_SOURCE = 'CyberSource';

    public const ACQUIRER_NAME_DIMOCO = 'Dimoco';

    public const ACQUIRER_NAME_D_LOCAL = 'dLocal';

    public const ACQUIRER_NAME_DRAGONPHOENIX = 'Dragonphoenix';

    public const ACQUIRER_NAME_DROPAYMENT = 'Dropayment';

    public const ACQUIRER_NAME_EASY_PAY_DIRECT = 'EasyPayDirect';

    public const ACQUIRER_NAME_EBANX = 'EBANX';

    public const ACQUIRER_NAME_ECO_PAYZ = 'ecoPayz';

    public const ACQUIRER_NAME_ECORE_PAY = 'EcorePay';

    public const ACQUIRER_NAME_ELAVON = 'Elavon';

    public const ACQUIRER_NAME_EMS = 'EMS';

    public const ACQUIRER_NAME_E_PAY = 'ePay';

    public const ACQUIRER_NAME_EPG = 'EPG';

    public const ACQUIRER_NAME_EUTELLER = 'Euteller';

    public const ACQUIRER_NAME_EZEEBILL = 'Ezeebill';

    public const ACQUIRER_NAME_E_ZEE_WALLET = 'eZeeWallet';

    public const ACQUIRER_NAME_EZY_EFT = 'ezyEFT';

    public const ACQUIRER_NAME_FIFTH_THIRD_BANK = 'Fifth Third Bank';

    public const ACQUIRER_NAME_FINRAX = 'Finrax';

    public const ACQUIRER_NAME_FIRST_DATA_BUYPASS = 'First Data Buypass';

    public const ACQUIRER_NAME_FIRST_DATA_NASHVILLE = 'First Data Nashville';

    public const ACQUIRER_NAME_FIRST_DATA_NORTH = 'First Data North';

    public const ACQUIRER_NAME_FIRST_DATA_OMAHA = 'First Data Omaha';

    public const ACQUIRER_NAME_FIN_TEC_SYSTEMS = 'FinTecSystems';

    public const ACQUIRER_NAME_FLEXEPIN = 'Flexepin';

    public const ACQUIRER_NAME_FORTE = 'Forte';

    public const ACQUIRER_NAME_FUND_SEND = 'FundSend';

    public const ACQUIRER_NAME_GATE2WAY = 'gate2way';

    public const ACQUIRER_NAME_GIGADAT = 'Gigadat';

    public const ACQUIRER_NAME_GLOBAL_EAST = 'Global East';

    public const ACQUIRER_NAME_GOONEY = 'Gooney';

    public const ACQUIRER_NAME_GPAYSAFE = 'Gpaysafe';

    public const ACQUIRER_NAME_HEARTLAND = 'Heartland';

    public const ACQUIRER_NAME_HI_PAY = 'HiPay';

    public const ACQUIRER_NAME_HSBC = 'HSBC';

    public const ACQUIRER_NAME_I_CAN_PAY = 'iCanPay';

    public const ACQUIRER_NAME_ICEPAY = 'ICEPAY';

    public const ACQUIRER_NAME_I_CHEQUE = 'iCheque';

    public const ACQUIRER_NAME_ILIXIUM = 'Ilixium';

    public const ACQUIRER_NAME_INGENICO = 'Ingenico';

    public const ACQUIRER_NAME_INOVAPAY = 'INOVAPAY';

    public const ACQUIRER_NAME_INTUIT = 'Intuit';

    public const ACQUIRER_NAME_JETON = 'Jeton';

    public const ACQUIRER_NAME_JPM_ORBITAL = 'JPMOrbital';

    public const ACQUIRER_NAME_KHELOCARD = 'Khelocard';

    public const ACQUIRER_NAME_KLARNA = 'Klarna';

    public const ACQUIRER_NAME_KONNEKTIVE = 'Konnektive';

    public const ACQUIRER_NAME_LOONIE = 'loonie';

    public const ACQUIRER_NAME_LPG = 'LPG';

    public const ACQUIRER_NAME_MASAPAY = 'Masapay';

    public const ACQUIRER_NAME_MAXI_CASH = 'MaxiCash';

    public const ACQUIRER_NAME_MERCADO_PAGO = 'MercadoPago';

    public const ACQUIRER_NAME_MERRICK = 'Merrick';

    public const ACQUIRER_NAME_MISSION_VALLEY_BANK = 'Mission Valley Bank';

    public const ACQUIRER_NAME_MI_FINITY = 'MiFinity';

    public const ACQUIRER_NAME_MOBILE_PAY = 'MobilePay';

    public const ACQUIRER_NAME_MONERIS = 'Moneris';

    public const ACQUIRER_NAME_MONOLO = 'Monolo';

    public const ACQUIRER_NAME_MUCH_BETTER = 'MuchBetter';

    public const ACQUIRER_NAME_MUCH_BETTER_GATEWAY = 'MuchBetterGateway';

    public const ACQUIRER_NAME_MY_FATOORAH = 'MyFatoorah';

    public const ACQUIRER_NAME_NATWEST = 'NATWEST';

    public const ACQUIRER_NAME_NEOSURF = 'Neosurf';

    public const ACQUIRER_NAME_NETBANKING = 'Netbanking';

    public const ACQUIRER_NAME_NETELLER = 'Neteller';

    public const ACQUIRER_NAME_NINJA_WALLET = 'NinjaWallet';

    public const ACQUIRER_NAME_NMI = 'NMI';

    public const ACQUIRER_NAME_NORDIK_COIN = 'NordikCoin';

    public const ACQUIRER_NAME_NOW_PAYMENTS = 'NOWPayments';

    public const ACQUIRER_NAME_NUA_PAY = 'NuaPay';

    public const ACQUIRER_NAME_NUVEI = 'Nuvei';

    public const ACQUIRER_NAME_OCHA_PAY = 'OchaPay';

    public const ACQUIRER_NAME_OMNI_MATRIX = 'OmniMatrix';

    public const ACQUIRER_NAME_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const ACQUIRER_NAME_ON_RAMP = 'OnRamp';

    public const ACQUIRER_NAME_ORBITAL = 'Orbital';

    public const ACQUIRER_NAME_OTHER = 'Other';

    public const ACQUIRER_NAME_PANAMERICAN = 'Panamerican';

    public const ACQUIRER_NAME_PANDA_BANK = 'Panda Bank';

    public const ACQUIRER_NAME_PARAMOUNT = 'Paramount';

    public const ACQUIRER_NAME_PARAMOUNT_COMMERCE = 'ParamountCommerce';

    public const ACQUIRER_NAME_PARAMOUNT_EFT = 'ParamountEft';

    public const ACQUIRER_NAME_PARAMOUNT_INTERAC = 'ParamountInterac';

    public const ACQUIRER_NAME_PAY4FUN = 'Pay4fun';

    public const ACQUIRER_NAME_PAY_CASH = 'PayCash';

    public const ACQUIRER_NAME_PAY_CLUB = 'PayClub';

    public const ACQUIRER_NAME_PAY_ECARDS = 'PayEcards';

    public const ACQUIRER_NAME_PAYMENT_ASIA = 'PaymentAsia';

    public const ACQUIRER_NAME_PAYMEN_TECHNOLOGIES = 'PaymenTechnologies';

    public const ACQUIRER_NAME_PAYMENTS_OS = 'PaymentsOS';

    public const ACQUIRER_NAME_PAYMERO = 'Paymero';

    public const ACQUIRER_NAME_PAYNETICS = 'Paynetics';

    public const ACQUIRER_NAME_PAY_PAL = 'PayPal';

    public const ACQUIRER_NAME_PAYPER = 'Payper';

    public const ACQUIRER_NAME_PAYR = 'Payr';

    public const ACQUIRER_NAME_PAY_REDEEM = 'PayRedeem';

    public const ACQUIRER_NAME_PAY_RETAILERS = 'PayRetailers';

    public const ACQUIRER_NAME_PAY_TABS = 'PayTabs';

    public const ACQUIRER_NAME_PAY_U = 'PayU';

    public const ACQUIRER_NAME_PAY_U_LATAM = 'PayULatam';

    public const ACQUIRER_NAME_PAYVISION = 'Payvision';

    public const ACQUIRER_NAME_PHAROS_PAYMENTS = 'PharosPayments';

    public const ACQUIRER_NAME_PIASTRIX = 'Piastrix';

    public const ACQUIRER_NAME_PIN4_PAY = 'Pin4Pay';

    public const ACQUIRER_NAME_PEOPLES_TRUST_COMPANY = 'Peoples Trust Company';

    public const ACQUIRER_NAME_POST_FINANCE = 'PostFinance';

    public const ACQUIRER_NAME_PPRO = 'PPRO';

    public const ACQUIRER_NAME_PRIVATBANK = 'Privatbank';

    public const ACQUIRER_NAME_PROSA = 'Prosa';

    public const ACQUIRER_NAME_P_SI_GATE = 'PSiGate';

    public const ACQUIRER_NAME_QQ_PAY = 'QQPay';

    public const ACQUIRER_NAME_RAPYD = 'Rapyd';

    public const ACQUIRER_NAME_RBC = 'RBC';

    public const ACQUIRER_NAME_RBS_WORLD_PAY = 'RBS WorldPay';

    public const ACQUIRER_NAME_REAL_TIME = 'RealTime';

    public const ACQUIRER_NAME_ROTESSA = 'Rotessa';

    public const ACQUIRER_NAME_SAFECHARGE = 'Safecharge';

    public const ACQUIRER_NAME_SALTAR_PAY = 'SaltarPay';

    public const ACQUIRER_NAME_SECURE_TRADING = 'SecureTrading';

    public const ACQUIRER_NAME_SECURION_PAY = 'SecurionPay';

    public const ACQUIRER_NAME_SKRILL = 'Skrill';

    public const ACQUIRER_NAME_SMART_INVOICE = 'SmartInvoice';

    public const ACQUIRER_NAME_SMS_VOUCHER = 'SMSVoucher';

    public const ACQUIRER_NAME_SOFORT = 'Sofort';

    public const ACQUIRER_NAME_SPARK_PAY = 'SparkPay';

    public const ACQUIRER_NAME_STATE_BANK_OF_MAURITIUS = 'State Bank of Mauritius';

    public const ACQUIRER_NAME_STP_MEXICO = 'STPMexico';

    public const ACQUIRER_NAME_STRIPE = 'Stripe';

    public const ACQUIRER_NAME_TBI = 'TBI';

    public const ACQUIRER_NAME_TELR = 'Telr';

    public const ACQUIRER_NAME_TEST_PROCESSOR = 'TestProcessor';

    public const ACQUIRER_NAME_TODITO_CASH = 'ToditoCash';

    public const ACQUIRER_NAME_TRUEVO = 'Truevo';

    public const ACQUIRER_NAME_TRUSTLY = 'Trustly';

    public const ACQUIRER_NAME_TRUST_PAY = 'TrustPay';

    public const ACQUIRER_NAME_TRUSTS_PAY = 'TrustsPay';

    public const ACQUIRER_NAME_TSYS = 'TSYS';

    public const ACQUIRER_NAME_TWINT = 'TWINT';

    public const ACQUIRER_NAME_U_PAY_CARD = 'UPayCard';

    public const ACQUIRER_NAME_VANTIV = 'Vantiv';

    public const ACQUIRER_NAME_V_CREDITOS = 'VCreditos';

    public const ACQUIRER_NAME_VEGA_WALLET = 'VegaWallet';

    public const ACQUIRER_NAME_VOICE_PAY = 'VoicePay';

    public const ACQUIRER_NAME_WALLET88 = 'Wallet88';

    public const ACQUIRER_NAME_WE_CHAT_PAY = 'WeChat Pay';

    public const ACQUIRER_NAME_WELLS_FARGO = 'Wells Fargo';

    public const ACQUIRER_NAME_WING_HANG_BANK = 'Wing Hang Bank';

    public const ACQUIRER_NAME_WIRECARD = 'Wirecard';

    public const ACQUIRER_NAME_WORLD_PAY = 'WorldPay';

    public const ACQUIRER_NAME_X_PAY = 'XPay';

    public const ACQUIRER_NAME_ZIMPLER = 'Zimpler';

    public const ACQUIRER_NAME_ZOTAPAY = 'Zotapay';

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

    public const DISPUTE_STATUS_NULL = 'null';

    public const DISPUTE_STATUS_RESPONSE_NEEDED = 'response-needed';

    public const DISPUTE_STATUS_UNDER_REVIEW = 'under-review';

    public const DISPUTE_STATUS_FORFEITED = 'forfeited';

    public const DISPUTE_STATUS_WON = 'won';

    public const DISPUTE_STATUS_LOST = 'lost';

    public const DISPUTE_STATUS_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('result', $data)) {
            $this->setResult($data['result']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('purchaseAmount', $data)) {
            $this->setPurchaseAmount($data['purchaseAmount']);
        }
        if (array_key_exists('purchaseCurrency', $data)) {
            $this->setPurchaseCurrency($data['purchaseCurrency']);
        }
        if (array_key_exists('requestAmount', $data)) {
            $this->setRequestAmount($data['requestAmount']);
        }
        if (array_key_exists('requestCurrency', $data)) {
            $this->setRequestCurrency($data['requestCurrency']);
        }
        if (array_key_exists('parentTransactionId', $data)) {
            $this->setParentTransactionId($data['parentTransactionId']);
        }
        if (array_key_exists('childTransactions', $data)) {
            $this->setChildTransactions($data['childTransactions']);
        }
        if (array_key_exists('invoiceIds', $data)) {
            $this->setInvoiceIds($data['invoiceIds']);
        }
        if (array_key_exists('subscriptionIds', $data)) {
            $this->setSubscriptionIds($data['subscriptionIds']);
        }
        if (array_key_exists('planIds', $data)) {
            $this->setPlanIds($data['planIds']);
        }
        if (array_key_exists('isRebill', $data)) {
            $this->setIsRebill($data['isRebill']);
        }
        if (array_key_exists('rebillNumber', $data)) {
            $this->setRebillNumber($data['rebillNumber']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('has3ds', $data)) {
            $this->setHas3ds($data['has3ds']);
        }
        if (array_key_exists('3ds', $data)) {
            $this->set3ds($data['3ds']);
        }
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('retryNumber', $data)) {
            $this->setRetryNumber($data['retryNumber']);
        }
        if (array_key_exists('isRetry', $data)) {
            $this->setIsRetry($data['isRetry']);
        }
        if (array_key_exists('billingDescriptor', $data)) {
            $this->setBillingDescriptor($data['billingDescriptor']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('requestId', $data)) {
            $this->setRequestId($data['requestId']);
        }
        if (array_key_exists('hasAmountAdjustment', $data)) {
            $this->setHasAmountAdjustment($data['hasAmountAdjustment']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('processedTime', $data)) {
            $this->setProcessedTime($data['processedTime']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('gatewayAccountId', $data)) {
            $this->setGatewayAccountId($data['gatewayAccountId']);
        }
        if (array_key_exists('gatewayTransactionId', $data)) {
            $this->setGatewayTransactionId($data['gatewayTransactionId']);
        }
        if (array_key_exists('gateway', $data)) {
            $this->setGateway($data['gateway']);
        }
        if (array_key_exists('acquirerName', $data)) {
            $this->setAcquirerName($data['acquirerName']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('velocity', $data)) {
            $this->setVelocity($data['velocity']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('referenceData', $data)) {
            $this->setReferenceData($data['referenceData']);
        }
        if (array_key_exists('bin', $data)) {
            $this->setBin($data['bin']);
        }
        if (array_key_exists('paymentInstrument', $data)) {
            $this->setPaymentInstrument($data['paymentInstrument']);
        }
        if (array_key_exists('hasDcc', $data)) {
            $this->setHasDcc($data['hasDcc']);
        }
        if (array_key_exists('dcc', $data)) {
            $this->setDcc($data['dcc']);
        }
        if (array_key_exists('hasBumpOffer', $data)) {
            $this->setHasBumpOffer($data['hasBumpOffer']);
        }
        if (array_key_exists('bumpOffer', $data)) {
            $this->setBumpOffer($data['bumpOffer']);
        }
        if (array_key_exists('riskScore', $data)) {
            $this->setRiskScore($data['riskScore']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('notificationUrl', $data)) {
            $this->setNotificationUrl($data['notificationUrl']);
        }
        if (array_key_exists('isDisputed', $data)) {
            $this->setIsDisputed($data['isDisputed']);
        }
        if (array_key_exists('disputeTime', $data)) {
            $this->setDisputeTime($data['disputeTime']);
        }
        if (array_key_exists('disputeStatus', $data)) {
            $this->setDisputeStatus($data['disputeStatus']);
        }
        if (array_key_exists('isReconciled', $data)) {
            $this->setIsReconciled($data['isReconciled']);
        }
        if (array_key_exists('isProcessedOutside', $data)) {
            $this->setIsProcessedOutside($data['isProcessedOutside']);
        }
        if (array_key_exists('isMerchantInitiated', $data)) {
            $this->setIsMerchantInitiated($data['isMerchantInitiated']);
        }
        if (array_key_exists('hadDiscrepancy', $data)) {
            $this->setHadDiscrepancy($data['hadDiscrepancy']);
        }
        if (array_key_exists('orderId', $data)) {
            $this->setOrderId($data['orderId']);
        }
        if (array_key_exists('arn', $data)) {
            $this->setArn($data['arn']);
        }
        if (array_key_exists('reportAmount', $data)) {
            $this->setReportAmount($data['reportAmount']);
        }
        if (array_key_exists('reportCurrency', $data)) {
            $this->setReportCurrency($data['reportCurrency']);
        }
        if (array_key_exists('settlementTime', $data)) {
            $this->setSettlementTime($data['settlementTime']);
        }
        if (array_key_exists('discrepancyTime', $data)) {
            $this->setDiscrepancyTime($data['discrepancyTime']);
        }
        if (array_key_exists('limits', $data)) {
            $this->setLimits($data['limits']);
        }
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
        if (array_key_exists('depositRequestId', $data)) {
            $this->setDepositRequestId($data['depositRequestId']);
        }
        if (array_key_exists('payoutRequestId', $data)) {
            $this->setPayoutRequestId($data['payoutRequestId']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getWebsiteId(): ?string
    {
        return $this->fields['websiteId'] ?? null;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getResult(): ?string
    {
        return $this->fields['result'] ?? null;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function getPurchaseAmount(): ?float
    {
        return $this->fields['purchaseAmount'] ?? null;
    }

    public function getPurchaseCurrency(): ?string
    {
        return $this->fields['purchaseCurrency'] ?? null;
    }

    public function getRequestAmount(): ?float
    {
        return $this->fields['requestAmount'] ?? null;
    }

    public function getRequestCurrency(): ?string
    {
        return $this->fields['requestCurrency'] ?? null;
    }

    public function getParentTransactionId(): ?string
    {
        return $this->fields['parentTransactionId'] ?? null;
    }

    public function setParentTransactionId(null|string $parentTransactionId): static
    {
        $this->fields['parentTransactionId'] = $parentTransactionId;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getChildTransactions(): ?array
    {
        return $this->fields['childTransactions'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getInvoiceIds(): ?array
    {
        return $this->fields['invoiceIds'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getSubscriptionIds(): ?array
    {
        return $this->fields['subscriptionIds'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getPlanIds(): ?array
    {
        return $this->fields['planIds'] ?? null;
    }

    public function getIsRebill(): ?bool
    {
        return $this->fields['isRebill'] ?? null;
    }

    public function getRebillNumber(): ?int
    {
        return $this->fields['rebillNumber'] ?? null;
    }

    public function getBillingAddress(): ?ContactObject
    {
        return $this->fields['billingAddress'] ?? null;
    }

    public function setBillingAddress(null|ContactObject|array $billingAddress): static
    {
        if ($billingAddress !== null && !($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getHas3ds(): ?bool
    {
        return $this->fields['has3ds'] ?? null;
    }

    public function get3ds(): ?Transaction3ds
    {
        return $this->fields['3ds'] ?? null;
    }

    public function set3ds(null|Transaction3ds|array $_3ds): static
    {
        if ($_3ds !== null && !($_3ds instanceof Transaction3ds)) {
            $_3ds = Transaction3ds::from($_3ds);
        }

        $this->fields['3ds'] = $_3ds;

        return $this;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): static
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getRetryNumber(): ?int
    {
        return $this->fields['retryNumber'] ?? null;
    }

    public function getIsRetry(): ?bool
    {
        return $this->fields['isRetry'] ?? null;
    }

    public function getBillingDescriptor(): ?string
    {
        return $this->fields['billingDescriptor'] ?? null;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getRequestId(): ?string
    {
        return $this->fields['requestId'] ?? null;
    }

    public function setRequestId(null|string $requestId): static
    {
        $this->fields['requestId'] = $requestId;

        return $this;
    }

    public function getHasAmountAdjustment(): ?bool
    {
        return $this->fields['hasAmountAdjustment'] ?? null;
    }

    public function getGatewayName(): ?string
    {
        return $this->fields['gatewayName'] ?? null;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getProcessedTime(): ?DateTimeImmutable
    {
        return $this->fields['processedTime'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getGatewayAccountId(): ?string
    {
        return $this->fields['gatewayAccountId'] ?? null;
    }

    public function getGatewayTransactionId(): ?string
    {
        return $this->fields['gatewayTransactionId'] ?? null;
    }

    public function getGateway(): ?TransactionGateway
    {
        return $this->fields['gateway'] ?? null;
    }

    public function setGateway(null|TransactionGateway|array $gateway): static
    {
        if ($gateway !== null && !($gateway instanceof TransactionGateway)) {
            $gateway = TransactionGateway::from($gateway);
        }

        $this->fields['gateway'] = $gateway;

        return $this;
    }

    public function getAcquirerName(): ?string
    {
        return $this->fields['acquirerName'] ?? null;
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

    public function getVelocity(): ?int
    {
        return $this->fields['velocity'] ?? null;
    }

    public function setVelocity(null|int $velocity): static
    {
        $this->fields['velocity'] = $velocity;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    /**
     * @return null|array<string,string>
     */
    public function getReferenceData(): ?array
    {
        return $this->fields['referenceData'] ?? null;
    }

    public function getBin(): ?string
    {
        return $this->fields['bin'] ?? null;
    }

    public function getPaymentInstrument(): ?TransactionPaymentInstrument
    {
        return $this->fields['paymentInstrument'] ?? null;
    }

    public function setPaymentInstrument(null|TransactionPaymentInstrument|array $paymentInstrument): static
    {
        if ($paymentInstrument !== null && !($paymentInstrument instanceof TransactionPaymentInstrument)) {
            $paymentInstrument = TransactionPaymentInstrumentFactory::from($paymentInstrument);
        }

        $this->fields['paymentInstrument'] = $paymentInstrument;

        return $this;
    }

    public function getHasDcc(): ?bool
    {
        return $this->fields['hasDcc'] ?? null;
    }

    public function getDcc(): ?TransactionDcc
    {
        return $this->fields['dcc'] ?? null;
    }

    public function setDcc(null|TransactionDcc|array $dcc): static
    {
        if ($dcc !== null && !($dcc instanceof TransactionDcc)) {
            $dcc = TransactionDcc::from($dcc);
        }

        $this->fields['dcc'] = $dcc;

        return $this;
    }

    public function getHasBumpOffer(): ?bool
    {
        return $this->fields['hasBumpOffer'] ?? null;
    }

    public function getBumpOffer(): ?TransactionBumpOffer
    {
        return $this->fields['bumpOffer'] ?? null;
    }

    public function setBumpOffer(null|TransactionBumpOffer|array $bumpOffer): static
    {
        if ($bumpOffer !== null && !($bumpOffer instanceof TransactionBumpOffer)) {
            $bumpOffer = TransactionBumpOffer::from($bumpOffer);
        }

        $this->fields['bumpOffer'] = $bumpOffer;

        return $this;
    }

    public function getRiskScore(): ?int
    {
        return $this->fields['riskScore'] ?? null;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    public function getNotificationUrl(): ?string
    {
        return $this->fields['notificationUrl'] ?? null;
    }

    public function setNotificationUrl(null|string $notificationUrl): static
    {
        $this->fields['notificationUrl'] = $notificationUrl;

        return $this;
    }

    public function getIsDisputed(): ?bool
    {
        return $this->fields['isDisputed'] ?? null;
    }

    public function getDisputeTime(): ?DateTimeImmutable
    {
        return $this->fields['disputeTime'] ?? null;
    }

    public function getDisputeStatus(): ?string
    {
        return $this->fields['disputeStatus'] ?? null;
    }

    public function getIsReconciled(): ?bool
    {
        return $this->fields['isReconciled'] ?? null;
    }

    public function getIsProcessedOutside(): ?bool
    {
        return $this->fields['isProcessedOutside'] ?? null;
    }

    public function setIsProcessedOutside(null|bool $isProcessedOutside): static
    {
        $this->fields['isProcessedOutside'] = $isProcessedOutside;

        return $this;
    }

    public function getIsMerchantInitiated(): ?bool
    {
        return $this->fields['isMerchantInitiated'] ?? null;
    }

    public function setIsMerchantInitiated(null|bool $isMerchantInitiated): static
    {
        $this->fields['isMerchantInitiated'] = $isMerchantInitiated;

        return $this;
    }

    public function getHadDiscrepancy(): ?bool
    {
        return $this->fields['hadDiscrepancy'] ?? null;
    }

    public function getOrderId(): ?string
    {
        return $this->fields['orderId'] ?? null;
    }

    public function setOrderId(null|string $orderId): static
    {
        $this->fields['orderId'] = $orderId;

        return $this;
    }

    public function getArn(): ?string
    {
        return $this->fields['arn'] ?? null;
    }

    public function getReportAmount(): ?float
    {
        return $this->fields['reportAmount'] ?? null;
    }

    public function getReportCurrency(): ?string
    {
        return $this->fields['reportCurrency'] ?? null;
    }

    public function getSettlementTime(): ?DateTimeImmutable
    {
        return $this->fields['settlementTime'] ?? null;
    }

    public function getDiscrepancyTime(): ?DateTimeImmutable
    {
        return $this->fields['discrepancyTime'] ?? null;
    }

    public function getLimits(): ?TransactionLimitAmount
    {
        return $this->fields['limits'] ?? null;
    }

    public function setLimits(null|TransactionLimitAmount|array $limits): static
    {
        if ($limits !== null && !($limits instanceof TransactionLimitAmount)) {
            $limits = TransactionLimitAmount::from($limits);
        }

        $this->fields['limits'] = $limits;

        return $this;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
    }

    public function getDepositRequestId(): ?string
    {
        return $this->fields['depositRequestId'] ?? null;
    }

    public function getPayoutRequestId(): ?string
    {
        return $this->fields['payoutRequestId'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?TransactionEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|TransactionEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof TransactionEmbedded)) {
            $embedded = TransactionEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('result', $this->fields)) {
            $data['result'] = $this->fields['result'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('purchaseAmount', $this->fields)) {
            $data['purchaseAmount'] = $this->fields['purchaseAmount'];
        }
        if (array_key_exists('purchaseCurrency', $this->fields)) {
            $data['purchaseCurrency'] = $this->fields['purchaseCurrency'];
        }
        if (array_key_exists('requestAmount', $this->fields)) {
            $data['requestAmount'] = $this->fields['requestAmount'];
        }
        if (array_key_exists('requestCurrency', $this->fields)) {
            $data['requestCurrency'] = $this->fields['requestCurrency'];
        }
        if (array_key_exists('parentTransactionId', $this->fields)) {
            $data['parentTransactionId'] = $this->fields['parentTransactionId'];
        }
        if (array_key_exists('childTransactions', $this->fields)) {
            $data['childTransactions'] = $this->fields['childTransactions'];
        }
        if (array_key_exists('invoiceIds', $this->fields)) {
            $data['invoiceIds'] = $this->fields['invoiceIds'];
        }
        if (array_key_exists('subscriptionIds', $this->fields)) {
            $data['subscriptionIds'] = $this->fields['subscriptionIds'];
        }
        if (array_key_exists('planIds', $this->fields)) {
            $data['planIds'] = $this->fields['planIds'];
        }
        if (array_key_exists('isRebill', $this->fields)) {
            $data['isRebill'] = $this->fields['isRebill'];
        }
        if (array_key_exists('rebillNumber', $this->fields)) {
            $data['rebillNumber'] = $this->fields['rebillNumber'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('has3ds', $this->fields)) {
            $data['has3ds'] = $this->fields['has3ds'];
        }
        if (array_key_exists('3ds', $this->fields)) {
            $data['3ds'] = $this->fields['3ds']?->jsonSerialize();
        }
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('retryNumber', $this->fields)) {
            $data['retryNumber'] = $this->fields['retryNumber'];
        }
        if (array_key_exists('isRetry', $this->fields)) {
            $data['isRetry'] = $this->fields['isRetry'];
        }
        if (array_key_exists('billingDescriptor', $this->fields)) {
            $data['billingDescriptor'] = $this->fields['billingDescriptor'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('requestId', $this->fields)) {
            $data['requestId'] = $this->fields['requestId'];
        }
        if (array_key_exists('hasAmountAdjustment', $this->fields)) {
            $data['hasAmountAdjustment'] = $this->fields['hasAmountAdjustment'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('processedTime', $this->fields)) {
            $data['processedTime'] = $this->fields['processedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('gatewayAccountId', $this->fields)) {
            $data['gatewayAccountId'] = $this->fields['gatewayAccountId'];
        }
        if (array_key_exists('gatewayTransactionId', $this->fields)) {
            $data['gatewayTransactionId'] = $this->fields['gatewayTransactionId'];
        }
        if (array_key_exists('gateway', $this->fields)) {
            $data['gateway'] = $this->fields['gateway']?->jsonSerialize();
        }
        if (array_key_exists('acquirerName', $this->fields)) {
            $data['acquirerName'] = $this->fields['acquirerName'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('velocity', $this->fields)) {
            $data['velocity'] = $this->fields['velocity'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('referenceData', $this->fields)) {
            $data['referenceData'] = $this->fields['referenceData'];
        }
        if (array_key_exists('bin', $this->fields)) {
            $data['bin'] = $this->fields['bin'];
        }
        if (array_key_exists('paymentInstrument', $this->fields)) {
            $data['paymentInstrument'] = $this->fields['paymentInstrument']?->jsonSerialize();
        }
        if (array_key_exists('hasDcc', $this->fields)) {
            $data['hasDcc'] = $this->fields['hasDcc'];
        }
        if (array_key_exists('dcc', $this->fields)) {
            $data['dcc'] = $this->fields['dcc']?->jsonSerialize();
        }
        if (array_key_exists('hasBumpOffer', $this->fields)) {
            $data['hasBumpOffer'] = $this->fields['hasBumpOffer'];
        }
        if (array_key_exists('bumpOffer', $this->fields)) {
            $data['bumpOffer'] = $this->fields['bumpOffer']?->jsonSerialize();
        }
        if (array_key_exists('riskScore', $this->fields)) {
            $data['riskScore'] = $this->fields['riskScore'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('notificationUrl', $this->fields)) {
            $data['notificationUrl'] = $this->fields['notificationUrl'];
        }
        if (array_key_exists('isDisputed', $this->fields)) {
            $data['isDisputed'] = $this->fields['isDisputed'];
        }
        if (array_key_exists('disputeTime', $this->fields)) {
            $data['disputeTime'] = $this->fields['disputeTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('disputeStatus', $this->fields)) {
            $data['disputeStatus'] = $this->fields['disputeStatus'];
        }
        if (array_key_exists('isReconciled', $this->fields)) {
            $data['isReconciled'] = $this->fields['isReconciled'];
        }
        if (array_key_exists('isProcessedOutside', $this->fields)) {
            $data['isProcessedOutside'] = $this->fields['isProcessedOutside'];
        }
        if (array_key_exists('isMerchantInitiated', $this->fields)) {
            $data['isMerchantInitiated'] = $this->fields['isMerchantInitiated'];
        }
        if (array_key_exists('hadDiscrepancy', $this->fields)) {
            $data['hadDiscrepancy'] = $this->fields['hadDiscrepancy'];
        }
        if (array_key_exists('orderId', $this->fields)) {
            $data['orderId'] = $this->fields['orderId'];
        }
        if (array_key_exists('arn', $this->fields)) {
            $data['arn'] = $this->fields['arn'];
        }
        if (array_key_exists('reportAmount', $this->fields)) {
            $data['reportAmount'] = $this->fields['reportAmount'];
        }
        if (array_key_exists('reportCurrency', $this->fields)) {
            $data['reportCurrency'] = $this->fields['reportCurrency'];
        }
        if (array_key_exists('settlementTime', $this->fields)) {
            $data['settlementTime'] = $this->fields['settlementTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('discrepancyTime', $this->fields)) {
            $data['discrepancyTime'] = $this->fields['discrepancyTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('limits', $this->fields)) {
            $data['limits'] = $this->fields['limits']?->jsonSerialize();
        }
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('depositRequestId', $this->fields)) {
            $data['depositRequestId'] = $this->fields['depositRequestId'];
        }
        if (array_key_exists('payoutRequestId', $this->fields)) {
            $data['payoutRequestId'] = $this->fields['payoutRequestId'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setWebsiteId(null|string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setResult(null|string $result): static
    {
        $this->fields['result'] = $result;

        return $this;
    }

    private function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    private function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    private function setPurchaseAmount(null|float|string $purchaseAmount): static
    {
        if (is_string($purchaseAmount)) {
            $purchaseAmount = (float) $purchaseAmount;
        }

        $this->fields['purchaseAmount'] = $purchaseAmount;

        return $this;
    }

    private function setPurchaseCurrency(null|string $purchaseCurrency): static
    {
        $this->fields['purchaseCurrency'] = $purchaseCurrency;

        return $this;
    }

    private function setRequestAmount(null|float|string $requestAmount): static
    {
        if (is_string($requestAmount)) {
            $requestAmount = (float) $requestAmount;
        }

        $this->fields['requestAmount'] = $requestAmount;

        return $this;
    }

    private function setRequestCurrency(null|string $requestCurrency): static
    {
        $this->fields['requestCurrency'] = $requestCurrency;

        return $this;
    }

    /**
     * @param null|string[] $childTransactions
     */
    private function setChildTransactions(null|array $childTransactions): static
    {
        $this->fields['childTransactions'] = $childTransactions;

        return $this;
    }

    /**
     * @param null|string[] $invoiceIds
     */
    private function setInvoiceIds(null|array $invoiceIds): static
    {
        $this->fields['invoiceIds'] = $invoiceIds;

        return $this;
    }

    /**
     * @param null|string[] $subscriptionIds
     */
    private function setSubscriptionIds(null|array $subscriptionIds): static
    {
        $this->fields['subscriptionIds'] = $subscriptionIds;

        return $this;
    }

    /**
     * @param null|string[] $planIds
     */
    private function setPlanIds(null|array $planIds): static
    {
        $this->fields['planIds'] = $planIds;

        return $this;
    }

    private function setIsRebill(null|bool $isRebill): static
    {
        $this->fields['isRebill'] = $isRebill;

        return $this;
    }

    private function setRebillNumber(null|int $rebillNumber): static
    {
        $this->fields['rebillNumber'] = $rebillNumber;

        return $this;
    }

    private function setHas3ds(null|bool $has3ds): static
    {
        $this->fields['has3ds'] = $has3ds;

        return $this;
    }

    private function setRetryNumber(null|int $retryNumber): static
    {
        $this->fields['retryNumber'] = $retryNumber;

        return $this;
    }

    private function setIsRetry(null|bool $isRetry): static
    {
        $this->fields['isRetry'] = $isRetry;

        return $this;
    }

    private function setBillingDescriptor(null|string $billingDescriptor): static
    {
        $this->fields['billingDescriptor'] = $billingDescriptor;

        return $this;
    }

    private function setHasAmountAdjustment(null|bool $hasAmountAdjustment): static
    {
        $this->fields['hasAmountAdjustment'] = $hasAmountAdjustment;

        return $this;
    }

    private function setGatewayName(null|string $gatewayName): static
    {
        $this->fields['gatewayName'] = $gatewayName;

        return $this;
    }

    private function setProcessedTime(null|DateTimeImmutable|string $processedTime): static
    {
        if ($processedTime !== null && !($processedTime instanceof DateTimeImmutable)) {
            $processedTime = new DateTimeImmutable($processedTime);
        }

        $this->fields['processedTime'] = $processedTime;

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

    private function setGatewayAccountId(null|string $gatewayAccountId): static
    {
        $this->fields['gatewayAccountId'] = $gatewayAccountId;

        return $this;
    }

    private function setGatewayTransactionId(null|string $gatewayTransactionId): static
    {
        $this->fields['gatewayTransactionId'] = $gatewayTransactionId;

        return $this;
    }

    private function setAcquirerName(null|string $acquirerName): static
    {
        $this->fields['acquirerName'] = $acquirerName;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    /**
     * @param null|array<string,string> $referenceData
     */
    private function setReferenceData(null|array $referenceData): static
    {
        $this->fields['referenceData'] = $referenceData;

        return $this;
    }

    private function setBin(null|string $bin): static
    {
        $this->fields['bin'] = $bin;

        return $this;
    }

    private function setHasDcc(null|bool $hasDcc): static
    {
        $this->fields['hasDcc'] = $hasDcc;

        return $this;
    }

    private function setHasBumpOffer(null|bool $hasBumpOffer): static
    {
        $this->fields['hasBumpOffer'] = $hasBumpOffer;

        return $this;
    }

    private function setRiskScore(null|int $riskScore): static
    {
        $this->fields['riskScore'] = $riskScore;

        return $this;
    }

    private function setIsDisputed(null|bool $isDisputed): static
    {
        $this->fields['isDisputed'] = $isDisputed;

        return $this;
    }

    private function setDisputeTime(null|DateTimeImmutable|string $disputeTime): static
    {
        if ($disputeTime !== null && !($disputeTime instanceof DateTimeImmutable)) {
            $disputeTime = new DateTimeImmutable($disputeTime);
        }

        $this->fields['disputeTime'] = $disputeTime;

        return $this;
    }

    private function setDisputeStatus(null|string $disputeStatus): static
    {
        $this->fields['disputeStatus'] = $disputeStatus;

        return $this;
    }

    private function setIsReconciled(null|bool $isReconciled): static
    {
        $this->fields['isReconciled'] = $isReconciled;

        return $this;
    }

    private function setHadDiscrepancy(null|bool $hadDiscrepancy): static
    {
        $this->fields['hadDiscrepancy'] = $hadDiscrepancy;

        return $this;
    }

    private function setArn(null|string $arn): static
    {
        $this->fields['arn'] = $arn;

        return $this;
    }

    private function setReportAmount(null|float|string $reportAmount): static
    {
        if (is_string($reportAmount)) {
            $reportAmount = (float) $reportAmount;
        }

        $this->fields['reportAmount'] = $reportAmount;

        return $this;
    }

    private function setReportCurrency(null|string $reportCurrency): static
    {
        $this->fields['reportCurrency'] = $reportCurrency;

        return $this;
    }

    private function setSettlementTime(null|DateTimeImmutable|string $settlementTime): static
    {
        if ($settlementTime !== null && !($settlementTime instanceof DateTimeImmutable)) {
            $settlementTime = new DateTimeImmutable($settlementTime);
        }

        $this->fields['settlementTime'] = $settlementTime;

        return $this;
    }

    private function setDiscrepancyTime(null|DateTimeImmutable|string $discrepancyTime): static
    {
        if ($discrepancyTime !== null && !($discrepancyTime instanceof DateTimeImmutable)) {
            $discrepancyTime = new DateTimeImmutable($discrepancyTime);
        }

        $this->fields['discrepancyTime'] = $discrepancyTime;

        return $this;
    }

    private function setOrganizationId(null|string $organizationId): static
    {
        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    private function setDepositRequestId(null|string $depositRequestId): static
    {
        $this->fields['depositRequestId'] = $depositRequestId;

        return $this;
    }

    private function setPayoutRequestId(null|string $payoutRequestId): static
    {
        $this->fields['payoutRequestId'] = $payoutRequestId;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
