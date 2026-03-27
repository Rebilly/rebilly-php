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
use Rebilly\Sdk\Trait\HasMetadata;

class PayoutRequestAllocation implements JsonSerializable
{
    use HasMetadata;

    public const PAYMENT_METHOD_ADV_CASH = 'AdvCash';

    public const PAYMENT_METHOD_AERA = 'Aera';

    public const PAYMENT_METHOD_AFFIRM = 'Affirm';

    public const PAYMENT_METHOD_AFTERPAY = 'Afterpay';

    public const PAYMENT_METHOD_AIRCASH = 'Aircash';

    public const PAYMENT_METHOD_AIRPAY = 'Airpay';

    public const PAYMENT_METHOD_ALFA_CLICK = 'Alfa-click';

    public const PAYMENT_METHOD_ALIPAY = 'Alipay';

    public const PAYMENT_METHOD_AMAZON_PAY = 'AmazonPay';

    public const PAYMENT_METHOD_APPLE_PAY = 'Apple Pay';

    public const PAYMENT_METHOD_ASTRO_PAY_CARD = 'AstroPay Card';

    public const PAYMENT_METHOD_ASTRO_PAY_GO = 'AstroPay-GO';

    public const PAYMENT_METHOD_BANK_SEND = 'BankSEND';

    public const PAYMENT_METHOD_BANK_REFERENCED = 'BankReferenced';

    public const PAYMENT_METHOD_BANK_TRANSFER = 'bank-transfer';

    public const PAYMENT_METHOD_BANK_TRANSFER2 = 'bank-transfer-2';

    public const PAYMENT_METHOD_BANK_TRANSFER3 = 'bank-transfer-3';

    public const PAYMENT_METHOD_BANK_TRANSFER4 = 'bank-transfer-4';

    public const PAYMENT_METHOD_BANK_TRANSFER5 = 'bank-transfer-5';

    public const PAYMENT_METHOD_BANK_TRANSFER6 = 'bank-transfer-6';

    public const PAYMENT_METHOD_BANK_TRANSFER7 = 'bank-transfer-7';

    public const PAYMENT_METHOD_BANK_TRANSFER8 = 'bank-transfer-8';

    public const PAYMENT_METHOD_BANK_TRANSFER9 = 'bank-transfer-9';

    public const PAYMENT_METHOD_BALOTO = 'Baloto';

    public const PAYMENT_METHOD_BEELINE = 'Beeline';

    public const PAYMENT_METHOD_BELFIUS_DIRECT_NET = 'Belfius-direct-net';

    public const PAYMENT_METHOD_BITCOIN = 'bitcoin';

    public const PAYMENT_METHOD_BIZUM = 'Bizum';

    public const PAYMENT_METHOD_BLIK = 'Blik';

    public const PAYMENT_METHOD_BOLETO = 'Boleto';

    public const PAYMENT_METHOD_BOLETO2 = 'Boleto-2';

    public const PAYMENT_METHOD_BOLETO3 = 'Boleto-3';

    public const PAYMENT_METHOD_CASH_DEPOSIT = 'cash-deposit';

    public const PAYMENT_METHOD_CAS_HLIB = 'CASHlib';

    public const PAYMENT_METHOD_CASH_TO_CODE = 'CashToCode';

    public const PAYMENT_METHOD_CC_AVENUE = 'CCAvenue';

    public const PAYMENT_METHOD_CHINA_UNION_PAY = 'China UnionPay';

    public const PAYMENT_METHOD_CLEARPAY = 'Clearpay';

    public const PAYMENT_METHOD_CLEO = 'Cleo';

    public const PAYMENT_METHOD_COD_VOUCHER = 'CODVoucher';

    public const PAYMENT_METHOD_CONEKTA_OXXO = 'Conekta-oxxo';

    public const PAYMENT_METHOD_CONEKTA_SPEI = 'Conekta-spei';

    public const PAYMENT_METHOD_CRYPTOCURRENCY = 'cryptocurrency';

    public const PAYMENT_METHOD_CUPON_DE_PAGOS = 'Cupon-de-pagos';

    public const PAYMENT_METHOD_CYBER_SOURCE = 'CyberSource';

    public const PAYMENT_METHOD_DIMOCO_PAY_SMART = 'Dimoco-pay-smart';

    public const PAYMENT_METHOD_DIRECTA24_CARD = 'Directa24Card';

