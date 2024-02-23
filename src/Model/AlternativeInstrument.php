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

class AlternativeInstrument implements PaymentInstrument, PostPaymentInstrumentRequest, JsonSerializable
{
    public const METHOD_CASH = 'cash';

    public const METHOD_CHECK = 'check';

    public const METHOD_ADV_CASH = 'AdvCash';

    public const METHOD_AIRCASH = 'Aircash';

    public const METHOD_ALFA_CLICK = 'Alfa-click';

    public const METHOD_ALIPAY = 'Alipay';

    public const METHOD_ASTRO_PAY_CARD = 'AstroPay Card';

    public const METHOD_ASTRO_PAY_GO = 'AstroPay-GO';

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

    public const METHOD_BOLETO = 'Boleto';

    public const METHOD_CASH_DEPOSIT = 'cash-deposit';

    public const METHOD_CAS_HLIB = 'CASHlib';

    public const METHOD_CASH_TO_CODE = 'CashToCode';

    public const METHOD_CHINA_UNION_PAY = 'China UnionPay';

    public const METHOD_CLEO = 'Cleo';

    public const METHOD_COD_VOUCHER = 'CODVoucher';

    public const METHOD_CONEKTA_OXXO = 'Conekta-oxxo';

    public const METHOD_CUPON_DE_PAGOS = 'Cupon-de-pagos';

    public const METHOD_CRYPTOCURRENCY = 'cryptocurrency';

    public const METHOD_DOMESTIC_CARDS = 'domestic-cards';

    public const METHOD_DIRECTA24_CARD = 'Directa24Card';

    public const METHOD_ECO_PAYZ = 'ecoPayz';

    public const METHOD_ECO_VOUCHER = 'ecoVoucher';

    public const METHOD_EFECTY = 'Efecty';

    public const METHOD_EPS = 'EPS';

    public const METHOD_E_PAY_BG = 'ePay.bg';

    public const METHOD_E_ZEE_WALLET = 'eZeeWallet';

    public const METHOD_FASTER_PAY = 'FasterPay';

    public const METHOD_FLEXEPIN = 'Flexepin';

    public const METHOD_GIROPAY = 'Giropay';

    public const METHOD_GPAYSAFE = 'Gpaysafe';

    public const METHOD_GOOGLE_PAY = 'Google Pay';

    public const METHOD_I_DEBIT = 'iDebit';

    public const METHOD_I_DEAL = 'iDEAL';

    public const METHOD_ING_HOMEPAY = 'ING-homepay';

    public const METHOD_INOVAPAY_PIN = 'INOVAPAY-pin';

    public const METHOD_INOVAPAY_WALLET = 'INOVAPAY-wallet';

    public const METHOD_INSTA_DEBIT = 'InstaDebit';

    public const METHOD_INSTANT_BANK_TRANSFER = 'instant-bank-transfer';

    public const METHOD_INSTANT_PAYMENTS = 'InstantPayments';

    public const METHOD_INTERAC = 'Interac';

    public const METHOD_INTERAC_ONLINE = 'Interac-online';

    public const METHOD_INTERAC_E_TRANSFER = 'Interac-eTransfer';

    public const METHOD_INVOICE = 'invoice';

    public const METHOD_I_WALLET = 'iWallet';

    public const METHOD_JETON = 'Jeton';

    public const METHOD_JPAY = 'jpay';

    public const METHOD_KAKAO_PAY = 'KakaoPay';

    public const METHOD_KNOT = 'KNOT';

    public const METHOD_LOONIE = 'loonie';

    public const METHOD_MATRIX = 'Matrix';

    public const METHOD_MAXI_CASH = 'MaxiCash';

    public const METHOD_MEGAFON = 'Megafon';

    public const METHOD_MERCADO_PAGO = 'MercadoPago';

    public const METHOD_MI_FINITY_E_WALLET = 'MiFinity-eWallet';

    public const METHOD_MISCELLANEOUS = 'miscellaneous';

    public const METHOD_MOBILE_PAY = 'MobilePay';

    public const METHOD_BANCONTACT = 'Bancontact';

