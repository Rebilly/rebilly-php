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
use InvalidArgumentException;
use JsonSerializable;
use Rebilly\Sdk\Trait\HasMetadata;

abstract class GatewayAccount implements JsonSerializable
{
    use HasMetadata;

    public const GATEWAY_NAME_A1_GATEWAY = 'A1Gateway';

    public const GATEWAY_NAME_ACI = 'ACI';

    public const GATEWAY_NAME_ADYEN = 'Adyen';

    public const GATEWAY_NAME_AERA = 'Aera';

    public const GATEWAY_NAME_AIRCASH = 'Aircash';

    public const GATEWAY_NAME_AIRPAY = 'Airpay';

    public const GATEWAY_NAME_AIRWALLEX = 'Airwallex';

    public const GATEWAY_NAME_ASIA_PAY = 'AsiaPay';

    public const GATEWAY_NAME_AMAZON_PAY = 'AmazonPay';

    public const GATEWAY_NAME_AMEX_VPC = 'AmexVPC';

    public const GATEWAY_NAME_ANTOM = 'Antom';

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

    public const GATEWAY_NAME_CRYPTOMUS = 'Cryptomus';

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

    public const GATEWAY_NAME_ECO_PAYZ_TURKEY = 'ecoPayzTurkey';

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

    public const GATEWAY_NAME_GATE2_WAY = 'gate2way';

    public const GATEWAY_NAME_GET = 'GET';

    public const GATEWAY_NAME_GIGADAT = 'Gigadat';

    public const GATEWAY_NAME_GLOBAL_ONE_PAY = 'GlobalOnePay';

    public const GATEWAY_NAME_GO_CARDLESS = 'GoCardless';

    public const GATEWAY_NAME_GOONEY = 'Gooney';

    public const GATEWAY_NAME_GPAYSAFE = 'Gpaysafe';

    public const GATEWAY_NAME_GREENBOX = 'Greenbox';

    public const GATEWAY_NAME_HI_PAY = 'HiPay';

    public const GATEWAY_NAME_I_CASH_ONE = 'iCashOne';

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

    public const GATEWAY_NAME_KUSHKI = 'Kushki';

    public const GATEWAY_NAME_LA_CORE = 'LaCore';

    public const GATEWAY_NAME_LIMEPAY = 'Limepay';

    public const GATEWAY_NAME_LOONIO = 'Loonio';

    public const GATEWAY_NAME_LOONIE = 'loonie';

    public const GATEWAY_NAME_LPG = 'LPG';

    public const GATEWAY_NAME_MAXI_CASH = 'MaxiCash';

    public const GATEWAY_NAME_MERCADO_PAGO = 'MercadoPago';

    public const GATEWAY_NAME_MI_FINITY = 'MiFinity';

    public const GATEWAY_NAME_MOLLIE = 'Mollie';

    public const GATEWAY_NAME_MOBILE_PAY = 'MobilePay';

    public const GATEWAY_NAME_MONERIS = 'Moneris';

    public const GATEWAY_NAME_MONOLO = 'Monolo';

    public const GATEWAY_NAME_MON_REM = 'MonRem';

    public const GATEWAY_NAME_MTA_PAY = 'MtaPay';

    public const GATEWAY_NAME_MUCH_BETTER = 'MuchBetter';

    public const GATEWAY_NAME_MUCH_BETTER_GATEWAY = 'MuchBetterGateway';

    public const GATEWAY_NAME_MY_FATOORAH = 'MyFatoorah';

    public const GATEWAY_NAME_NAEWE = 'Naewe';

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

    public const GATEWAY_NAME_PAYBILT = 'Paybilt';

    public const GATEWAY_NAME_PAY_CASH = 'PayCash';

    public const GATEWAY_NAME_PAYCLY = 'Paycly';

    public const GATEWAY_NAME_PAY_CLUB = 'PayClub';

    public const GATEWAY_NAME_PAY_COM = 'PayCom';

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

    public const GATEWAY_NAME_PAY_XPERT = 'PayXpert';

    public const GATEWAY_NAME_PHAROS_PAYMENTS = 'PharosPayments';

    public const GATEWAY_NAME_PIASTRIX = 'Piastrix';

    public const GATEWAY_NAME_PIN4_PAY = 'Pin4Pay';

    public const GATEWAY_NAME_PLUGNPAY = 'Plugnpay';

    public const GATEWAY_NAME_POST_FINANCE = 'PostFinance';

    public const GATEWAY_NAME_POWERTRANZ = 'Powertranz';

    public const GATEWAY_NAME_PPRO = 'PPRO';

    public const GATEWAY_NAME_PROSA = 'Prosa';

    public const GATEWAY_NAME_P_SI_GATE = 'PSiGate';

    public const GATEWAY_NAME_QUICKPAY = 'Quickpay';

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

    public const GATEWAY_NAME_SPLITIT = 'Splitit';

    public const GATEWAY_NAME_STATIC_GATEWAY = 'StaticGateway';

    public const GATEWAY_NAME_STP_MEXICO = 'STPMexico';

    public const GATEWAY_NAME_STRIPE = 'Stripe';

    public const GATEWAY_NAME_TABBY = 'Tabby';

    public const GATEWAY_NAME_TELR = 'Telr';

    public const GATEWAY_NAME_TEST_PROCESSOR = 'TestProcessor';

    public const GATEWAY_NAME_TODITO_CASH = 'ToditoCash';

    public const GATEWAY_NAME_TRIPLE000 = 'Triple000';

    public const GATEWAY_NAME_TRUEVO = 'Truevo';

    public const GATEWAY_NAME_TRUSTS_PAY = 'TrustsPay';

    public const GATEWAY_NAME_TRUSTLY = 'Trustly';

    public const GATEWAY_NAME_TWINT = 'TWINT';