    public const PAYMENT_METHOD_DOMESTIC_CARDS = 'domestic-cards';

    public const PAYMENT_METHOD_EFECTY = 'Efecty';

    public const PAYMENT_METHOD_ECHECK = 'echeck';

    public const PAYMENT_METHOD_ECO_PAYZ = 'ecoPayz';

    public const PAYMENT_METHOD_ECO_PAYZ_TURKEY = 'ecoPayzTurkey';

    public const PAYMENT_METHOD_ECO_VOUCHER = 'ecoVoucher';

    public const PAYMENT_METHOD_EPS = 'EPS';

    public const PAYMENT_METHOD_E_PAY_BG = 'ePay.bg';

    public const PAYMENT_METHOD_ETHEREUM = 'Ethereum';

    public const PAYMENT_METHOD_E_WALLET = 'e-wallet';

    public const PAYMENT_METHOD_EZY_EFT = 'ezyEFT';

    public const PAYMENT_METHOD_E_ZEE_WALLET = 'eZeeWallet';

    public const PAYMENT_METHOD_FASTER_PAY = 'FasterPay';

    public const PAYMENT_METHOD_FLEXEPIN = 'Flexepin';

    public const PAYMENT_METHOD_GIROPAY = 'Giropay';

    public const PAYMENT_METHOD_GOOGLE_PAY = 'Google Pay';

    public const PAYMENT_METHOD_GPAYSAFE = 'Gpaysafe';

    public const PAYMENT_METHOD_I_CASH_ONE_VOUCHER = 'iCashOne Voucher';

    public const PAYMENT_METHOD_I_DEBIT = 'iDebit';

    public const PAYMENT_METHOD_I_DEAL = 'iDEAL';

    public const PAYMENT_METHOD_ING_HOMEPAY = 'ING-homepay';

    public const PAYMENT_METHOD_INOVAPAY_PIN = 'INOVAPAY-pin';

    public const PAYMENT_METHOD_INOVAPAY_WALLET = 'INOVAPAY-wallet';

    public const PAYMENT_METHOD_INSTA_DEBIT = 'InstaDebit';

    public const PAYMENT_METHOD_INSTANT_PAYMENTS = 'InstantPayments';

    public const PAYMENT_METHOD_INSTANT_BANK_TRANSFER = 'instant-bank-transfer';

    public const PAYMENT_METHOD_INTERAC_ONLINE = 'Interac-online';

    public const PAYMENT_METHOD_INTERAC_E_TRANSFER = 'Interac-eTransfer';

    public const PAYMENT_METHOD_INTERAC_EXPRESS_CONNECT = 'Interac-express-connect';

    public const PAYMENT_METHOD_INTERAC = 'Interac';

    public const PAYMENT_METHOD_INVOICE = 'invoice';

    public const PAYMENT_METHOD_I_WALLET = 'iWallet';

    public const PAYMENT_METHOD_JETON = 'Jeton';

    public const PAYMENT_METHOD_JETON_CASH = 'JetonCash';

    public const PAYMENT_METHOD_JPAY = 'jpay';

    public const PAYMENT_METHOD_KAKAO_PAY = 'KakaoPay';

    public const PAYMENT_METHOD_KHELOCARD = 'Khelocard';

    public const PAYMENT_METHOD_KLARNA = 'Klarna';

    public const PAYMENT_METHOD_KNOT = 'KNOT';

    public const PAYMENT_METHOD_LITECOIN = 'Litecoin';

    public const PAYMENT_METHOD_LOONIE = 'loonie';

    public const PAYMENT_METHOD_LPG_ONLINE = 'LPG-online';

    public const PAYMENT_METHOD_LPG_PAYMENT_CARD = 'LPG-payment-card';

    public const PAYMENT_METHOD_MATRIX = 'Matrix';

    public const PAYMENT_METHOD_MAXI_CASH = 'MaxiCash';

    public const PAYMENT_METHOD_MEGAFON = 'Megafon';

    public const PAYMENT_METHOD_MERCADO_PAGO = 'MercadoPago';

    public const PAYMENT_METHOD_MI_FINITY_E_WALLET = 'MiFinity-eWallet';

    public const PAYMENT_METHOD_MISCELLANEOUS = 'miscellaneous';

    public const PAYMENT_METHOD_MOBILE_PAY = 'MobilePay';

    public const PAYMENT_METHOD_MOLLIE = 'Mollie';

    public const PAYMENT_METHOD_MULTIBANCO = 'Multibanco';