    public const METHOD_BANCONTACT_MOBILE = 'Bancontact-mobile';

    public const METHOD_MTS = 'MTS';

    public const METHOD_MUCH_BETTER = 'MuchBetter';

    public const METHOD_MULTIBANCO = 'Multibanco';

    public const METHOD_NEOSURF = 'Neosurf';

    public const METHOD_NETBANKING = 'Netbanking';

    public const METHOD_NETELLER = 'Neteller';

    public const METHOD_NORDEA_SOLO = 'Nordea-Solo';

    public const METHOD_OCHA_PAY = 'OchaPay';

    public const METHOD_ONLINE_BANK_TRANSFER = 'online-bank-transfer';

    public const METHOD_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const METHOD_ORIENTAL_WALLET = 'oriental-wallet';

    public const METHOD_OXXO = 'OXXO';

    public const METHOD_P24 = 'P24';

    public const METHOD_PAGADITO = 'Pagadito';

    public const METHOD_PAGO_EFFECTIVO = 'PagoEffectivo';

    public const METHOD_PAGSMILE_DEPOSIT_EXPRESS = 'Pagsmile-deposit-express';

    public const METHOD_PAGSMILE_LOTTERY = 'Pagsmile-lottery';

    public const METHOD_PAY_CASH = 'PayCash';

    public const METHOD_PAYCO = 'Payco';

    public const METHOD_PAYEER = 'Payeer';

    public const METHOD_PAYMENT_ASIA_CRYPTO = 'PaymentAsia-crypto';

    public const METHOD_PAYMERO = 'Paymero';

    public const METHOD_PERFECT_MONEY = 'Perfect-money';

    public const METHOD_PIASTRIX = 'Piastrix';

    public const METHOD_PIX = 'PIX';

    public const METHOD_PAY_TABS = 'PayTabs';

    public const METHOD_PAYSAFECARD = 'Paysafecard';

    public const METHOD_PAYSAFECASH = 'Paysafecash';

    public const METHOD_PAY4_FUN = 'Pay4Fun';

    public const METHOD_PAYNOTE = 'Paynote';

    public const METHOD_PIN_PAY = 'PinPay';

    public const METHOD_PHONE = 'phone';

    public const METHOD_PHONE_PE = 'PhonePe';

    public const METHOD_POLI = 'POLi';

    public const METHOD_POST_FINANCE_CARD = 'PostFinance-card';

    public const METHOD_POST_FINANCE_E_FINANCE = 'PostFinance-e-finance';

    public const METHOD_QIWI = 'QIWI';

    public const METHOD_Q_PAY = 'QPay';

    public const METHOD_QQ_PAY = 'QQPay';

    public const METHOD_RAPYD_CHECKOUT = 'rapyd-checkout';

    public const METHOD_RESURS = 'Resurs';

    public const METHOD_SAFETY_PAY = 'SafetyPay';

    public const METHOD_SAMSUNG_PAY = 'Samsung Pay';

    public const METHOD_SEPA = 'SEPA';

    public const METHOD_SKRILL = 'Skrill';

    public const METHOD_SKRILL_RAPID_TRANSFER = 'Skrill Rapid Transfer';

    public const METHOD_SMS_VOUCHER = 'SMSVoucher';

    public const METHOD_SOFORT = 'Sofort';

    public const METHOD_SPARK_PAY = 'SparkPay';

    public const METHOD_SWIFT_DBT = 'swift-dbt';

    public const METHOD_TELE2 = 'Tele2';

    public const METHOD_TERMINALY_RF = 'Terminaly-RF';

    public const METHOD_TODITO_CASH_CARD = 'ToditoCash-card';

    public const METHOD_TRUSTLY = 'Trustly';

    public const METHOD_TUPAY = 'Tupay';

    public const METHOD_U_PAY_CARD = 'UPayCard';

    public const METHOD_UPI = 'UPI';

    public const METHOD_USD_COIN = 'USD-coin';

    public const METHOD_V_CREDITOS = 'VCreditos';

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

    public const METHOD_WIRE = 'wire';

