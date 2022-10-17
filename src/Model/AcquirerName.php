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

enum AcquirerName: string
{
    case ADYEN = 'Adyen';
    case ACI = 'ACI';
    case ALIPAY = 'Alipay';
    case AIB = 'AIB';
    case AIRPAY = 'Airpay';
    case AMAZON_PAY = 'AmazonPay';
    case APCO_PAY = 'ApcoPay';
    case ASIA_PAYMENT_GATEWAY = 'AsiaPaymentGateway';
    case ASTRO_PAY_CARD = 'AstroPay Card';
    case AWEPAY = 'Awepay';
    case IPAY_OPTIONS = 'Ipay Options';
    case BS = 'B+S';
    case BAMBORA = 'Bambora';
    case BIT_PAY = 'BitPay';
    case BANK_OF_AMERICA = 'Bank of America';
    case BANK_OF_MOSCOW = 'Bank of Moscow';
    case BANK_OF_REBILLY = 'Bank of Rebilly';
    case BANK_ONE = 'Bank One';
    case BANK_SEND = 'BankSEND';
    case BMO_HARRIS_BANK = 'BMO Harris Bank';
    case BORGUN = 'Borgun';
    case BRAINTREE_PAYMENTS = 'BraintreePayments';
    case CARDKNOX = 'Cardknox';
    case CAS_HLIB = 'CASHlib';
    case CASHTERMINAL = 'Cashterminal';
    case CASH_TO_CODE = 'CashToCode';
    case CATALUNYA_CAIXA = 'Catalunya Caixa';
    case CC_AVENUE = 'CCAvenue';
    case CHASE = 'Chase';
    case CHECKOUT_COM = 'CheckoutCom';
    case CHINA_UNION_PAY = 'ChinaUnionPay';
    case CIM = 'CIM';
    case CIRCLE = 'Circle';
    case CITADEL = 'Citadel';
    case CLEARHAUS = 'Clearhaus';
    case CLEO = 'Cleo';
    case COD_VOUCHER = 'CODVoucher';
    case COINBASE = 'Coinbase';
    case COIN_GATE = 'CoinGate';
    case COIN_PAYMENTS = 'CoinPayments';
    case CONEKTA = 'Conekta';
    case COPPR = 'Coppr';
    case CREDORAX = 'Credorax';
    case CRYPTONATOR = 'Cryptonator';
    case CYBER_SOURCE = 'CyberSource';
    case DIMOCO = 'Dimoco';
    case D_LOCAL = 'dLocal';
    case DRAGONPHOENIX = 'Dragonphoenix';
    case DROPAYMENT = 'Dropayment';
    case EBANX = 'EBANX';
    case ECO_PAYZ = 'ecoPayz';
    case ECORE_PAY = 'EcorePay';
    case ELAVON = 'Elavon';
    case EMS = 'EMS';
    case E_PAY = 'ePay';
    case EPG = 'EPG';
    case EUTELLER = 'Euteller';
    case E_ZEE_WALLET = 'eZeeWallet';
    case EZY_EFT = 'ezyEFT';
    case FIFTH_THIRD_BANK = 'Fifth Third Bank';
    case FINRAX = 'Finrax';
    case FIRST_DATA_BUYPASS = 'First Data Buypass';
    case FIRST_DATA_NASHVILLE = 'First Data Nashville';
    case FIRST_DATA_NORTH = 'First Data North';
    case FIRST_DATA_OMAHA = 'First Data Omaha';
    case FIN_TEC_SYSTEMS = 'FinTecSystems';
    case FLEXEPIN = 'Flexepin';
    case FORTE = 'Forte';
    case FUND_SEND = 'FundSend';
    case GIGADAT = 'Gigadat';
    case GLOBAL_EAST = 'Global East';
    case GOONEY = 'Gooney';
    case GPAYSAFE = 'Gpaysafe';
    case HEARTLAND = 'Heartland';
    case HI_PAY = 'HiPay';
    case HSBC = 'HSBC';
    case I_CAN_PAY = 'iCanPay';
    case ICEPAY = 'ICEPAY';
    case I_CHEQUE = 'iCheque';
    case ILIXIUM = 'Ilixium';
    case INGENICO = 'Ingenico';
    case INOVAPAY = 'INOVAPAY';
    case INTUIT = 'Intuit';
    case JETON = 'Jeton';
    case KHELOCARD = 'Khelocard';
    case KLARNA = 'Klarna';
    case KONNEKTIVE = 'Konnektive';
    case LOONIE = 'loonie';
    case LPG = 'LPG';
    case MASAPAY = 'Masapay';
    case MAXI_CASH = 'MaxiCash';
    case MERCADO_PAGO = 'MercadoPago';
    case MERRICK = 'Merrick';
    case MISSION_VALLEY_BANK = 'Mission Valley Bank';
    case MI_FINITY = 'MiFinity';
    case MONERIS = 'Moneris';
    case MUCH_BETTER = 'MuchBetter';
    case MUCH_BETTER_GATEWAY = 'MuchBetterGateway';
    case MY_FATOORAH = 'MyFatoorah';
    case NATWEST = 'NATWEST';
    case NEOSURF = 'Neosurf';
    case NETBANKING = 'Netbanking';
    case NETELLER = 'Neteller';
    case NINJA_WALLET = 'NinjaWallet';
    case NMI = 'NMI';
    case NOW_PAYMENTS = 'NOWPayments';
    case NUA_PAY = 'NuaPay';
    case NUVEI = 'Nuvei';
    case OCHA_PAY = 'OchaPay';
    case ONLINEUEBERWEISEN = 'Onlineueberweisen';
    case ON_RAMP = 'OnRamp';
    case OTHER = 'Other';
    case PANAMERICAN = 'Panamerican';
    case PANDA_BANK = 'Panda Bank';
    case PARAMOUNT = 'Paramount';
    case PARAMOUNT_EFT = 'ParamountEft';
    case PARAMOUNT_INTERAC = 'ParamountInterac';
    case PAY4FUN = 'Pay4fun';
    case PAY_CASH = 'PayCash';
    case PAY_CLUB = 'PayClub';
    case PAYMENT_ASIA = 'PaymentAsia';
    case PAYMEN_TECHNOLOGIES = 'PaymenTechnologies';
    case PAYMENTS_OS = 'PaymentsOS';
    case PAYMERO = 'Paymero';
    case PAYNETICS = 'Paynetics';
    case PAY_PAL = 'PayPal';
    case PAYPER = 'Payper';
    case PAYR = 'Payr';
    case PAY_TABS = 'PayTabs';
    case PAY_U_LATAM = 'PayULatam';
    case PAYVISION = 'Payvision';
    case PIASTRIX = 'Piastrix';
    case PIN4_PAY = 'Pin4Pay';
    case PEOPLES_TRUST_COMPANY = 'Peoples Trust Company';
    case POST_FINANCE = 'PostFinance';
    case PPRO = 'PPRO';
    case PRIVATBANK = 'Privatbank';
    case PROSA = 'Prosa';
    case QQ_PAY = 'QQPay';
    case RAPYD = 'Rapyd';
    case RBC = 'RBC';
    case RBS_WORLD_PAY = 'RBS WorldPay';
    case REAL_TIME = 'RealTime';
    case ROTESSA = 'Rotessa';
    case SAFECHARGE = 'Safecharge';
    case SALTAR_PAY = 'SaltarPay';
    case SECURE_TRADING = 'SecureTrading';
    case SECURION_PAY = 'SecurionPay';
    case SKRILL = 'Skrill';
    case SMART_INVOICE = 'SmartInvoice';
    case SMS_VOUCHER = 'SMSVoucher';
    case SOFORT = 'Sofort';
    case SPARK_PAY = 'SparkPay';
    case STATE_BANK_OF_MAURITIUS = 'State Bank of Mauritius';
    case STP_MEXICO = 'STPMexico';
    case STRIPE = 'Stripe';
    case TBI = 'TBI';
    case TELR = 'Telr';
    case TEST_PROCESSOR = 'TestProcessor';
    case TODITO_CASH = 'ToditoCash';
    case TRUEVO = 'Truevo';
    case TRUSTLY = 'Trustly';
    case TRUST_PAY = 'TrustPay';
    case TRUSTS_PAY = 'TrustsPay';
    case TSYS = 'TSYS';
    case TWINT = 'TWINT';
    case U_PAY_CARD = 'UPayCard';
    case VANTIV = 'Vantiv';
    case V_CREDITOS = 'VCreditos';
    case VOICE_PAY = 'VoicePay';
    case WALLET88 = 'Wallet88';
    case WE_CHAT_PAY = 'WeChat Pay';
    case WELLS_FARGO = 'Wells Fargo';
    case WING_HANG_BANK = 'Wing Hang Bank';
    case WIRECARD = 'Wirecard';
    case WORLD_PAY = 'WorldPay';
    case X_PAY = 'XPay';
    case ZIMPLER = 'Zimpler';
    case ZOTAPAY = 'Zotapay';
}