    public const PAYMENT_METHOD_BANCONTACT = 'Bancontact';

    public const PAYMENT_METHOD_BANCONTACT_MOBILE = 'Bancontact-mobile';

    public const PAYMENT_METHOD_MTS = 'MTS';

    public const PAYMENT_METHOD_MUCH_BETTER = 'MuchBetter';

    public const PAYMENT_METHOD_MUCH_BETTER_VOUCHER = 'MuchBetterVoucher';

    public const PAYMENT_METHOD_MY_FATOORAH = 'MyFatoorah';

    public const PAYMENT_METHOD_NEOSURF = 'Neosurf';

    public const PAYMENT_METHOD_NETBANKING = 'Netbanking';

    public const PAYMENT_METHOD_NETELLER = 'Neteller';

    public const PAYMENT_METHOD_NORDEA_SOLO = 'Nordea-Solo';

    public const PAYMENT_METHOD_NORDIK_COIN = 'NordikCoin';

    public const PAYMENT_METHOD_OCHA_PAY = 'OchaPay';

    public const PAYMENT_METHOD_ONLINE_BANK_TRANSFER = 'online-bank-transfer';

    public const PAYMENT_METHOD_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const PAYMENT_METHOD_ORIENTAL_WALLET = 'oriental-wallet';

    public const PAYMENT_METHOD_OXXO = 'OXXO';

    public const PAYMENT_METHOD_P24 = 'P24';

    public const PAYMENT_METHOD_PAGADITO = 'Pagadito';

    public const PAYMENT_METHOD_PAGO_EFFECTIVO = 'PagoEffectivo';

    public const PAYMENT_METHOD_PAGSMILE_LOTTERY = 'Pagsmile-lottery';

    public const PAYMENT_METHOD_PAGSMILE_DEPOSIT_EXPRESS = 'Pagsmile-deposit-express';

    public const PAYMENT_METHOD_PAY_CASH = 'PayCash';

    public const PAYMENT_METHOD_PAYCO = 'Payco';

    public const PAYMENT_METHOD_PAYEER = 'Payeer';

    public const PAYMENT_METHOD_PAYMENT_ASIA_CRYPTO = 'PaymentAsia-crypto';

    public const PAYMENT_METHOD_PAYSAFECARD = 'Paysafecard';

    public const PAYMENT_METHOD_PAY_TABS = 'PayTabs';

    public const PAYMENT_METHOD_PAY4_FUN = 'Pay4Fun';

    public const PAYMENT_METHOD_PAYNOTE = 'Paynote';

    public const PAYMENT_METHOD_PAYMERO = 'Paymero';

    public const PAYMENT_METHOD_PAYMERO_QR = 'Paymero-QR';

    public const PAYMENT_METHOD_PAY_U = 'PayU';

    public const PAYMENT_METHOD_PAY_U_LATAM = 'PayULatam';

    public const PAYMENT_METHOD_PERFECT_MONEY = 'Perfect-money';

    public const PAYMENT_METHOD_PIASTRIX = 'Piastrix';

    public const PAYMENT_METHOD_PIX = 'PIX';

    public const PAYMENT_METHOD_PIN_PAY = 'PinPay';

    public const PAYMENT_METHOD_PHONE = 'phone';

    public const PAYMENT_METHOD_PHONE_PE = 'PhonePe';

    public const PAYMENT_METHOD_PO_LI = 'POLi';

    public const PAYMENT_METHOD_POST_FINANCE_CARD = 'PostFinance-card';

    public const PAYMENT_METHOD_POST_FINANCE_E_FINANCE = 'PostFinance-e-finance';

    public const PAYMENT_METHOD_QIWI = 'QIWI';

    public const PAYMENT_METHOD_Q_PAY = 'QPay';

    public const PAYMENT_METHOD_QQ_PAY = 'QQPay';

    public const PAYMENT_METHOD_RAPYD_CHECKOUT = 'rapyd-checkout';

    public const PAYMENT_METHOD_REBILLY_HOSTED_PAYMENT_FORM = 'rebilly-hosted-payment-form';

    public const PAYMENT_METHOD_RESURS = 'Resurs';

    public const PAYMENT_METHOD_REVERSE_WITHDRAWAL = 'reverse-withdrawal';

    public const PAYMENT_METHOD_RIPPLE = 'Ripple';

    public const PAYMENT_METHOD_SAFETY_PAY = 'SafetyPay';