    public const GATEWAY_NAME_TXN = 'Txn';

    public const GATEWAY_NAME_UNLIMIT = 'Unlimit';

    public const GATEWAY_NAME_U_PAY_CARD = 'UPayCard';

    public const GATEWAY_NAME_US_AE_PAY = 'USAePay';

    public const GATEWAY_NAME_VANTIV_LITLE = 'VantivLitle';

    public const GATEWAY_NAME_VEGAA_H = 'vegaaH';

    public const GATEWAY_NAME_V_CREDITOS = 'VCreditos';

    public const GATEWAY_NAME_VEGA_WALLET = 'VegaWallet';

    public const GATEWAY_NAME_VIVA = 'Viva';

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

    public const ACQUIRER_NAME_AERA = 'Aera';

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

    public const ACQUIRER_NAME_B_S = 'B+S';

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

    public const ACQUIRER_NAME_GATE2_WAY = 'gate2way';

    public const ACQUIRER_NAME_GIGADAT = 'Gigadat';

    public const ACQUIRER_NAME_GLOBAL_EAST = 'Global East';

    public const ACQUIRER_NAME_GOONEY = 'Gooney';

    public const ACQUIRER_NAME_GPAYSAFE = 'Gpaysafe';

    public const ACQUIRER_NAME_HEARTLAND = 'Heartland';

    public const ACQUIRER_NAME_HI_PAY = 'HiPay';

    public const ACQUIRER_NAME_HSBC = 'HSBC';

    public const ACQUIRER_NAME_I_CASH_ONE = 'iCashOne';

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

    public const ACQUIRER_NAME_KUSHKI = 'Kushki';

    public const ACQUIRER_NAME_LIMEPAY = 'Limepay';

    public const ACQUIRER_NAME_LOONIO = 'Loonio';

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

    public const ACQUIRER_NAME_MON_REM = 'MonRem';

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

    public const ACQUIRER_NAME_PAY4_FUN = 'Pay4fun';

    public const ACQUIRER_NAME_PAYBILT = 'Paybilt';

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

    public const ACQUIRER_NAME_TABBY = 'Tabby';

    public const ACQUIRER_NAME_TBI = 'TBI';

    public const ACQUIRER_NAME_TELR = 'Telr';

    public const ACQUIRER_NAME_TEST_PROCESSOR = 'TestProcessor';

    public const ACQUIRER_NAME_TODITO_CASH = 'ToditoCash';

    public const ACQUIRER_NAME_TRIPLE000 = 'Triple000';

    public const ACQUIRER_NAME_TRUEVO = 'Truevo';

    public const ACQUIRER_NAME_TRUSTLY = 'Trustly';

    public const ACQUIRER_NAME_TRUST_PAY = 'TrustPay';

    public const ACQUIRER_NAME_TRUSTS_PAY = 'TrustsPay';

    public const ACQUIRER_NAME_TSYS = 'TSYS';

    public const ACQUIRER_NAME_TWINT = 'TWINT';

    public const ACQUIRER_NAME_TXN = 'Txn';

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

    public const METHOD_ADV_CASH = 'AdvCash';

    public const METHOD_AERA = 'Aera';

    public const METHOD_AFFIRM = 'Affirm';

    public const METHOD_AFTERPAY = 'Afterpay';

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

    public const METHOD_BANK_TRANSFER2 = 'bank-transfer-2';

    public const METHOD_BANK_TRANSFER3 = 'bank-transfer-3';

    public const METHOD_BANK_TRANSFER4 = 'bank-transfer-4';

    public const METHOD_BANK_TRANSFER5 = 'bank-transfer-5';

    public const METHOD_BANK_TRANSFER6 = 'bank-transfer-6';

    public const METHOD_BANK_TRANSFER7 = 'bank-transfer-7';

    public const METHOD_BANK_TRANSFER8 = 'bank-transfer-8';

    public const METHOD_BANK_TRANSFER9 = 'bank-transfer-9';

    public const METHOD_BALOTO = 'Baloto';

    public const METHOD_BEELINE = 'Beeline';

    public const METHOD_BELFIUS_DIRECT_NET = 'Belfius-direct-net';

    public const METHOD_BITCOIN = 'bitcoin';

    public const METHOD_BIZUM = 'Bizum';

    public const METHOD_BLIK = 'Blik';

    public const METHOD_BOLETO = 'Boleto';

    public const METHOD_BOLETO2 = 'Boleto-2';

    public const METHOD_BOLETO3 = 'Boleto-3';

    public const METHOD_CASH_DEPOSIT = 'cash-deposit';

    public const METHOD_CAS_HLIB = 'CASHlib';

    public const METHOD_CASH_TO_CODE = 'CashToCode';

    public const METHOD_CC_AVENUE = 'CCAvenue';

    public const METHOD_CHINA_UNION_PAY = 'China UnionPay';

    public const METHOD_CLEARPAY = 'Clearpay';

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

    public const METHOD_ECO_PAYZ_TURKEY = 'ecoPayzTurkey';

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

    public const METHOD_MOLLIE = 'Mollie';

    public const METHOD_MULTIBANCO = 'Multibanco';

    public const METHOD_BANCONTACT = 'Bancontact';

    public const METHOD_BANCONTACT_MOBILE = 'Bancontact-mobile';

    public const METHOD_MTS = 'MTS';

    public const METHOD_MUCH_BETTER = 'MuchBetter';

    public const METHOD_MUCH_BETTER_VOUCHER = 'MuchBetterVoucher';

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

    public const METHOD_QUICKPAY = 'Quickpay';

    public const METHOD_RAPYD_CHECKOUT = 'rapyd-checkout';

    public const METHOD_REBILLY_HOSTED_PAYMENT_FORM = 'rebilly-hosted-payment-form';

