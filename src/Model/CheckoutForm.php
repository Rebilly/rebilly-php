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

class CheckoutForm implements JsonSerializable
{
    public const PAYMENT_METHODS_PAYMENT_CARD = 'payment-card';

    public const PAYMENT_METHODS_ACH = 'ach';

    public const PAYMENT_METHODS_CASH = 'cash';

    public const PAYMENT_METHODS_CHECK = 'check';

    public const PAYMENT_METHODS_PAYPAL = 'paypal';

    public const PAYMENT_METHODS_ADV_CASH = 'AdvCash';

    public const PAYMENT_METHODS_AIRCASH = 'Aircash';

    public const PAYMENT_METHODS_AIRPAY = 'Airpay';

    public const PAYMENT_METHODS_ALFA_CLICK = 'Alfa-click';

    public const PAYMENT_METHODS_ALIPAY = 'Alipay';

    public const PAYMENT_METHODS_AMAZON_PAY = 'AmazonPay';

    public const PAYMENT_METHODS_APPLE_PAY = 'Apple Pay';

    public const PAYMENT_METHODS_ASTRO_PAY_CARD = 'AstroPay Card';

    public const PAYMENT_METHODS_ASTRO_PAY_GO = 'AstroPay-GO';

    public const PAYMENT_METHODS_BANK_SEND = 'BankSEND';

    public const PAYMENT_METHODS_BANK_REFERENCED = 'BankReferenced';

    public const PAYMENT_METHODS_BANK_TRANSFER = 'bank-transfer';

    public const PAYMENT_METHODS_BANK_TRANSFER_2 = 'bank-transfer-2';

    public const PAYMENT_METHODS_BANK_TRANSFER_3 = 'bank-transfer-3';

    public const PAYMENT_METHODS_BANK_TRANSFER_4 = 'bank-transfer-4';

    public const PAYMENT_METHODS_BANK_TRANSFER_5 = 'bank-transfer-5';

    public const PAYMENT_METHODS_BANK_TRANSFER_6 = 'bank-transfer-6';

    public const PAYMENT_METHODS_BANK_TRANSFER_7 = 'bank-transfer-7';

    public const PAYMENT_METHODS_BANK_TRANSFER_8 = 'bank-transfer-8';

    public const PAYMENT_METHODS_BANK_TRANSFER_9 = 'bank-transfer-9';

    public const PAYMENT_METHODS_BALOTO = 'Baloto';

    public const PAYMENT_METHODS_BEELINE = 'Beeline';

    public const PAYMENT_METHODS_BELFIUS_DIRECT_NET = 'Belfius-direct-net';

    public const PAYMENT_METHODS_BITCOIN = 'bitcoin';

    public const PAYMENT_METHODS_BIZUM = 'Bizum';

    public const PAYMENT_METHODS_BLIK = 'Blik';

    public const PAYMENT_METHODS_BOLETO = 'Boleto';

    public const PAYMENT_METHODS_BOLETO_2 = 'Boleto-2';

    public const PAYMENT_METHODS_BOLETO_3 = 'Boleto-3';

    public const PAYMENT_METHODS_CASH_DEPOSIT = 'cash-deposit';

    public const PAYMENT_METHODS_CAS_HLIB = 'CASHlib';

    public const PAYMENT_METHODS_CASH_TO_CODE = 'CashToCode';

    public const PAYMENT_METHODS_CC_AVENUE = 'CCAvenue';

    public const PAYMENT_METHODS_CHINA_UNION_PAY = 'China UnionPay';

    public const PAYMENT_METHODS_CLEO = 'Cleo';

    public const PAYMENT_METHODS_COD_VOUCHER = 'CODVoucher';

    public const PAYMENT_METHODS_CONEKTA_OXXO = 'Conekta-oxxo';

    public const PAYMENT_METHODS_CONEKTA_SPEI = 'Conekta-spei';

    public const PAYMENT_METHODS_CRYPTOCURRENCY = 'cryptocurrency';

    public const PAYMENT_METHODS_CUPON_DE_PAGOS = 'Cupon-de-pagos';

    public const PAYMENT_METHODS_CYBER_SOURCE = 'CyberSource';

    public const PAYMENT_METHODS_DIMOCO_PAY_SMART = 'Dimoco-pay-smart';

    public const PAYMENT_METHODS_DIRECTA24_CARD = 'Directa24Card';

