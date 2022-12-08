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

abstract class CompositeToken extends CommonPaymentToken
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('paymentInstrument', $data)) {
            $this->setPaymentInstrument($data['paymentInstrument']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('isUsed', $data)) {
            $this->setIsUsed($data['isUsed']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('leadSource', $data)) {
            $this->setLeadSource($data['leadSource']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('usageTime', $data)) {
            $this->setUsageTime($data['usageTime']);
        }
        if (array_key_exists('expirationTime', $data)) {
            $this->setExpirationTime($data['expirationTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['method']) {
            case 'payment-card':
                return new PaymentCardToken($data);
            case 'ach':
            case 'echeck':
                return new BankAccountToken($data);
            case 'Klarna':
                return new KlarnaToken($data);
            case 'plaid-account':
                return new PlaidAccountToken($data);
            case 'Khelocard':
                return new KhelocardCardToken($data);
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
                return new AlternativePaymentToken($data);
            case 'paypal':
                return new PayPalToken($data);
            case 'digital-wallet':
                return new DigitalWalletToken($data);
        }

        throw new InvalidArgumentException("Unsupported method value: '{$data['method']}'");
    }

    public function getMethod(): AlternativePaymentMethods
    {
        return $this->fields['method'];
    }

    public function getPaymentInstrument(): KlarnaTokenPaymentInstrument
    {
        return $this->fields['paymentInstrument'];
    }

    public function setPaymentInstrument(KlarnaTokenPaymentInstrument|array $paymentInstrument): self
    {
        if (!($paymentInstrument instanceof KlarnaTokenPaymentInstrument)) {
            $paymentInstrument = KlarnaTokenPaymentInstrument::from($paymentInstrument);
        }

        $this->fields['paymentInstrument'] = $paymentInstrument;

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

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getIsUsed(): ?bool
    {
        return $this->fields['isUsed'] ?? null;
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

    public function getLeadSource(): ?LeadSource
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|LeadSource|array $leadSource): self
    {
        if ($leadSource !== null && !($leadSource instanceof LeadSource)) {
            $leadSource = LeadSource::from($leadSource);
        }

        $this->fields['leadSource'] = $leadSource;

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

    public function getUsageTime(): ?DateTimeImmutable
    {
        return $this->fields['usageTime'] ?? null;
    }

    public function setUsageTime(null|DateTimeImmutable|string $usageTime): self
    {
        if ($usageTime !== null && !($usageTime instanceof DateTimeImmutable)) {
            $usageTime = new DateTimeImmutable($usageTime);
        }

        $this->fields['usageTime'] = $usageTime;

        return $this;
    }

    public function getExpirationTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationTime'] ?? null;
    }

    public function setExpirationTime(null|DateTimeImmutable|string $expirationTime): self
    {
        if ($expirationTime !== null && !($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
    }

    /**
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method']?->value;
        }
        if (array_key_exists('paymentInstrument', $this->fields)) {
            $data['paymentInstrument'] = $this->fields['paymentInstrument']?->jsonSerialize();
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('isUsed', $this->fields)) {
            $data['isUsed'] = $this->fields['isUsed'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource']?->jsonSerialize();
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('usageTime', $this->fields)) {
            $data['usageTime'] = $this->fields['usageTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('expirationTime', $this->fields)) {
            $data['expirationTime'] = $this->fields['expirationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setMethod(AlternativePaymentMethods|string $method): self
    {
        if (!($method instanceof AlternativePaymentMethods)) {
            $method = AlternativePaymentMethods::from($method);
        }

        $this->fields['method'] = $method;

        return $this;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setIsUsed(null|bool $isUsed): self
    {
        $this->fields['isUsed'] = $isUsed;

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

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