    public const PAYMENT_METHOD_SAMSUNG_PAY = 'Samsung Pay';

    public const PAYMENT_METHOD_SEPA = 'SEPA';

    public const PAYMENT_METHOD_SIIRTO = 'Siirto';

    public const PAYMENT_METHOD_SKRILL = 'Skrill';

    public const PAYMENT_METHOD_SKRILL_RAPID_TRANSFER = 'Skrill Rapid Transfer';

    public const PAYMENT_METHOD_SMS_VOUCHER = 'SMSVoucher';

    public const PAYMENT_METHOD_SOFORT = 'Sofort';

    public const PAYMENT_METHOD_SPARK_PAY = 'SparkPay';

    public const PAYMENT_METHOD_SPEI = 'SPEI';

    public const PAYMENT_METHOD_SWIFT_DBT = 'swift-dbt';

    public const PAYMENT_METHOD_TELE2 = 'Tele2';

    public const PAYMENT_METHOD_TELR = 'Telr';

    public const PAYMENT_METHOD_TERMINALY_RF = 'Terminaly-RF';

    public const PAYMENT_METHOD_TETHER = 'Tether';

    public const PAYMENT_METHOD_TODITO_CASH_CARD = 'ToditoCash-card';

    public const PAYMENT_METHOD_TRUSTLY = 'Trustly';

    public const PAYMENT_METHOD_TUPAY = 'Tupay';

    public const PAYMENT_METHOD_TWINT = 'TWINT';

    public const PAYMENT_METHOD_UNI_CRYPT = 'UniCrypt';

    public const PAYMENT_METHOD_U_PAY_CARD = 'UPayCard';

    public const PAYMENT_METHOD_UPI = 'UPI';

    public const PAYMENT_METHOD_USD_COIN = 'USD-coin';

    public const PAYMENT_METHOD_V_CREDITOS = 'VCreditos';

    public const PAYMENT_METHOD_VEGA_WALLET = 'VegaWallet';

    public const PAYMENT_METHOD_VENUS_POINT = 'VenusPoint';

    public const PAYMENT_METHOD_VIVA = 'Viva';

    public const PAYMENT_METHOD_VOUCHER = 'voucher';

    public const PAYMENT_METHOD_VOUCHER2 = 'voucher-2';

    public const PAYMENT_METHOD_VOUCHER3 = 'voucher-3';

    public const PAYMENT_METHOD_VOUCHER4 = 'voucher-4';

    public const PAYMENT_METHOD_WALLET88 = 'Wallet88';

    public const PAYMENT_METHOD_WEBMONEY = 'Webmoney';

    public const PAYMENT_METHOD_WEBPAY = 'Webpay';

    public const PAYMENT_METHOD_WEBPAY2 = 'Webpay-2';

    public const PAYMENT_METHOD_WEBPAY_CARD = 'Webpay Card';

    public const PAYMENT_METHOD_WE_CHAT_PAY = 'WeChat Pay';

    public const PAYMENT_METHOD_X_PAY_P2_P = 'XPay-P2P';

    public const PAYMENT_METHOD_X_PAY_QR = 'XPay-QR';

    public const PAYMENT_METHOD_YANDEX_MONEY = 'Yandex-money';

    public const PAYMENT_METHOD_ZOTAPAY = 'Zotapay';

    public const PAYMENT_METHOD_ZIMPLER = 'Zimpler';

    public const PAYMENT_METHOD_ZIP = 'Zip';

    public const STATUS_PENDING = 'pending';

    public const STATUS_QUEUED = 'queued';

    public const STATUS_PROCESSING = 'processing';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_FAILED = 'failed';

    public const STATUS_CANCELED = 'canceled';

    public const STATUS_DECLINED = 'declined';

    public const TRANSACTION_RESULT_ABANDONED = 'abandoned';

    public const TRANSACTION_RESULT_APPROVED = 'approved';

    public const TRANSACTION_RESULT_CANCELED = 'canceled';

    public const TRANSACTION_RESULT_DECLINED = 'declined';

    public const TRANSACTION_RESULT_UNKNOWN = 'unknown';

    public const TRANSACTION_RESULT_NULL = 'null';

    public const TRANSACTION_STATUS_COMPLETED = 'completed';

    public const TRANSACTION_STATUS_CONN_ERROR = 'conn-error';

    public const TRANSACTION_STATUS_DISPUTED = 'disputed';