    public const PAYMENT_METHODS_DOMESTIC_CARDS = 'domestic-cards';

    public const PAYMENT_METHODS_EFECTY = 'Efecty';

    public const PAYMENT_METHODS_ECHECK = 'echeck';

    public const PAYMENT_METHODS_ECO_PAYZ = 'ecoPayz';

    public const PAYMENT_METHODS_ECO_VOUCHER = 'ecoVoucher';

    public const PAYMENT_METHODS_EPS = 'EPS';

    public const PAYMENT_METHODS_E_PAY_BG = 'ePay.bg';

    public const PAYMENT_METHODS_ETHEREUM = 'Ethereum';

    public const PAYMENT_METHODS_E_WALLET = 'e-wallet';

    public const PAYMENT_METHODS_EZY_EFT = 'ezyEFT';

    public const PAYMENT_METHODS_E_ZEE_WALLET = 'eZeeWallet';

    public const PAYMENT_METHODS_FASTER_PAY = 'FasterPay';

    public const PAYMENT_METHODS_FLEXEPIN = 'Flexepin';

    public const PAYMENT_METHODS_GIROPAY = 'Giropay';

    public const PAYMENT_METHODS_GOOGLE_PAY = 'Google Pay';

    public const PAYMENT_METHODS_GPAYSAFE = 'Gpaysafe';

    public const PAYMENT_METHODS_I_DEBIT = 'iDebit';

    public const PAYMENT_METHODS_I_DEAL = 'iDEAL';

    public const PAYMENT_METHODS_ING_HOMEPAY = 'ING-homepay';

    public const PAYMENT_METHODS_INOVAPAY_PIN = 'INOVAPAY-pin';

    public const PAYMENT_METHODS_INOVAPAY_WALLET = 'INOVAPAY-wallet';

    public const PAYMENT_METHODS_INSTA_DEBIT = 'InstaDebit';

    public const PAYMENT_METHODS_INSTANT_PAYMENTS = 'InstantPayments';

    public const PAYMENT_METHODS_INSTANT_BANK_TRANSFER = 'instant-bank-transfer';

    public const PAYMENT_METHODS_INTERAC_ONLINE = 'Interac-online';

    public const PAYMENT_METHODS_INTERAC_E_TRANSFER = 'Interac-eTransfer';

    public const PAYMENT_METHODS_INTERAC_EXPRESS_CONNECT = 'Interac-express-connect';

    public const PAYMENT_METHODS_INTERAC = 'Interac';

    public const PAYMENT_METHODS_INVOICE = 'invoice';

    public const PAYMENT_METHODS_I_WALLET = 'iWallet';

    public const PAYMENT_METHODS_JETON = 'Jeton';

    public const PAYMENT_METHODS_JPAY = 'jpay';

    public const PAYMENT_METHODS_KAKAO_PAY = 'KakaoPay';

    public const PAYMENT_METHODS_KHELOCARD = 'Khelocard';

    public const PAYMENT_METHODS_KLARNA = 'Klarna';

    public const PAYMENT_METHODS_KNOT = 'KNOT';

    public const PAYMENT_METHODS_LITECOIN = 'Litecoin';

    public const PAYMENT_METHODS_LOONIE = 'loonie';

    public const PAYMENT_METHODS_LPG_ONLINE = 'LPG-online';

    public const PAYMENT_METHODS_LPG_PAYMENT_CARD = 'LPG-payment-card';

    public const PAYMENT_METHODS_MATRIX = 'Matrix';

    public const PAYMENT_METHODS_MAXI_CASH = 'MaxiCash';

    public const PAYMENT_METHODS_MEGAFON = 'Megafon';

    public const PAYMENT_METHODS_MERCADO_PAGO = 'MercadoPago';

    public const PAYMENT_METHODS_MI_FINITY_E_WALLET = 'MiFinity-eWallet';

    public const PAYMENT_METHODS_MISCELLANEOUS = 'miscellaneous';

    public const PAYMENT_METHODS_MOBILE_PAY = 'MobilePay';

    public const PAYMENT_METHODS_MULTIBANCO = 'Multibanco';

    public const PAYMENT_METHODS_BANCONTACT = 'Bancontact';

    public const PAYMENT_METHODS_BANCONTACT_MOBILE = 'Bancontact-mobile';

