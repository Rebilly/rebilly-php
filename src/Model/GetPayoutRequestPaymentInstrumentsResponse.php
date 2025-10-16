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

class GetPayoutRequestPaymentInstrumentsResponse implements JsonSerializable
{
    public const GATEWAY_NAME_A1_GATEWAY = 'A1Gateway';

    public const GATEWAY_NAME_ACI = 'ACI';

    public const GATEWAY_NAME_ADYEN = 'Adyen';

    public const GATEWAY_NAME_AERA = 'Aera';

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

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('exposureAmount', $data)) {
            $this->setExposureAmount($data['exposureAmount']);
        }
        if (array_key_exists('previousAllocatedAmount', $data)) {
            $this->setPreviousAllocatedAmount($data['previousAllocatedAmount']);
        }
        if (array_key_exists('lastPaymentTime', $data)) {
            $this->setLastPaymentTime($data['lastPaymentTime']);
        }
        if (array_key_exists('lastPayoutTime', $data)) {
            $this->setLastPayoutTime($data['lastPayoutTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getGatewayName(): ?string
    {
        return $this->fields['gatewayName'] ?? null;
    }

    public function setGatewayName(null|string $gatewayName): static
    {
        $this->fields['gatewayName'] = $gatewayName;

        return $this;
    }

    public function getExposureAmount(): ?float
    {
        return $this->fields['exposureAmount'] ?? null;
    }

    public function setExposureAmount(null|float|string $exposureAmount): static
    {
        if (is_string($exposureAmount)) {
            $exposureAmount = (float) $exposureAmount;
        }

        $this->fields['exposureAmount'] = $exposureAmount;

        return $this;
    }

    public function getPreviousAllocatedAmount(): ?float
    {
        return $this->fields['previousAllocatedAmount'] ?? null;
    }

    public function setPreviousAllocatedAmount(null|float|string $previousAllocatedAmount): static
    {
        if (is_string($previousAllocatedAmount)) {
            $previousAllocatedAmount = (float) $previousAllocatedAmount;
        }

        $this->fields['previousAllocatedAmount'] = $previousAllocatedAmount;

        return $this;
    }

    public function getLastPaymentTime(): ?DateTimeImmutable
    {
        return $this->fields['lastPaymentTime'] ?? null;
    }

    public function setLastPaymentTime(null|DateTimeImmutable|string $lastPaymentTime): static
    {
        if ($lastPaymentTime !== null && !($lastPaymentTime instanceof DateTimeImmutable)) {
            $lastPaymentTime = new DateTimeImmutable($lastPaymentTime);
        }

        $this->fields['lastPaymentTime'] = $lastPaymentTime;

        return $this;
    }

    public function getLastPayoutTime(): ?DateTimeImmutable
    {
        return $this->fields['lastPayoutTime'] ?? null;
    }

    public function setLastPayoutTime(null|DateTimeImmutable|string $lastPayoutTime): static
    {
        if ($lastPayoutTime !== null && !($lastPayoutTime instanceof DateTimeImmutable)) {
            $lastPayoutTime = new DateTimeImmutable($lastPayoutTime);
        }

        $this->fields['lastPayoutTime'] = $lastPayoutTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('exposureAmount', $this->fields)) {
            $data['exposureAmount'] = $this->fields['exposureAmount'];
        }
        if (array_key_exists('previousAllocatedAmount', $this->fields)) {
            $data['previousAllocatedAmount'] = $this->fields['previousAllocatedAmount'];
        }
        if (array_key_exists('lastPaymentTime', $this->fields)) {
            $data['lastPaymentTime'] = $this->fields['lastPaymentTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('lastPayoutTime', $this->fields)) {
            $data['lastPayoutTime'] = $this->fields['lastPayoutTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