    public const METHOD_X_PAY_P2_P = 'XPay-P2P';

    public const METHOD_X_PAY_QR = 'XPay-QR';

    public const METHOD_YANDEX_MONEY = 'Yandex-money';

    public const METHOD_ZOTAPAY = 'Zotapay';

    public const METHOD_ZIMPLER = 'Zimpler';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_DEACTIVATED = 'deactivated';

    public const DIGITAL_WALLET_APPLE_PAY = 'Apple Pay';

    public const DIGITAL_WALLET_GOOGLE_PAY = 'Google Pay';

    public const DIGITAL_WALLET_NULL = 'null';

    public const ACCOUNT_NUMBER_TYPE_BBAN = 'BBAN';

    public const ACCOUNT_NUMBER_TYPE_IBAN = 'IBAN';

    public const ACCOUNT_TYPE_CHECKING = 'checking';

    public const ACCOUNT_TYPE_SAVINGS = 'savings';

    public const ACCOUNT_TYPE_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('useAsBackup', $data)) {
            $this->setUseAsBackup($data['useAsBackup']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('stickyGatewayAccountId', $data)) {
            $this->setStickyGatewayAccountId($data['stickyGatewayAccountId']);
        }
        if (array_key_exists('referenceData', $data)) {
            $this->setReferenceData($data['referenceData']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
        if (array_key_exists('last4', $data)) {
            $this->setLast4($data['last4']);
        }
        if (array_key_exists('bin', $data)) {
            $this->setBin($data['bin']);
        }
        if (array_key_exists('bankName', $data)) {
            $this->setBankName($data['bankName']);
        }
        if (array_key_exists('billingPortalUrl', $data)) {
            $this->setBillingPortalUrl($data['billingPortalUrl']);
        }
        if (array_key_exists('bankCountry', $data)) {
            $this->setBankCountry($data['bankCountry']);
        }
        if (array_key_exists('number', $data)) {
            $this->setNumber($data['number']);
        }
        if (array_key_exists('digitalWallet', $data)) {
            $this->setDigitalWallet($data['digitalWallet']);
        }
        if (array_key_exists('expYear', $data)) {
            $this->setExpYear($data['expYear']);
        }
        if (array_key_exists('expirationReminderTime', $data)) {
            $this->setExpirationReminderTime($data['expirationReminderTime']);
        }
        if (array_key_exists('fingerprint', $data)) {
            $this->setFingerprint($data['fingerprint']);
        }
        if (array_key_exists('pan', $data)) {
            $this->setPan($data['pan']);
        }
        if (array_key_exists('brand', $data)) {
            $this->setBrand($data['brand']);
        }
        if (array_key_exists('cvv', $data)) {
            $this->setCvv($data['cvv']);
        }
        if (array_key_exists('accountNumberType', $data)) {
            $this->setAccountNumberType($data['accountNumberType']);
        }
        if (array_key_exists('accountType', $data)) {
            $this->setAccountType($data['accountType']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('expMonth', $data)) {
            $this->setExpMonth($data['expMonth']);
        }
        if (array_key_exists('expirationReminderNumber', $data)) {
            $this->setExpirationReminderNumber($data['expirationReminderNumber']);
        }
        if (array_key_exists('routingNumber', $data)) {
            $this->setRoutingNumber($data['routingNumber']);
        }
        if (array_key_exists('bic', $data)) {
            $this->setBic($data['bic']);
        }
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
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

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

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

    public function getBillingAddress(): ContactObject
    {
        return $this->fields['billingAddress'];
    }

    public function setBillingAddress(ContactObject|array $billingAddress): static
    {
        if (!($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getUseAsBackup(): ?bool
    {
        return $this->fields['useAsBackup'] ?? null;
    }

    public function setUseAsBackup(null|bool $useAsBackup): static
    {
        $this->fields['useAsBackup'] = $useAsBackup;

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

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getStickyGatewayAccountId(): ?string
    {
        return $this->fields['stickyGatewayAccountId'] ?? null;
    }

    /**
     * @return null|array<string,string>
     */
    public function getReferenceData(): ?array
    {
        return $this->fields['referenceData'] ?? null;
    }

    /**
     * @param null|array<string,string> $referenceData
     */
    public function setReferenceData(null|array $referenceData): static
    {
        $this->fields['referenceData'] = $referenceData;

        return $this;
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

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?BankAccountEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|BankAccountEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof BankAccountEmbedded)) {
            $embedded = BankAccountEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function getLast4(): ?string
    {
        return $this->fields['last4'] ?? null;
    }

    public function setLast4(null|string $last4): static
    {
        $this->fields['last4'] = $last4;

        return $this;
    }

    public function getBin(): ?string
    {
        return $this->fields['bin'] ?? null;
    }

    public function getBankName(): ?string
    {
        return $this->fields['bankName'] ?? null;
    }

    public function setBankName(null|string $bankName): static
    {
        $this->fields['bankName'] = $bankName;

        return $this;
    }

    public function getBillingPortalUrl(): ?string
    {
        return $this->fields['billingPortalUrl'] ?? null;
    }

    public function getBankCountry(): ?string
    {
        return $this->fields['bankCountry'] ?? null;
    }

    public function getNumber(): ?string
    {
        return $this->fields['number'] ?? null;
    }

    public function setNumber(null|string $number): static
    {
        $this->fields['number'] = $number;

        return $this;
    }

    public function getDigitalWallet(): ?string
    {
        return $this->fields['digitalWallet'] ?? null;
    }

    public function getExpYear(): int
    {
        return $this->fields['expYear'];
    }

    public function setExpYear(int $expYear): static
    {
        $this->fields['expYear'] = $expYear;

        return $this;
    }

    public function getExpirationReminderTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationReminderTime'] ?? null;
    }

    public function getFingerprint(): ?string
    {
        return $this->fields['fingerprint'] ?? null;
    }

    public function setFingerprint(null|string $fingerprint): static
    {
        $this->fields['fingerprint'] = $fingerprint;

        return $this;
    }

    public function getPan(): string
    {
        return $this->fields['pan'];
    }

    public function setPan(string $pan): static
    {
        $this->fields['pan'] = $pan;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->fields['brand'] ?? null;
    }

    public function setBrand(null|string $brand): static
    {
        $this->fields['brand'] = $brand;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->fields['cvv'] ?? null;
    }

    public function setCvv(null|string $cvv): static
    {
        $this->fields['cvv'] = $cvv;

        return $this;
    }

    public function getAccountNumberType(): ?string
    {
        return $this->fields['accountNumberType'] ?? null;
    }

    public function setAccountNumberType(null|string $accountNumberType): static
    {
        $this->fields['accountNumberType'] = $accountNumberType;

        return $this;
    }

    public function getAccountType(): ?string
    {
        return $this->fields['accountType'] ?? null;
    }

    public function setAccountType(null|string $accountType): static
    {
        $this->fields['accountType'] = $accountType;

        return $this;
    }

    public function getToken(): string
    {
        return $this->fields['token'];
    }

    public function setToken(string $token): static
    {
        $this->fields['token'] = $token;

        return $this;
    }

    public function getExpMonth(): int
    {
        return $this->fields['expMonth'];
    }

    public function setExpMonth(int $expMonth): static
    {
        $this->fields['expMonth'] = $expMonth;

        return $this;
    }

    public function getExpirationReminderNumber(): ?int
    {
        return $this->fields['expirationReminderNumber'] ?? null;
    }

    public function getRoutingNumber(): ?string
    {
        return $this->fields['routingNumber'] ?? null;
    }

    public function setRoutingNumber(null|string $routingNumber): static
    {
        $this->fields['routingNumber'] = $routingNumber;

        return $this;
    }

    public function getBic(): ?string
    {
        return $this->fields['bic'] ?? null;
    }

    public function setBic(null|string $bic): static
    {
        $this->fields['bic'] = $bic;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->fields['username'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('useAsBackup', $this->fields)) {
            $data['useAsBackup'] = $this->fields['useAsBackup'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('stickyGatewayAccountId', $this->fields)) {
            $data['stickyGatewayAccountId'] = $this->fields['stickyGatewayAccountId'];
        }
        if (array_key_exists('referenceData', $this->fields)) {
            $data['referenceData'] = $this->fields['referenceData'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }
        if (array_key_exists('last4', $this->fields)) {
            $data['last4'] = $this->fields['last4'];
        }
        if (array_key_exists('bin', $this->fields)) {
            $data['bin'] = $this->fields['bin'];
        }
        if (array_key_exists('bankName', $this->fields)) {
            $data['bankName'] = $this->fields['bankName'];
        }
        if (array_key_exists('billingPortalUrl', $this->fields)) {
            $data['billingPortalUrl'] = $this->fields['billingPortalUrl'];
        }
        if (array_key_exists('bankCountry', $this->fields)) {
            $data['bankCountry'] = $this->fields['bankCountry'];
        }
        if (array_key_exists('number', $this->fields)) {
            $data['number'] = $this->fields['number'];
        }
        if (array_key_exists('digitalWallet', $this->fields)) {
            $data['digitalWallet'] = $this->fields['digitalWallet'];
        }
        if (array_key_exists('expYear', $this->fields)) {
            $data['expYear'] = $this->fields['expYear'];
        }
        if (array_key_exists('expirationReminderTime', $this->fields)) {
            $data['expirationReminderTime'] = $this->fields['expirationReminderTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('fingerprint', $this->fields)) {
            $data['fingerprint'] = $this->fields['fingerprint'];
        }
        if (array_key_exists('pan', $this->fields)) {
            $data['pan'] = $this->fields['pan'];
        }
        if (array_key_exists('brand', $this->fields)) {
            $data['brand'] = $this->fields['brand'];
        }
        if (array_key_exists('cvv', $this->fields)) {
            $data['cvv'] = $this->fields['cvv'];
        }
        if (array_key_exists('accountNumberType', $this->fields)) {
            $data['accountNumberType'] = $this->fields['accountNumberType'];
        }
        if (array_key_exists('accountType', $this->fields)) {
            $data['accountType'] = $this->fields['accountType'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('expMonth', $this->fields)) {
            $data['expMonth'] = $this->fields['expMonth'];
        }
        if (array_key_exists('expirationReminderNumber', $this->fields)) {
            $data['expirationReminderNumber'] = $this->fields['expirationReminderNumber'];
        }
        if (array_key_exists('routingNumber', $this->fields)) {
            $data['routingNumber'] = $this->fields['routingNumber'];
        }
        if (array_key_exists('bic', $this->fields)) {
            $data['bic'] = $this->fields['bic'];
        }
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

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

    private function setStickyGatewayAccountId(null|string $stickyGatewayAccountId): static
    {
        $this->fields['stickyGatewayAccountId'] = $stickyGatewayAccountId;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

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

    private function setBin(null|string $bin): static
    {
        $this->fields['bin'] = $bin;

        return $this;
    }

    private function setBillingPortalUrl(null|string $billingPortalUrl): static
    {
        $this->fields['billingPortalUrl'] = $billingPortalUrl;

        return $this;
    }

    private function setBankCountry(null|string $bankCountry): static
    {
        $this->fields['bankCountry'] = $bankCountry;

        return $this;
    }

    private function setDigitalWallet(null|string $digitalWallet): static
    {
        $this->fields['digitalWallet'] = $digitalWallet;

        return $this;
    }

    private function setExpirationReminderTime(null|DateTimeImmutable|string $expirationReminderTime): static
    {
        if ($expirationReminderTime !== null && !($expirationReminderTime instanceof DateTimeImmutable)) {
            $expirationReminderTime = new DateTimeImmutable($expirationReminderTime);
        }

        $this->fields['expirationReminderTime'] = $expirationReminderTime;

        return $this;
    }

    private function setExpirationReminderNumber(null|int $expirationReminderNumber): static
    {
        $this->fields['expirationReminderNumber'] = $expirationReminderNumber;

        return $this;
    }

    private function setUsername(null|string $username): static
    {
        $this->fields['username'] = $username;

        return $this;
    }
}