    public const PAYMENT_METHODS_MTS = 'MTS';

    public const PAYMENT_METHODS_MUCH_BETTER = 'MuchBetter';

    public const PAYMENT_METHODS_MY_FATOORAH = 'MyFatoorah';

    public const PAYMENT_METHODS_NEOSURF = 'Neosurf';

    public const PAYMENT_METHODS_NETBANKING = 'Netbanking';

    public const PAYMENT_METHODS_NETELLER = 'Neteller';

    public const PAYMENT_METHODS_NORDEA_SOLO = 'Nordea-Solo';

    public const PAYMENT_METHODS_NORDIK_COIN = 'NordikCoin';

    public const PAYMENT_METHODS_OCHA_PAY = 'OchaPay';

    public const PAYMENT_METHODS_ONLINE_BANK_TRANSFER = 'online-bank-transfer';

    public const PAYMENT_METHODS_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const PAYMENT_METHODS_ORIENTAL_WALLET = 'oriental-wallet';

    public const PAYMENT_METHODS_OXXO = 'OXXO';

    public const PAYMENT_METHODS_P24 = 'P24';

    public const PAYMENT_METHODS_PAGADITO = 'Pagadito';

    public const PAYMENT_METHODS_PAGO_EFFECTIVO = 'PagoEffectivo';

    public const PAYMENT_METHODS_PAGSMILE_LOTTERY = 'Pagsmile-lottery';

    public const PAYMENT_METHODS_PAGSMILE_DEPOSIT_EXPRESS = 'Pagsmile-deposit-express';

    public const PAYMENT_METHODS_PAY_CASH = 'PayCash';

    public const PAYMENT_METHODS_PAYCO = 'Payco';

    public const PAYMENT_METHODS_PAYEER = 'Payeer';

    public const PAYMENT_METHODS_PAYMENT_ASIA_CRYPTO = 'PaymentAsia-crypto';

    public const PAYMENT_METHODS_PAYSAFECARD = 'Paysafecard';

    public const PAYMENT_METHODS_PAY_TABS = 'PayTabs';

    public const PAYMENT_METHODS_PAY4_FUN = 'Pay4Fun';

    public const PAYMENT_METHODS_PAYNOTE = 'Paynote';

    public const PAYMENT_METHODS_PAYMERO = 'Paymero';

    public const PAYMENT_METHODS_PAYMERO_QR = 'Paymero-QR';

    public const PAYMENT_METHODS_PAY_U = 'PayU';

    public const PAYMENT_METHODS_PAY_U_LATAM = 'PayULatam';

    public const PAYMENT_METHODS_PERFECT_MONEY = 'Perfect-money';

    public const PAYMENT_METHODS_PIASTRIX = 'Piastrix';

    public const PAYMENT_METHODS_PIX = 'PIX';

    public const PAYMENT_METHODS_PIN_PAY = 'PinPay';

    public const PAYMENT_METHODS_PHONE = 'phone';

    public const PAYMENT_METHODS_PHONE_PE = 'PhonePe';

    public const PAYMENT_METHODS_PO_LI = 'POLi';

    public const PAYMENT_METHODS_POST_FINANCE_CARD = 'PostFinance-card';

    public const PAYMENT_METHODS_POST_FINANCE_E_FINANCE = 'PostFinance-e-finance';

    public const PAYMENT_METHODS_QIWI = 'QIWI';

    public const PAYMENT_METHODS_Q_PAY = 'QPay';

    public const PAYMENT_METHODS_QQ_PAY = 'QQPay';

    public const PAYMENT_METHODS_RAPYD_CHECKOUT = 'rapyd-checkout';

    public const PAYMENT_METHODS_REBILLY_HOSTED_PAYMENT_FORM = 'rebilly-hosted-payment-form';

    public const PAYMENT_METHODS_RESURS = 'Resurs';

    public const PAYMENT_METHODS_SAFETY_PAY = 'SafetyPay';

    public const PAYMENT_METHODS_SAMSUNG_PAY = 'Samsung Pay';

    public const PAYMENT_METHODS_SEPA = 'SEPA';

    public const PAYMENT_METHODS_SIIRTO = 'Siirto';

    public const PAYMENT_METHODS_SKRILL = 'Skrill';

    public const PAYMENT_METHODS_SKRILL_RAPID_TRANSFER = 'Skrill Rapid Transfer';