    public const TRANSACTION_STATUS_NEVER_SENT = 'never-sent';

    public const TRANSACTION_STATUS_OFFSITE = 'offsite';

    public const TRANSACTION_STATUS_PARTIALLY_REFUNDED = 'partially-refunded';

    public const TRANSACTION_STATUS_PENDING = 'pending';

    public const TRANSACTION_STATUS_REFUNDED = 'refunded';

    public const TRANSACTION_STATUS_SENDING = 'sending';

    public const TRANSACTION_STATUS_TIMEOUT = 'timeout';

    public const TRANSACTION_STATUS_VOIDED = 'voided';

    public const TRANSACTION_STATUS_WAITING_APPROVAL = 'waiting-approval';

    public const TRANSACTION_STATUS_WAITING_CAPTURE = 'waiting-capture';

    public const TRANSACTION_STATUS_WAITING_GATEWAY = 'waiting-gateway';

    public const TRANSACTION_STATUS_WAITING_REFUND = 'waiting-refund';

    public const TRANSACTION_STATUS_NULL = 'null';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('payoutRequestId', $data)) {
            $this->setPayoutRequestId($data['payoutRequestId']);
        }
        if (array_key_exists('batchId', $data)) {
            $this->setBatchId($data['batchId']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('paymentMethod', $data)) {
            $this->setPaymentMethod($data['paymentMethod']);
        }
        if (array_key_exists('gatewayAccountId', $data)) {
            $this->setGatewayAccountId($data['gatewayAccountId']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('transactionResult', $data)) {
            $this->setTransactionResult($data['transactionResult']);
        }
        if (array_key_exists('transactionStatus', $data)) {
            $this->setTransactionStatus($data['transactionStatus']);
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
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getPayoutRequestId(): string
    {
        return $this->fields['payoutRequestId'];
    }

    public function getBatchId(): ?string
    {
        return $this->fields['batchId'] ?? null;
    }

    public function getPaymentInstrumentId(): string
    {
        return $this->fields['paymentInstrumentId'];
    }

    public function setPaymentInstrumentId(string $paymentInstrumentId): static
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->fields['paymentMethod'] ?? null;
    }

    public function getGatewayAccountId(): string
    {
        return $this->fields['gatewayAccountId'];
    }

    public function setGatewayAccountId(string $gatewayAccountId): static
    {
        $this->fields['gatewayAccountId'] = $gatewayAccountId;

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

    public function getAmount(): float
    {
        return $this->fields['amount'];
    }

    public function setAmount(float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

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

    public function getTransactionId(): ?string
    {
        return $this->fields['transactionId'] ?? null;
    }

    public function getTransactionResult(): ?string
    {
        return $this->fields['transactionResult'] ?? null;
    }

    public function getTransactionStatus(): ?string
    {
        return $this->fields['transactionStatus'] ?? null;
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
        if (array_key_exists('payoutRequestId', $this->fields)) {
            $data['payoutRequestId'] = $this->fields['payoutRequestId'];
        }
        if (array_key_exists('batchId', $this->fields)) {
            $data['batchId'] = $this->fields['batchId'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('paymentMethod', $this->fields)) {
            $data['paymentMethod'] = $this->fields['paymentMethod'];
        }
        if (array_key_exists('gatewayAccountId', $this->fields)) {
            $data['gatewayAccountId'] = $this->fields['gatewayAccountId'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('transactionResult', $this->fields)) {
            $data['transactionResult'] = $this->fields['transactionResult'];
        }
        if (array_key_exists('transactionStatus', $this->fields)) {
            $data['transactionStatus'] = $this->fields['transactionStatus'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
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

    private function setPayoutRequestId(string $payoutRequestId): static
    {
        $this->fields['payoutRequestId'] = $payoutRequestId;

        return $this;
    }

    private function setBatchId(null|string $batchId): static
    {
        $this->fields['batchId'] = $batchId;

        return $this;
    }

    private function setPaymentMethod(null|string $paymentMethod): static
    {
        $this->fields['paymentMethod'] = $paymentMethod;

        return $this;
    }

    private function setTransactionId(null|string $transactionId): static
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    private function setTransactionResult(null|string $transactionResult): static
    {
        $this->fields['transactionResult'] = $transactionResult;

        return $this;
    }

    private function setTransactionStatus(null|string $transactionStatus): static
    {
        $this->fields['transactionStatus'] = $transactionStatus;

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