    public const METHOD_RESURS = 'Resurs';

    public const METHOD_REVERSE_WITHDRAWAL = 'reverse-withdrawal';

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

    public const METHOD_VIVA = 'Viva';

    public const METHOD_VOUCHER = 'voucher';

    public const METHOD_VOUCHER2 = 'voucher-2';

    public const METHOD_VOUCHER3 = 'voucher-3';

    public const METHOD_VOUCHER4 = 'voucher-4';

    public const METHOD_WALLET88 = 'Wallet88';

    public const METHOD_WEBMONEY = 'Webmoney';

    public const METHOD_WEBPAY = 'Webpay';

    public const METHOD_WEBPAY2 = 'Webpay-2';

    public const METHOD_WEBPAY_CARD = 'Webpay Card';

    public const METHOD_WE_CHAT_PAY = 'WeChat Pay';

    public const METHOD_X_PAY_P2_P = 'XPay-P2P';

    public const METHOD_X_PAY_QR = 'XPay-QR';

    public const METHOD_YANDEX_MONEY = 'Yandex-money';

    public const METHOD_ZOTAPAY = 'Zotapay';

    public const METHOD_ZIMPLER = 'Zimpler';

    public const METHOD_ZIP = 'Zip';

    public const PAYMENT_CARD_SCHEMES_VISA = 'Visa';

    public const PAYMENT_CARD_SCHEMES_MASTER_CARD = 'MasterCard';

    public const PAYMENT_CARD_SCHEMES_AMERICAN_EXPRESS = 'American Express';

    public const PAYMENT_CARD_SCHEMES_DISCOVER = 'Discover';

    public const PAYMENT_CARD_SCHEMES_MAESTRO = 'Maestro';

    public const PAYMENT_CARD_SCHEMES_SOLO = 'Solo';

    public const PAYMENT_CARD_SCHEMES_ELECTRON = 'Electron';

    public const PAYMENT_CARD_SCHEMES_JCB = 'JCB';

    public const PAYMENT_CARD_SCHEMES_VOYAGER = 'Voyager';

    public const PAYMENT_CARD_SCHEMES_DINERS_CLUB = 'Diners Club';

    public const PAYMENT_CARD_SCHEMES_SWITCH = 'Switch';

    public const PAYMENT_CARD_SCHEMES_LASER = 'Laser';

    public const PAYMENT_CARD_SCHEMES_CHINA_UNION_PAY = 'China UnionPay';

    public const PAYMENT_CARD_SCHEMES_ASTRO_PAY_CARD = 'AstroPay Card';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_PENDING = 'pending';

    public const STATUS_CLOSED = 'closed';

    public const SETUP_INSTRUCTION_AUTHORIZE = 'authorize';

    public const SETUP_INSTRUCTION_AUTHORIZE_AND_VOID = 'authorize-and-void';

    public const SETUP_INSTRUCTION_SCA = 'sca';

    public const SETUP_INSTRUCTION_DO_NOTHING = 'do-nothing';

    public const READY_TO_PAYOUT_INSTRUCTION_ALL = 'all';

    public const READY_TO_PAYOUT_INSTRUCTION_COVERED_PAYOUT = 'covered-payout';

    public const READY_TO_PAYOUT_INSTRUCTION_APPROVED_PAYMENT = 'approved-payment';

    public const READY_TO_PAYOUT_INSTRUCTION_NONE = 'none';

    private array $fields = [];