    public const PAYMENT_METHODS_SMS_VOUCHER = 'SMSVoucher';

    public const PAYMENT_METHODS_SOFORT = 'Sofort';

    public const PAYMENT_METHODS_SPARK_PAY = 'SparkPay';

    public const PAYMENT_METHODS_SWIFT_DBT = 'swift-dbt';

    public const PAYMENT_METHODS_TELE2 = 'Tele2';

    public const PAYMENT_METHODS_TELR = 'Telr';

    public const PAYMENT_METHODS_TERMINALY_RF = 'Terminaly-RF';

    public const PAYMENT_METHODS_TETHER = 'Tether';

    public const PAYMENT_METHODS_TODITO_CASH_CARD = 'ToditoCash-card';

    public const PAYMENT_METHODS_TRUSTLY = 'Trustly';

    public const PAYMENT_METHODS_TUPAY = 'Tupay';

    public const PAYMENT_METHODS_TWINT = 'TWINT';

    public const PAYMENT_METHODS_UNI_CRYPT = 'UniCrypt';

    public const PAYMENT_METHODS_U_PAY_CARD = 'UPayCard';

    public const PAYMENT_METHODS_UPI = 'UPI';

    public const PAYMENT_METHODS_USD_COIN = 'USD-coin';

    public const PAYMENT_METHODS_V_CREDITOS = 'VCreditos';

    public const PAYMENT_METHODS_VEGA_WALLET = 'VegaWallet';

    public const PAYMENT_METHODS_VENUS_POINT = 'VenusPoint';

    public const PAYMENT_METHODS_VOUCHER = 'voucher';

    public const PAYMENT_METHODS_VOUCHER_2 = 'voucher-2';

    public const PAYMENT_METHODS_VOUCHER_3 = 'voucher-3';

    public const PAYMENT_METHODS_VOUCHER_4 = 'voucher-4';

    public const PAYMENT_METHODS_WALLET88 = 'Wallet88';

    public const PAYMENT_METHODS_WEBMONEY = 'Webmoney';

    public const PAYMENT_METHODS_WEBPAY = 'Webpay';

    public const PAYMENT_METHODS_WEBPAY_2 = 'Webpay-2';

    public const PAYMENT_METHODS_WEBPAY_CARD = 'Webpay Card';

    public const PAYMENT_METHODS_WE_CHAT_PAY = 'WeChat Pay';

    public const PAYMENT_METHODS_X_PAY_P2_P = 'XPay-P2P';

    public const PAYMENT_METHODS_X_PAY_QR = 'XPay-QR';

    public const PAYMENT_METHODS_YANDEX_MONEY = 'Yandex-money';

    public const PAYMENT_METHODS_ZOTAPAY = 'Zotapay';

