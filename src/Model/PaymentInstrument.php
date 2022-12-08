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

abstract class PaymentInstrument implements JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_DEACTIVATED = 'deactivated';

    public const DIGITAL_WALLET_APPLE_PAY = 'Apple Pay';

    public const DIGITAL_WALLET_GOOGLE_PAY = 'Google Pay';

    public const ACCOUNT_NUMBER_TYPE_BBAN = 'BBAN';

    public const ACCOUNT_NUMBER_TYPE_IBAN = 'IBAN';

    public const ACCOUNT_TYPE_CHECKING = 'checking';

    public const ACCOUNT_TYPE_SAVINGS = 'savings';

    public const ACCOUNT_TYPE_OTHER = 'other';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('fingerprint', $data)) {
            $this->setFingerprint($data['fingerprint']);
        }
        if (array_key_exists('bin', $data)) {
            $this->setBin($data['bin']);
        }
        if (array_key_exists('last4', $data)) {
            $this->setLast4($data['last4']);
        }
        if (array_key_exists('pan', $data)) {
            $this->setPan($data['pan']);
        }
        if (array_key_exists('expYear', $data)) {
            $this->setExpYear($data['expYear']);
        }
        if (array_key_exists('expMonth', $data)) {
            $this->setExpMonth($data['expMonth']);
        }
        if (array_key_exists('cvv', $data)) {
            $this->setCvv($data['cvv']);
        }
        if (array_key_exists('brand', $data)) {
            $this->setBrand($data['brand']);
        }
        if (array_key_exists('bankCountry', $data)) {
            $this->setBankCountry($data['bankCountry']);
        }
        if (array_key_exists('bankName', $data)) {
            $this->setBankName($data['bankName']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('useAsBackup', $data)) {
            $this->setUseAsBackup($data['useAsBackup']);
        }
        if (array_key_exists('billingPortalUrl', $data)) {
            $this->setBillingPortalUrl($data['billingPortalUrl']);
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
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('stickyGatewayAccountId', $data)) {
            $this->setStickyGatewayAccountId($data['stickyGatewayAccountId']);
        }
        if (array_key_exists('expirationReminderTime', $data)) {
            $this->setExpirationReminderTime($data['expirationReminderTime']);
        }
        if (array_key_exists('expirationReminderNumber', $data)) {
            $this->setExpirationReminderNumber($data['expirationReminderNumber']);
        }
        if (array_key_exists('referenceData', $data)) {
            $this->setReferenceData($data['referenceData']);
        }
        if (array_key_exists('digitalWallet', $data)) {
            $this->setDigitalWallet($data['digitalWallet']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
        if (array_key_exists('routingNumber', $data)) {
            $this->setRoutingNumber($data['routingNumber']);
        }
        if (array_key_exists('accountNumberType', $data)) {
            $this->setAccountNumberType($data['accountNumberType']);
        }
        if (array_key_exists('accountType', $data)) {
            $this->setAccountType($data['accountType']);
        }
        if (array_key_exists('bic', $data)) {
            $this->setBic($data['bic']);
        }
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('number', $data)) {
            $this->setNumber($data['number']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['method']) {
            case 'Khelocard':
                return new KhelocardCard($data);
            case 'payment-card':
                return new PaymentCard($data);
            case 'Pagsmile-deposit-express':
            case 'Bancontact':
            case 'ecoPayz':
            case 'Giropay':
            case 'Pagadito':
            case 'EPS':
            case 'Pay4Fun':
            case 'Paymero':
            case 'Zotapay':
            case 'UPI':
            case 'XPay-P2P':
            case 'plaid-account':
            case 'AstroPay-GO':
            case 'SparkPay':
            case 'Matrix':
            case 'ING-homepay':
            case 'Bizum':
            case 'iDebit':
            case 'Paysafecash':
            case 'cash':
            case 'Beeline':
            case 'MuchBetter':
            case 'Multibanco':
            case 'Paynote':
            case 'Interac':
            case 'Baloto':
            case 'phone':
            case 'Pagsmile-lottery':
            case 'Interac-online':
            case 'INOVAPAY-pin':
            case 'miscellaneous':
            case 'Resurs':
            case 'VenusPoint':
            case 'Boleto':
            case 'PostFinance-e-finance':
            case 'CashToCode':
            case 'Netbanking':
            case 'Payeer':
            case 'PhonePe':
            case 'Jeton':
            case 'instant-bank-transfer':
            case 'Neosurf':
            case 'PostFinance-card':
            case 'Alipay':
            case 'Piastrix':
            case 'cash-deposit':
            case 'Bancontact-mobile':
            case 'SafetyPay':
            case 'Tele2':
            case 'Perfect-money':
            case 'Onlineueberweisen':
            case 'Belfius-direct-net':
            case 'VCreditos':
            case 'Efecty':
            case 'PayTabs':
            case 'Yandex-money':
            case 'oriental-wallet':
            case 'Paysafecard':
            case 'Webpay-2':
            case 'Google Pay':
            case 'Flexepin':
            case 'Interac-eTransfer':
            case 'Trustly':
            case 'Megafon':
            case 'USD-coin':
            case 'OXXO':
            case 'voucher':
            case 'rapyd-checkout':
            case 'MTS':
            case 'PinPay':
            case 'Neteller':
            case 'CASHlib':
            case 'INOVAPAY-wallet':
            case 'P24':
            case 'bank-transfer':
            case 'FasterPay':
            case 'Skrill Rapid Transfer':
            case 'OchaPay':
            case 'PayCash':
            case 'Gpaysafe':
            case 'swift-dbt':
            case 'Conekta-oxxo':
            case 'loonie':
            case 'PaymentAsia-crypto':
            case 'Alfa-click':
            case 'Sofort':
            case 'ecoVoucher':
            case 'WeChat Pay':
            case 'KNOT':
            case 'check':
            case 'Cupon-de-pagos':
            case 'Nordea-Solo':
            case 'iWallet':
            case 'cryptocurrency':
            case 'CODVoucher':
            case 'QPay':
            case 'iDEAL':
            case 'China UnionPay':
            case 'InstaDebit':
            case 'ToditoCash-card':
            case 'InstantPayments':
            case 'Klarna':
            case 'online-bank-transfer':
            case 'UPayCard':
            case 'Webmoney':
            case 'Webpay':
            case 'QIWI':
            case 'jpay':
            case 'bank-transfer-3':
            case 'bank-transfer-4':
            case 'Cleo':
            case 'bank-transfer-2':
            case 'Skrill':
            case 'bank-transfer-7':
            case 'bank-transfer-8':
            case 'bank-transfer-5':
            case 'bank-transfer-6':
            case 'bank-transfer-9':
            case 'MaxiCash':
            case 'AdvCash':
            case 'Webpay Card':
            case 'SEPA':
            case 'BankReferenced':
            case 'XPay-QR':
            case 'voucher-4':
            case 'domestic-cards':
            case 'voucher-3':
            case 'AstroPay Card':
            case 'voucher-2':
            case 'Terminaly-RF':
            case 'SMSVoucher':
            case 'QQPay':
            case 'Zimpler':
            case 'ePay.bg':
            case 'POLi':
            case 'invoice':
            case 'MiFinity-eWallet':
            case 'PagoEffectivo':
            case 'eZeeWallet':
            case 'bitcoin':
                return new AlternativeInstrument($data);
            case 'ach':
                return new BankAccount($data);
            case 'paypal':
                return new PayPalAccount($data);
        }

        throw new InvalidArgumentException("Unsupported method value: '{$data['method']}'");
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getMethod(): AlternativePaymentMethods
    {
        return $this->fields['method'];
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getFingerprint(): ?string
    {
        return $this->fields['fingerprint'] ?? null;
    }

    public function setFingerprint(null|string $fingerprint): self
    {
        $this->fields['fingerprint'] = $fingerprint;

        return $this;
    }

    public function getBin(): ?string
    {
        return $this->fields['bin'] ?? null;
    }

    public function getLast4(): ?string
    {
        return $this->fields['last4'] ?? null;
    }

    public function setLast4(null|string $last4): self
    {
        $this->fields['last4'] = $last4;

        return $this;
    }

    public function getPan(): ?string
    {
        return $this->fields['pan'] ?? null;
    }

    public function setPan(null|string $pan): self
    {
        $this->fields['pan'] = $pan;

        return $this;
    }

    public function getExpYear(): ?int
    {
        return $this->fields['expYear'] ?? null;
    }

    public function setExpYear(null|int $expYear): self
    {
        $this->fields['expYear'] = $expYear;

        return $this;
    }

    public function getExpMonth(): ?int
    {
        return $this->fields['expMonth'] ?? null;
    }

    public function setExpMonth(null|int $expMonth): self
    {
        $this->fields['expMonth'] = $expMonth;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->fields['cvv'] ?? null;
    }

    public function setCvv(null|string $cvv): self
    {
        $this->fields['cvv'] = $cvv;

        return $this;
    }

    public function getBrand(): ?PaymentCardBrand
    {
        return $this->fields['brand'] ?? null;
    }

    public function getBankCountry(): ?string
    {
        return $this->fields['bankCountry'] ?? null;
    }

    public function getBankName(): ?string
    {
        return $this->fields['bankName'] ?? null;
    }

    public function setBankName(null|string $bankName): self
    {
        $this->fields['bankName'] = $bankName;

        return $this;
    }

    public function getBillingAddress(): ContactObject
    {
        return $this->fields['billingAddress'];
    }

    public function setBillingAddress(ContactObject|array $billingAddress): self
    {
        if (!($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getUseAsBackup(): ?bool
    {
        return $this->fields['useAsBackup'] ?? null;
    }

    public function setUseAsBackup(null|bool $useAsBackup): self
    {
        $this->fields['useAsBackup'] = $useAsBackup;

        return $this;
    }

    public function getBillingPortalUrl(): ?string
    {
        return $this->fields['billingPortalUrl'] ?? null;
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

    public function setCustomFields(null|array $customFields): self
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getStickyGatewayAccountId(): ?string
    {
        return $this->fields['stickyGatewayAccountId'] ?? null;
    }

    public function getExpirationReminderTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationReminderTime'] ?? null;
    }

    public function getExpirationReminderNumber(): ?int
    {
        return $this->fields['expirationReminderNumber'] ?? null;
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
    public function setReferenceData(null|array $referenceData): self
    {
        $this->fields['referenceData'] = $referenceData;

        return $this;
    }

    /**
     * @psalm-return self::DIGITAL_WALLET_*|null $digitalWallet
     */
    public function getDigitalWallet(): ?string
    {
        return $this->fields['digitalWallet'] ?? null;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): self
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    /**
     * @return null|array<CustomerLink|SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{customer:Customer}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function getRoutingNumber(): ?string
    {
        return $this->fields['routingNumber'] ?? null;
    }

    public function setRoutingNumber(null|string $routingNumber): self
    {
        $this->fields['routingNumber'] = $routingNumber;

        return $this;
    }

    /**
     * @psalm-return self::ACCOUNT_NUMBER_TYPE_*|null $accountNumberType
     */
    public function getAccountNumberType(): ?string
    {
        return $this->fields['accountNumberType'] ?? null;
    }

    /**
     * @psalm-param self::ACCOUNT_NUMBER_TYPE_*|null $accountNumberType
     */
    public function setAccountNumberType(null|string $accountNumberType): self
    {
        $this->fields['accountNumberType'] = $accountNumberType;

        return $this;
    }

    /**
     * @psalm-return self::ACCOUNT_TYPE_*|null $accountType
     */
    public function getAccountType(): ?string
    {
        return $this->fields['accountType'] ?? null;
    }

    /**
     * @psalm-param self::ACCOUNT_TYPE_*|null $accountType
     */
    public function setAccountType(null|string $accountType): self
    {
        $this->fields['accountType'] = $accountType;

        return $this;
    }

    public function getBic(): ?string
    {
        return $this->fields['bic'] ?? null;
    }

    public function setBic(null|string $bic): self
    {
        $this->fields['bic'] = $bic;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->fields['username'] ?? null;
    }

    public function getNumber(): ?string
    {
        return $this->fields['number'] ?? null;
    }

    public function setNumber(null|string $number): self
    {
        $this->fields['number'] = $number;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method']?->value;
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('fingerprint', $this->fields)) {
            $data['fingerprint'] = $this->fields['fingerprint'];
        }
        if (array_key_exists('bin', $this->fields)) {
            $data['bin'] = $this->fields['bin'];
        }
        if (array_key_exists('last4', $this->fields)) {
            $data['last4'] = $this->fields['last4'];
        }
        if (array_key_exists('pan', $this->fields)) {
            $data['pan'] = $this->fields['pan'];
        }
        if (array_key_exists('expYear', $this->fields)) {
            $data['expYear'] = $this->fields['expYear'];
        }
        if (array_key_exists('expMonth', $this->fields)) {
            $data['expMonth'] = $this->fields['expMonth'];
        }
        if (array_key_exists('cvv', $this->fields)) {
            $data['cvv'] = $this->fields['cvv'];
        }
        if (array_key_exists('brand', $this->fields)) {
            $data['brand'] = $this->fields['brand']?->value;
        }
        if (array_key_exists('bankCountry', $this->fields)) {
            $data['bankCountry'] = $this->fields['bankCountry'];
        }
        if (array_key_exists('bankName', $this->fields)) {
            $data['bankName'] = $this->fields['bankName'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('useAsBackup', $this->fields)) {
            $data['useAsBackup'] = $this->fields['useAsBackup'];
        }
        if (array_key_exists('billingPortalUrl', $this->fields)) {
            $data['billingPortalUrl'] = $this->fields['billingPortalUrl'];
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
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('stickyGatewayAccountId', $this->fields)) {
            $data['stickyGatewayAccountId'] = $this->fields['stickyGatewayAccountId'];
        }
        if (array_key_exists('expirationReminderTime', $this->fields)) {
            $data['expirationReminderTime'] = $this->fields['expirationReminderTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('expirationReminderNumber', $this->fields)) {
            $data['expirationReminderNumber'] = $this->fields['expirationReminderNumber'];
        }
        if (array_key_exists('referenceData', $this->fields)) {
            $data['referenceData'] = $this->fields['referenceData'];
        }
        if (array_key_exists('digitalWallet', $this->fields)) {
            $data['digitalWallet'] = $this->fields['digitalWallet'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }
        if (array_key_exists('routingNumber', $this->fields)) {
            $data['routingNumber'] = $this->fields['routingNumber'];
        }
        if (array_key_exists('accountNumberType', $this->fields)) {
            $data['accountNumberType'] = $this->fields['accountNumberType'];
        }
        if (array_key_exists('accountType', $this->fields)) {
            $data['accountType'] = $this->fields['accountType'];
        }
        if (array_key_exists('bic', $this->fields)) {
            $data['bic'] = $this->fields['bic'];
        }
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('number', $this->fields)) {
            $data['number'] = $this->fields['number'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setMethod(AlternativePaymentMethods|string $method): self
    {
        if (!($method instanceof AlternativePaymentMethods)) {
            $method = AlternativePaymentMethods::from($method);
        }

        $this->fields['method'] = $method;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setBin(null|string $bin): self
    {
        $this->fields['bin'] = $bin;

        return $this;
    }

    private function setBrand(null|PaymentCardBrand|string $brand): self
    {
        if ($brand !== null && !($brand instanceof PaymentCardBrand)) {
            $brand = PaymentCardBrand::from($brand);
        }

        $this->fields['brand'] = $brand;

        return $this;
    }

    private function setBankCountry(null|string $bankCountry): self
    {
        $this->fields['bankCountry'] = $bankCountry;

        return $this;
    }

    private function setBillingPortalUrl(null|string $billingPortalUrl): self
    {
        $this->fields['billingPortalUrl'] = $billingPortalUrl;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    private function setStickyGatewayAccountId(null|string $stickyGatewayAccountId): self
    {
        $this->fields['stickyGatewayAccountId'] = $stickyGatewayAccountId;

        return $this;
    }

    private function setExpirationReminderTime(null|DateTimeImmutable|string $expirationReminderTime): self
    {
        if ($expirationReminderTime !== null && !($expirationReminderTime instanceof DateTimeImmutable)) {
            $expirationReminderTime = new DateTimeImmutable($expirationReminderTime);
        }

        $this->fields['expirationReminderTime'] = $expirationReminderTime;

        return $this;
    }

    private function setExpirationReminderNumber(null|int $expirationReminderNumber): self
    {
        $this->fields['expirationReminderNumber'] = $expirationReminderNumber;

        return $this;
    }

    /**
     * @psalm-param self::DIGITAL_WALLET_*|null $digitalWallet
     */
    private function setDigitalWallet(null|string $digitalWallet): self
    {
        $this->fields['digitalWallet'] = $digitalWallet;

        return $this;
    }

    /**
     * @param null|array<CustomerLink|SelfLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{customer:Customer} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        if ($embedded !== null) {
            $embedded['customer'] = isset($embedded['customer']) ? ($embedded['customer'] instanceof Customer ? $embedded['customer'] : Customer::from($embedded['customer'])) : null;
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    private function setUsername(null|string $username): self
    {
        $this->fields['username'] = $username;

        return $this;
    }
}