    protected function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('acquirerName', $data)) {
            $this->setAcquirerName($data['acquirerName']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('acceptedCurrencies', $data)) {
            $this->setAcceptedCurrencies($data['acceptedCurrencies']);
        }
        if (array_key_exists('paymentCardSchemes', $data)) {
            $this->setPaymentCardSchemes($data['paymentCardSchemes']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('merchantCategoryCode', $data)) {
            $this->setMerchantCategoryCode($data['merchantCategoryCode']);
        }
        if (array_key_exists('dccMarkup', $data)) {
            $this->setDccMarkup($data['dccMarkup']);
        }
        if (array_key_exists('dccForceCurrency', $data)) {
            $this->setDccForceCurrency($data['dccForceCurrency']);
        }
        if (array_key_exists('dccForceRounding', $data)) {
            $this->setDccForceRounding($data['dccForceRounding']);
        }
        if (array_key_exists('descriptor', $data)) {
            $this->setDescriptor($data['descriptor']);
        }
        if (array_key_exists('cityField', $data)) {
            $this->setCityField($data['cityField']);
        }
        if (array_key_exists('excludedDccQuoteCurrencies', $data)) {
            $this->setExcludedDccQuoteCurrencies($data['excludedDccQuoteCurrencies']);
        }
        if (array_key_exists('monthlyLimit', $data)) {
            $this->setMonthlyLimit($data['monthlyLimit']);
        }
        if (array_key_exists('approvalWindowTtl', $data)) {
            $this->setApprovalWindowTtl($data['approvalWindowTtl']);
        }
        if (array_key_exists('reconciliationWindowEnabled', $data)) {
            $this->setReconciliationWindowEnabled($data['reconciliationWindowEnabled']);
        }
        if (array_key_exists('reconciliationWindowTtl', $data)) {
            $this->setReconciliationWindowTtl($data['reconciliationWindowTtl']);
        }
        if (array_key_exists('threeDSecure', $data)) {
            $this->setThreeDSecure($data['threeDSecure']);
        }
        if (array_key_exists('dynamicDescriptor', $data)) {
            $this->setDynamicDescriptor($data['dynamicDescriptor']);
        }
        if (array_key_exists('digitalWallets', $data)) {
            $this->setDigitalWallets($data['digitalWallets']);
        }
        if (array_key_exists('isDown', $data)) {
            $this->setIsDown($data['isDown']);
        }
        if (array_key_exists('additionalFilters', $data)) {
            $this->setAdditionalFilters($data['additionalFilters']);
        }
        if (array_key_exists('timeout', $data)) {
            $this->setTimeout($data['timeout']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('sticky', $data)) {
            $this->setSticky($data['sticky']);
        }
        if (array_key_exists('setupInstruction', $data)) {
            $this->setSetupInstruction($data['setupInstruction']);
        }
        if (array_key_exists('readyToPayoutInstruction', $data)) {
            $this->setReadyToPayoutInstruction($data['readyToPayoutInstruction']);
        }
        if (array_key_exists('transactionEmailAliasTemplate', $data)) {
            $this->setTransactionEmailAliasTemplate($data['transactionEmailAliasTemplate']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        switch ($data['gatewayName']) {
            case 'A1Gateway':
                return A1Gateway::from($data, $metadata);
            case 'ACI':
                return ACI::from($data, $metadata);
            case 'Adyen':
                return Adyen::from($data, $metadata);
            case 'Aera':
                return Aera::from($data, $metadata);
            case 'Aircash':
                return Aircash::from($data, $metadata);
            case 'Airpay':
                return Airpay::from($data, $metadata);
            case 'Airwallex':
                return Airwallex::from($data, $metadata);
            case 'AmazonPay':
                return AmazonPay::from($data, $metadata);
            case 'AmexVPC':
                return AmexVPC::from($data, $metadata);
            case 'Antom':
                return Antom::from($data, $metadata);
            case 'ApcoPay':
                return ApcoPay::from($data, $metadata);
            case 'AsiaPay':
                return AsiaPay::from($data, $metadata);
            case 'AsiaPaymentGateway':
                return AsiaPaymentGateway::from($data, $metadata);
            case 'AstroPayCard':
                return AstroPayCard::from($data, $metadata);
            case 'AuthorizeNet':
                return AuthorizeNet::from($data, $metadata);
            case 'Awepay':
                return Awepay::from($data, $metadata);
            case 'Bambora':
                return Bambora::from($data, $metadata);
            case 'BankSEND':
                return BankSEND::from($data, $metadata);
            case 'BitPay':
                return BitPay::from($data, $metadata);
            case 'BlueSnap':
                return BlueSnap::from($data, $metadata);
            case 'BraintreePayments':
                return BraintreePayments::from($data, $metadata);
            case 'Buckaroo':
                return Buckaroo::from($data, $metadata);
            case 'BVNK':
                return BVNK::from($data, $metadata);
            case 'Cardknox':
                return Cardknox::from($data, $metadata);
            case 'Cashflows':
                return Cashflows::from($data, $metadata);
            case 'CASHlib':
                return CASHlib::from($data, $metadata);
            case 'Cashterminal':
                return Cashterminal::from($data, $metadata);
            case 'CashToCode':
                return CashToCode::from($data, $metadata);
            case 'CauriPayment':
                return CauriPayment::from($data, $metadata);
            case 'Cayan':
                return Cayan::from($data, $metadata);
            case 'CCAvenue':
                return CCAvenue::from($data, $metadata);
            case 'Chase':
                return Chase::from($data, $metadata);
            case 'CheckoutCom':
                return CheckoutCom::from($data, $metadata);
            case 'Chillstock':
                return Chillstock::from($data, $metadata);
            case 'Circle':
                return Circle::from($data, $metadata);
            case 'Citadel':
                return Citadel::from($data, $metadata);
            case 'Clearhaus':
                return Clearhaus::from($data, $metadata);
            case 'Cleo':
                return Cleo::from($data, $metadata);
            case 'CODVoucher':
                return CODVoucher::from($data, $metadata);
            case 'Coinbase':
                return Coinbase::from($data, $metadata);
            case 'CoinGate':
                return CoinGate::from($data, $metadata);
            case 'CoinPayments':
                return CoinPayments::from($data, $metadata);
            case 'Conekta':
                return Conekta::from($data, $metadata);
            case 'Coppr':
                return Coppr::from($data, $metadata);
            case 'Credorax':
                return Credorax::from($data, $metadata);
            case 'Cryptomus':
                return Cryptomus::from($data, $metadata);
            case 'Cryptonator':
                return Cryptonator::from($data, $metadata);
            case 'CyberSource':
                return CyberSource::from($data, $metadata);
            case 'DataCash':
                return DataCash::from($data, $metadata);
            case 'Dengi':
                return Dengi::from($data, $metadata);
            case 'Dimoco':
                return Dimoco::from($data, $metadata);
            case 'Directa24':
                return Directa24::from($data, $metadata);
            case 'dLocal':
                return DLocal::from($data, $metadata);
            case 'Dragonphoenix':
                return Dragonphoenix::from($data, $metadata);
            case 'Dropayment':
                return Dropayment::from($data, $metadata);
            case 'EasyPayDirect':
                return EasyPayDirect::from($data, $metadata);
            case 'EBANX':
                return EBANX::from($data, $metadata);
            case 'ecoPayz':
                return EcoPayz::from($data, $metadata);
            case 'ecoPayzTurkey':
                return EcoPayzTurkey::from($data, $metadata);
            case 'EcorePay':
                return EcorePay::from($data, $metadata);
            case 'Elavon':
                return Elavon::from($data, $metadata);
            case 'eMerchantPay':
                return EMerchantPay::from($data, $metadata);
            case 'EMS':
                return EMS::from($data, $metadata);
            case 'ePay':
                return EPay::from($data, $metadata);
            case 'EPG':
                return EPG::from($data, $metadata);
            case 'EPro':
                return EPro::from($data, $metadata);
            case 'Euteller':
                return Euteller::from($data, $metadata);
            case 'Ezeebill':
                return Ezeebill::from($data, $metadata);
            case 'eZeeWallet':
                return EZeeWallet::from($data, $metadata);
            case 'ezyEFT':
                return EzyEFT::from($data, $metadata);
            case 'Finrax':
                return Finrax::from($data, $metadata);
            case 'FinTecSystems':
                return FinTecSystems::from($data, $metadata);
            case 'Flexepin':
                return Flexepin::from($data, $metadata);
            case 'Forte':
                return Forte::from($data, $metadata);
            case 'FundSend':
                return FundSend::from($data, $metadata);
            case 'gate2way':
                return Gate2way::from($data, $metadata);
            case 'GET':
                return GET::from($data, $metadata);
            case 'Gigadat':
                return Gigadat::from($data, $metadata);
            case 'GlobalOne':
                return GlobalOne::from($data, $metadata);
            case 'GoCardless':
                return GoCardless::from($data, $metadata);
            case 'Gooney':
                return Gooney::from($data, $metadata);
            case 'Gpaysafe':
                return Gpaysafe::from($data, $metadata);
            case 'Greenbox':
                return Greenbox::from($data, $metadata);
            case 'HiPay':
                return HiPay::from($data, $metadata);
            case 'iCanPay':
                return ICanPay::from($data, $metadata);
            case 'iCashOne':
                return ICashOne::from($data, $metadata);
            case 'ICEPAY':
                return ICEPAY::from($data, $metadata);
            case 'iCheque':
                return ICheque::from($data, $metadata);
            case 'iDebit':
                return IDebit::from($data, $metadata);
            case 'Ilixium':
                return Ilixium::from($data, $metadata);
            case 'Ingenico':
                return Ingenico::from($data, $metadata);
            case 'INOVAPAY':
                return INOVAPAY::from($data, $metadata);
            case 'Inovio':
                return Inovio::from($data, $metadata);
            case 'InstaDebit':
                return InstaDebit::from($data, $metadata);
            case 'Intuit':
                return Intuit::from($data, $metadata);
            case 'IpayOptions':
                return IpayOptions::from($data, $metadata);
            case 'Jeton':
                return Jeton::from($data, $metadata);
            case 'JetPay':
                return JetPay::from($data, $metadata);
            case 'JPMOrbital':
                return JPMOrbital::from($data, $metadata);
            case 'Khelocard':
                return Khelocard::from($data, $metadata);
            case 'Klarna':
                return Klarna::from($data, $metadata);
            case 'Konnektive':
                return Konnektive::from($data, $metadata);
            case 'Kushki':
                return Kushki::from($data, $metadata);
            case 'LaCore':
                return LaCore::from($data, $metadata);
            case 'Limepay':
                return Limepay::from($data, $metadata);
            case 'loonie':
                return Loonie::from($data, $metadata);
            case 'Loonio':
                return Loonio::from($data, $metadata);
            case 'LPG':
                return LPG::from($data, $metadata);
            case 'MaxiCash':
                return MaxiCash::from($data, $metadata);
            case 'MercadoPago':
                return MercadoPago::from($data, $metadata);
            case 'MiFinity':
                return MiFinity::from($data, $metadata);
            case 'MobilePay':
                return MobilePay::from($data, $metadata);
            case 'Mollie':
                return Mollie::from($data, $metadata);
            case 'Moneris':
                return Moneris::from($data, $metadata);
            case 'Monolo':
                return Monolo::from($data, $metadata);
            case 'MonRem':
                return MonRem::from($data, $metadata);
            case 'MtaPay':
                return MtaPay::from($data, $metadata);
            case 'MuchBetter':
                return MuchBetter::from($data, $metadata);
            case 'MuchBetterGateway':
                return MuchBetterGateway::from($data, $metadata);
            case 'MyFatoorah':
                return MyFatoorah::from($data, $metadata);
            case 'Naewe':
                return Naewe::from($data, $metadata);
            case 'Neosurf':
                return Neosurf::from($data, $metadata);
            case 'Netbanking':
                return Netbanking::from($data, $metadata);
            case 'Neteller':
                return Neteller::from($data, $metadata);
            case 'NGenius':
                return NGenius::from($data, $metadata);
            case 'NinjaWallet':
                return NinjaWallet::from($data, $metadata);
            case 'NMI':
                return NMI::from($data, $metadata);
            case 'NordikCoin':
                return NordikCoin::from($data, $metadata);
            case 'NOWPayments':
                return NOWPayments::from($data, $metadata);
            case 'NuaPay':
                return NuaPay::from($data, $metadata);
            case 'OchaPay':
                return OchaPay::from($data, $metadata);
            case 'OmniMatrix':
                return OmniMatrix::from($data, $metadata);
            case 'Onlineueberweisen':
                return Onlineueberweisen::from($data, $metadata);
            case 'OnRamp':
                return OnRamp::from($data, $metadata);
            case 'Orbital':
                return Orbital::from($data, $metadata);
            case 'Pagadito':
                return Pagadito::from($data, $metadata);
            case 'Pagsmile':
                return Pagsmile::from($data, $metadata);
            case 'Panamerican':
                return Panamerican::from($data, $metadata);
            case 'PandaGateway':
                return PandaGateway::from($data, $metadata);
            case 'ParamountCommerce':
                return ParamountCommerce::from($data, $metadata);
            case 'ParamountEft':
                return ParamountEft::from($data, $metadata);
            case 'ParamountInterac':
                return ParamountInterac::from($data, $metadata);
            case 'Pay4Fun':
                return Pay4Fun::from($data, $metadata);
            case 'Paybilt':
                return Paybilt::from($data, $metadata);
            case 'PayCash':
                return PayCash::from($data, $metadata);
            case 'PayClub':
                return PayClub::from($data, $metadata);
            case 'Paycly':
                return Paycly::from($data, $metadata);
            case 'PayCom':
                return PayCom::from($data, $metadata);
            case 'PayEcards':
                return PayEcards::from($data, $metadata);
            case 'Payeezy':
                return Payeezy::from($data, $metadata);
            case 'Payflow':
                return Payflow::from($data, $metadata);
            case 'PaymentAsia':
                return PaymentAsia::from($data, $metadata);
            case 'PaymenTechnologies':
                return PaymenTechnologies::from($data, $metadata);
            case 'PaymentsOS':
                return PaymentsOS::from($data, $metadata);
            case 'Paymero':
                return Paymero::from($data, $metadata);
            case 'Paynote':
                return Paynote::from($data, $metadata);
            case 'PayPal':
                return PayPal::from($data, $metadata);
            case 'Payper':
                return Payper::from($data, $metadata);
            case 'Payr':
                return Payr::from($data, $metadata);
            case 'PayRedeem':
                return PayRedeem::from($data, $metadata);
            case 'PayRetailers':
                return PayRetailers::from($data, $metadata);
            case 'Paysafe':
                return Paysafe::from($data, $metadata);
            case 'Paysafecard':
                return Paysafecard::from($data, $metadata);
            case 'Paysafecash':
                return Paysafecash::from($data, $metadata);
            case 'PayTabs':
                return PayTabs::from($data, $metadata);
            case 'PayU':
                return PayU::from($data, $metadata);
            case 'PayULatam':
                return PayULatam::from($data, $metadata);
            case 'Payvision':
                return Payvision::from($data, $metadata);
            case 'PayXpert':
                return PayXpert::from($data, $metadata);
            case 'PharosPayments':
                return PharosPayments::from($data, $metadata);
            case 'Piastrix':
                return Piastrix::from($data, $metadata);
            case 'Pin4Pay':
                return Pin4Pay::from($data, $metadata);
            case 'Plugnpay':
                return Plugnpay::from($data, $metadata);
            case 'PostFinance':
                return PostFinance::from($data, $metadata);
            case 'Powertranz':
                return Powertranz::from($data, $metadata);
            case 'PPRO':
                return PPRO::from($data, $metadata);
            case 'Prosa':
                return Prosa::from($data, $metadata);
            case 'PSiGate':
                return PSiGate::from($data, $metadata);
            case 'Quickpay':
                return Quickpay::from($data, $metadata);
            case 'Rapyd':
                return Rapyd::from($data, $metadata);
            case 'Realex':
                return Realex::from($data, $metadata);
            case 'Realtime':
                return Realtime::from($data, $metadata);
            case 'Redsys':
                return Redsys::from($data, $metadata);
            case 'Rotessa':
                return Rotessa::from($data, $metadata);
            case 'RPN':
                return RPN::from($data, $metadata);
            case 'Safecharge':
                return Safecharge::from($data, $metadata);
            case 'Sagepay':
                return Sagepay::from($data, $metadata);
            case 'SaltarPay':
                return SaltarPay::from($data, $metadata);
            case 'SeamlessChex':
                return SeamlessChex::from($data, $metadata);
            case 'SecureTrading':
                return SecureTrading::from($data, $metadata);
            case 'SecurionPay':
                return SecurionPay::from($data, $metadata);
            case 'Skrill':
                return Skrill::from($data, $metadata);
            case 'SmartInvoice':
                return SmartInvoice::from($data, $metadata);
            case 'SMSVoucher':
                return SMSVoucher::from($data, $metadata);
            case 'Sofort':
                return Sofort::from($data, $metadata);
            case 'SparkPay':
                return SparkPay::from($data, $metadata);
            case 'Splitit':
                return Splitit::from($data, $metadata);
            case 'StaticGateway':
                return StaticGateway::from($data, $metadata);
            case 'STPMexico':
                return STPMexico::from($data, $metadata);
            case 'Stripe':
                return Stripe::from($data, $metadata);
            case 'Tabby':
                return Tabby::from($data, $metadata);
            case 'Telr':
                return Telr::from($data, $metadata);
            case 'TestProcessor':
                return TestProcessor::from($data, $metadata);
            case 'ToditoCash':
                return ToditoCash::from($data, $metadata);
            case 'Triple000':
                return Triple000::from($data, $metadata);
            case 'Truevo':
                return Truevo::from($data, $metadata);
            case 'Trustly':
                return Trustly::from($data, $metadata);
            case 'TrustsPay':
                return TrustsPay::from($data, $metadata);
            case 'TWINT':
                return TWINT::from($data, $metadata);
            case 'Txn':
                return Txn::from($data, $metadata);
            case 'Unlimit':
                return Unlimit::from($data, $metadata);
            case 'UPayCard':
                return UPayCard::from($data, $metadata);
            case 'USAePay':
                return USAePay::from($data, $metadata);
            case 'VantivLitle':
                return VantivLitle::from($data, $metadata);
            case 'VCreditos':
                return VCreditos::from($data, $metadata);
            case 'vegaaH':
                return VegaaH::from($data, $metadata);
            case 'VegaWallet':
                return VegaWallet::from($data, $metadata);
            case 'Viva':
                return Viva::from($data, $metadata);
            case 'Wallet88':
                return Wallet88::from($data, $metadata);
            case 'Walpay':
                return Walpay::from($data, $metadata);
            case 'WesternUnion':
                return WesternUnion::from($data, $metadata);
            case 'Wirecard':
                return Wirecard::from($data, $metadata);
            case 'WorldlineAtosFrankfurt':
                return WorldlineAtosFrankfurt::from($data, $metadata);
            case 'Worldpay':
                return Worldpay::from($data, $metadata);
            case 'XPay':
                return XPay::from($data, $metadata);
            case 'Zimpler':
                return Zimpler::from($data, $metadata);
            case 'Zotapay':
                return Zotapay::from($data, $metadata);
        }

        throw new InvalidArgumentException("Unsupported gatewayName value: '{$data['gatewayName']}'");
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getGatewayName(): ?string
    {
        return $this->fields['gatewayName'] ?? null;
    }

    public function getAcquirerName(): ?string
    {
        return $this->fields['acquirerName'] ?? null;
    }

    public function setAcquirerName(null|string $acquirerName): static
    {
        $this->fields['acquirerName'] = $acquirerName;

        return $this;
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

    /**
     * @return string[]
     */
    public function getAcceptedCurrencies(): array
    {
        return $this->fields['acceptedCurrencies'];
    }

    /**
     * @param string[] $acceptedCurrencies
     */
    public function setAcceptedCurrencies(array $acceptedCurrencies): static
    {
        $this->fields['acceptedCurrencies'] = $acceptedCurrencies;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getPaymentCardSchemes(): ?array
    {
        return $this->fields['paymentCardSchemes'] ?? null;
    }

    /**
     * @param null|string[] $paymentCardSchemes
     */
    public function setPaymentCardSchemes(null|array $paymentCardSchemes): static
    {
        $this->fields['paymentCardSchemes'] = $paymentCardSchemes;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getMerchantCategoryCode(): ?string
    {
        return $this->fields['merchantCategoryCode'] ?? null;
    }

    public function setMerchantCategoryCode(null|string $merchantCategoryCode): static
    {
        $this->fields['merchantCategoryCode'] = $merchantCategoryCode;

        return $this;
    }

    public function getDccMarkup(): ?int
    {
        return $this->fields['dccMarkup'] ?? null;
    }

    public function setDccMarkup(null|int $dccMarkup): static
    {
        $this->fields['dccMarkup'] = $dccMarkup;

        return $this;
    }

    public function getDccForceCurrency(): ?string
    {
        return $this->fields['dccForceCurrency'] ?? null;
    }

    public function setDccForceCurrency(null|string $dccForceCurrency): static
    {
        $this->fields['dccForceCurrency'] = $dccForceCurrency;

        return $this;
    }

    public function getDccForceRounding(): ?bool
    {
        return $this->fields['dccForceRounding'] ?? null;
    }

    public function setDccForceRounding(null|bool $dccForceRounding): static
    {
        $this->fields['dccForceRounding'] = $dccForceRounding;

        return $this;
    }

    public function getDescriptor(): ?string
    {
        return $this->fields['descriptor'] ?? null;
    }

    public function setDescriptor(null|string $descriptor): static
    {
        $this->fields['descriptor'] = $descriptor;

        return $this;
    }

    public function getCityField(): ?string
    {
        return $this->fields['cityField'] ?? null;
    }

    public function setCityField(null|string $cityField): static
    {
        $this->fields['cityField'] = $cityField;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getExcludedDccQuoteCurrencies(): ?array
    {
        return $this->fields['excludedDccQuoteCurrencies'] ?? null;
    }

    /**
     * @param null|string[] $excludedDccQuoteCurrencies
     */
    public function setExcludedDccQuoteCurrencies(null|array $excludedDccQuoteCurrencies): static
    {
        $this->fields['excludedDccQuoteCurrencies'] = $excludedDccQuoteCurrencies;

        return $this;
    }

    public function getMonthlyLimit(): ?float
    {
        return $this->fields['monthlyLimit'] ?? null;
    }

    public function setMonthlyLimit(null|float|string $monthlyLimit): static
    {
        if (is_string($monthlyLimit)) {
            $monthlyLimit = (float) $monthlyLimit;
        }

        $this->fields['monthlyLimit'] = $monthlyLimit;

        return $this;
    }

    public function getApprovalWindowTtl(): ?int
    {
        return $this->fields['approvalWindowTtl'] ?? null;
    }

    public function setApprovalWindowTtl(null|int $approvalWindowTtl): static
    {
        $this->fields['approvalWindowTtl'] = $approvalWindowTtl;

        return $this;
    }

    public function getReconciliationWindowEnabled(): ?bool
    {
        return $this->fields['reconciliationWindowEnabled'] ?? null;
    }

    public function setReconciliationWindowEnabled(null|bool $reconciliationWindowEnabled): static
    {
        $this->fields['reconciliationWindowEnabled'] = $reconciliationWindowEnabled;

        return $this;
    }

    public function getReconciliationWindowTtl(): ?int
    {
        return $this->fields['reconciliationWindowTtl'] ?? null;
    }

    public function setReconciliationWindowTtl(null|int $reconciliationWindowTtl): static
    {
        $this->fields['reconciliationWindowTtl'] = $reconciliationWindowTtl;

        return $this;
    }

    public function getThreeDSecure(): ?bool
    {
        return $this->fields['threeDSecure'] ?? null;
    }

    public function setThreeDSecure(null|bool $threeDSecure): static
    {
        $this->fields['threeDSecure'] = $threeDSecure;

        return $this;
    }

    public function getDynamicDescriptor(): ?bool
    {
        return $this->fields['dynamicDescriptor'] ?? null;
    }

    public function setDynamicDescriptor(null|bool $dynamicDescriptor): static
    {
        $this->fields['dynamicDescriptor'] = $dynamicDescriptor;

        return $this;
    }

    public function getDigitalWallets(): ?DigitalWallets
    {
        return $this->fields['digitalWallets'] ?? null;
    }

    public function setDigitalWallets(null|DigitalWallets|array $digitalWallets): static
    {
        if ($digitalWallets !== null && !($digitalWallets instanceof DigitalWallets)) {
            $digitalWallets = DigitalWallets::from($digitalWallets);
        }

        $this->fields['digitalWallets'] = $digitalWallets;

        return $this;
    }

    public function getIsDown(): ?bool
    {
        return $this->fields['isDown'] ?? null;
    }

    public function getAdditionalFilters(): ?string
    {
        return $this->fields['additionalFilters'] ?? null;
    }

    public function setAdditionalFilters(null|string $additionalFilters): static
    {
        $this->fields['additionalFilters'] = $additionalFilters;

        return $this;
    }

    public function getTimeout(): ?int
    {
        return $this->fields['timeout'] ?? null;
    }

    public function setTimeout(null|int $timeout): static
    {
        $this->fields['timeout'] = $timeout;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function getSticky(): ?bool
    {
        return $this->fields['sticky'] ?? null;
    }

    public function setSticky(null|bool $sticky): static
    {
        $this->fields['sticky'] = $sticky;

        return $this;
    }

    public function getSetupInstruction(): ?string
    {
        return $this->fields['setupInstruction'] ?? null;
    }

    public function setSetupInstruction(null|string $setupInstruction): static
    {
        $this->fields['setupInstruction'] = $setupInstruction;

        return $this;
    }

    public function getReadyToPayoutInstruction(): ?string
    {
        return $this->fields['readyToPayoutInstruction'] ?? null;
    }

    public function setReadyToPayoutInstruction(null|string $readyToPayoutInstruction): static
    {
        $this->fields['readyToPayoutInstruction'] = $readyToPayoutInstruction;

        return $this;
    }

    public function getTransactionEmailAliasTemplate(): ?string
    {
        return $this->fields['transactionEmailAliasTemplate'] ?? null;
    }

    public function setTransactionEmailAliasTemplate(null|string $transactionEmailAliasTemplate): static
    {
        $this->fields['transactionEmailAliasTemplate'] = $transactionEmailAliasTemplate;

        return $this;
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

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('acquirerName', $this->fields)) {
            $data['acquirerName'] = $this->fields['acquirerName'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('acceptedCurrencies', $this->fields)) {
            $data['acceptedCurrencies'] = $this->fields['acceptedCurrencies'];
        }
        if (array_key_exists('paymentCardSchemes', $this->fields)) {
            $data['paymentCardSchemes'] = $this->fields['paymentCardSchemes'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('merchantCategoryCode', $this->fields)) {
            $data['merchantCategoryCode'] = $this->fields['merchantCategoryCode'];
        }
        if (array_key_exists('dccMarkup', $this->fields)) {
            $data['dccMarkup'] = $this->fields['dccMarkup'];
        }
        if (array_key_exists('dccForceCurrency', $this->fields)) {
            $data['dccForceCurrency'] = $this->fields['dccForceCurrency'];
        }
        if (array_key_exists('dccForceRounding', $this->fields)) {
            $data['dccForceRounding'] = $this->fields['dccForceRounding'];
        }
        if (array_key_exists('descriptor', $this->fields)) {
            $data['descriptor'] = $this->fields['descriptor'];
        }
        if (array_key_exists('cityField', $this->fields)) {
            $data['cityField'] = $this->fields['cityField'];
        }
        if (array_key_exists('excludedDccQuoteCurrencies', $this->fields)) {
            $data['excludedDccQuoteCurrencies'] = $this->fields['excludedDccQuoteCurrencies'];
        }
        if (array_key_exists('monthlyLimit', $this->fields)) {
            $data['monthlyLimit'] = $this->fields['monthlyLimit'];
        }
        if (array_key_exists('approvalWindowTtl', $this->fields)) {
            $data['approvalWindowTtl'] = $this->fields['approvalWindowTtl'];
        }
        if (array_key_exists('reconciliationWindowEnabled', $this->fields)) {
            $data['reconciliationWindowEnabled'] = $this->fields['reconciliationWindowEnabled'];
        }
        if (array_key_exists('reconciliationWindowTtl', $this->fields)) {
            $data['reconciliationWindowTtl'] = $this->fields['reconciliationWindowTtl'];
        }
        if (array_key_exists('threeDSecure', $this->fields)) {
            $data['threeDSecure'] = $this->fields['threeDSecure'];
        }
        if (array_key_exists('dynamicDescriptor', $this->fields)) {
            $data['dynamicDescriptor'] = $this->fields['dynamicDescriptor'];
        }
        if (array_key_exists('digitalWallets', $this->fields)) {
            $data['digitalWallets'] = $this->fields['digitalWallets']?->jsonSerialize();
        }
        if (array_key_exists('isDown', $this->fields)) {
            $data['isDown'] = $this->fields['isDown'];
        }
        if (array_key_exists('additionalFilters', $this->fields)) {
            $data['additionalFilters'] = $this->fields['additionalFilters'];
        }
        if (array_key_exists('timeout', $this->fields)) {
            $data['timeout'] = $this->fields['timeout'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('sticky', $this->fields)) {
            $data['sticky'] = $this->fields['sticky'];
        }
        if (array_key_exists('setupInstruction', $this->fields)) {
            $data['setupInstruction'] = $this->fields['setupInstruction'];
        }
        if (array_key_exists('readyToPayoutInstruction', $this->fields)) {
            $data['readyToPayoutInstruction'] = $this->fields['readyToPayoutInstruction'];
        }
        if (array_key_exists('transactionEmailAliasTemplate', $this->fields)) {
            $data['transactionEmailAliasTemplate'] = $this->fields['transactionEmailAliasTemplate'];
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setGatewayName(null|string $gatewayName): static
    {
        $this->fields['gatewayName'] = $gatewayName;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setIsDown(null|bool $isDown): static
    {
        $this->fields['isDown'] = $isDown;

        return $this;
    }

    private function setToken(null|string $token): static
    {
        $this->fields['token'] = $token;

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

    private function setOrganizationId(null|string $organizationId): static
    {
        $this->fields['organizationId'] = $organizationId;

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