    public const PAYMENT_METHODS_ZIMPLER = 'Zimpler';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customDomain', $data)) {
            $this->setCustomDomain($data['customDomain']);
        }
        if (array_key_exists('plans', $data)) {
            $this->setPlans($data['plans']);
        }
        if (array_key_exists('addonPlans', $data)) {
            $this->setAddonPlans($data['addonPlans']);
        }
        if (array_key_exists('bumpPlans', $data)) {
            $this->setBumpPlans($data['bumpPlans']);
        }
        if (array_key_exists('accountsEnabled', $data)) {
            $this->setAccountsEnabled($data['accountsEnabled']);
        }
        if (array_key_exists('couponsEnabled', $data)) {
            $this->setCouponsEnabled($data['couponsEnabled']);
        }
        if (array_key_exists('purchaseLimit', $data)) {
            $this->setPurchaseLimit($data['purchaseLimit']);
        }
        if (array_key_exists('paymentMethods', $data)) {
            $this->setPaymentMethods($data['paymentMethods']);
        }
        if (array_key_exists('customization', $data)) {
            $this->setCustomization($data['customization']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
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

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCustomDomain(): ?string
    {
        return $this->fields['customDomain'] ?? null;
    }

    public function setCustomDomain(null|string $customDomain): static
    {
        $this->fields['customDomain'] = $customDomain;

        return $this;
    }

    /**
     * @return CheckoutFormPlan[]
     */
    public function getPlans(): array
    {
        return $this->fields['plans'];
    }

    /**
     * @param array[]|CheckoutFormPlan[] $plans
     */
    public function setPlans(array $plans): static
    {
        $plans = array_map(
            fn ($value) => $value instanceof CheckoutFormPlan ? $value : CheckoutFormPlanFactory::from($value),
            $plans,
        );

        $this->fields['plans'] = $plans;

        return $this;
    }

    /**
     * @return null|CheckoutFormPlan[]
     */
    public function getAddonPlans(): ?array
    {
        return $this->fields['addonPlans'] ?? null;
    }

    /**
     * @param null|array[]|CheckoutFormPlan[] $addonPlans
     */
    public function setAddonPlans(null|array $addonPlans): static
    {
        $addonPlans = $addonPlans !== null ? array_map(
            fn ($value) => $value instanceof CheckoutFormPlan ? $value : CheckoutFormPlanFactory::from($value),
            $addonPlans,
        ) : null;

        $this->fields['addonPlans'] = $addonPlans;

        return $this;
    }

    /**
     * @return null|CheckoutFormPlan[]
     */
    public function getBumpPlans(): ?array
    {
        return $this->fields['bumpPlans'] ?? null;
    }

    /**
     * @param null|array[]|CheckoutFormPlan[] $bumpPlans
     */
    public function setBumpPlans(null|array $bumpPlans): static
    {
        $bumpPlans = $bumpPlans !== null ? array_map(
            fn ($value) => $value instanceof CheckoutFormPlan ? $value : CheckoutFormPlanFactory::from($value),
            $bumpPlans,
        ) : null;

        $this->fields['bumpPlans'] = $bumpPlans;

        return $this;
    }

    public function getAccountsEnabled(): ?bool
    {
        return $this->fields['accountsEnabled'] ?? null;
    }

    public function setAccountsEnabled(null|bool $accountsEnabled): static
    {
        $this->fields['accountsEnabled'] = $accountsEnabled;

        return $this;
    }

    public function getCouponsEnabled(): ?bool
    {
        return $this->fields['couponsEnabled'] ?? null;
    }

    public function setCouponsEnabled(null|bool $couponsEnabled): static
    {
        $this->fields['couponsEnabled'] = $couponsEnabled;

        return $this;
    }

    public function getPurchaseLimit(): ?int
    {
        return $this->fields['purchaseLimit'] ?? null;
    }

    public function setPurchaseLimit(null|int $purchaseLimit): static
    {
        $this->fields['purchaseLimit'] = $purchaseLimit;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getPaymentMethods(): ?array
    {
        return $this->fields['paymentMethods'] ?? null;
    }

    /**
     * @param null|string[] $paymentMethods
     */
    public function setPaymentMethods(null|array $paymentMethods): static
    {
        $this->fields['paymentMethods'] = $paymentMethods;

        return $this;
    }

    public function getCustomization(): ?CheckoutFormCustomization
    {
        return $this->fields['customization'] ?? null;
    }

    public function setCustomization(null|CheckoutFormCustomization|array $customization): static
    {
        if ($customization !== null && !($customization instanceof CheckoutFormCustomization)) {
            $customization = CheckoutFormCustomization::from($customization);
        }

        $this->fields['customization'] = $customization;

        return $this;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

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
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('customDomain', $this->fields)) {
            $data['customDomain'] = $this->fields['customDomain'];
        }
        if (array_key_exists('plans', $this->fields)) {
            $data['plans'] = $this->fields['plans'];
        }
        if (array_key_exists('addonPlans', $this->fields)) {
            $data['addonPlans'] = $this->fields['addonPlans'];
        }
        if (array_key_exists('bumpPlans', $this->fields)) {
            $data['bumpPlans'] = $this->fields['bumpPlans'];
        }
        if (array_key_exists('accountsEnabled', $this->fields)) {
            $data['accountsEnabled'] = $this->fields['accountsEnabled'];
        }
        if (array_key_exists('couponsEnabled', $this->fields)) {
            $data['couponsEnabled'] = $this->fields['couponsEnabled'];
        }
        if (array_key_exists('purchaseLimit', $this->fields)) {
            $data['purchaseLimit'] = $this->fields['purchaseLimit'];
        }
        if (array_key_exists('paymentMethods', $this->fields)) {
            $data['paymentMethods'] = $this->fields['paymentMethods'];
        }
        if (array_key_exists('customization', $this->fields)) {
            $data['customization'] = $this->fields['customization']?->jsonSerialize();
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

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
