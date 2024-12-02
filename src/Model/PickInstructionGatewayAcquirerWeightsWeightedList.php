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

use JsonSerializable;

class PickInstructionGatewayAcquirerWeightsWeightedList implements JsonSerializable
{
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

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('acquirerName', $data)) {
            $this->setAcquirerName($data['acquirerName']);
        }
        if (array_key_exists('weight', $data)) {
            $this->setWeight($data['weight']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getAcquirerName(): ?string
    {
        return $this->fields['acquirerName'] ?? null;
    }

    public function setAcquirerName(null|string $acquirerName): static
    {
        $this->fields['acquirerName'] = $acquirerName;

        return $this;
    }

    public function getWeight(): int
    {
        return $this->fields['weight'];
    }

    public function setWeight(int $weight): static
    {
        $this->fields['weight'] = $weight;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('acquirerName', $this->fields)) {
            $data['acquirerName'] = $this->fields['acquirerName'];
        }
        if (array_key_exists('weight', $this->fields)) {
            $data['weight'] = $this->fields['weight'];
        }

        return $data;
    }
}
