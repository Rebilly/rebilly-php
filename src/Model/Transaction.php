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

class Transaction extends CommonTransaction
{
    public const DISPUTE_STATUS_RESPONSE_NEEDED = 'response-needed';

    public const DISPUTE_STATUS_UNDER_REVIEW = 'under-review';

    public const DISPUTE_STATUS_FORFEITED = 'forfeited';

    public const DISPUTE_STATUS_WON = 'won';

    public const DISPUTE_STATUS_LOST = 'lost';

    public const DISPUTE_STATUS_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

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

    public function setGateway(null|TransactionGateway|array $gateway): self
    {
        if ($gateway !== null && !($gateway instanceof \Rebilly\Sdk\Model\TransactionGateway)) {
            $gateway = \Rebilly\Sdk\Model\TransactionGateway::from($gateway);
        }

        $this->fields['gateway'] = $gateway;

        return $this;
    }

    public function getAcquirerName(): ?AcquirerName
    {
        return $this->fields['acquirerName'] ?? null;
    }

    public function getMethod(): ?PaymentMethod
    {
        return $this->fields['method'] ?? null;
    }

    public function setMethod(null|PaymentMethod|string $method): self
    {
        if ($method !== null && !($method instanceof PaymentMethod)) {
            $method = PaymentMethod::from($method);
        }

        $this->fields['method'] = $method;

        return $this;
    }

    public function getVelocity(): ?int
    {
        return $this->fields['velocity'] ?? null;
    }

    public function setVelocity(null|int $velocity): self
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

    public function getPaymentInstrument(): ?PaymentInstrumentValueObject
    {
        return $this->fields['paymentInstrument'] ?? null;
    }

    public function setPaymentInstrument(null|PaymentInstrumentValueObject|array $paymentInstrument): self
    {
        if ($paymentInstrument !== null && !($paymentInstrument instanceof \Rebilly\Sdk\Model\PaymentInstrumentValueObject)) {
            $paymentInstrument = \Rebilly\Sdk\Model\PaymentInstrumentValueObject::from($paymentInstrument);
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

    public function setDcc(null|TransactionDcc|array $dcc): self
    {
        if ($dcc !== null && !($dcc instanceof \Rebilly\Sdk\Model\TransactionDcc)) {
            $dcc = \Rebilly\Sdk\Model\TransactionDcc::from($dcc);
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

    public function setBumpOffer(null|TransactionBumpOffer|array $bumpOffer): self
    {
        if ($bumpOffer !== null && !($bumpOffer instanceof \Rebilly\Sdk\Model\TransactionBumpOffer)) {
            $bumpOffer = \Rebilly\Sdk\Model\TransactionBumpOffer::from($bumpOffer);
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

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): self
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

    public function setNotificationUrl(null|string $notificationUrl): self
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

    /**
     * @psalm-return self::DISPUTE_STATUS_*|null $disputeStatus
     */
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

    public function setIsProcessedOutside(null|bool $isProcessedOutside): self
    {
        $this->fields['isProcessedOutside'] = $isProcessedOutside;

        return $this;
    }

    public function getIsMerchantInitiated(): ?bool
    {
        return $this->fields['isMerchantInitiated'] ?? null;
    }

    public function setIsMerchantInitiated(null|bool $isMerchantInitiated): self
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

    public function setOrderId(null|string $orderId): self
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

    public function setLimits(null|TransactionLimitAmount|array $limits): self
    {
        if ($limits !== null && !($limits instanceof \Rebilly\Sdk\Model\TransactionLimitAmount)) {
            $limits = \Rebilly\Sdk\Model\TransactionLimitAmount::from($limits);
        }

        $this->fields['limits'] = $limits;

        return $this;
    }

    /**
     * @return null|array<\Rebilly\Sdk\Model\ApprovalUrlLink|\Rebilly\Sdk\Model\CustomerLink|\Rebilly\Sdk\Model\DisputeLink|\Rebilly\Sdk\Model\GatewayAccountLink|\Rebilly\Sdk\Model\InvoicesLink|\Rebilly\Sdk\Model\LeadSourceLink|\Rebilly\Sdk\Model\ParentTransactionLink|\Rebilly\Sdk\Model\PaymentCardLink|\Rebilly\Sdk\Model\QueryUrlLink|\Rebilly\Sdk\Model\RefundUrlLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\TransactionRedirectUrlLink|\Rebilly\Sdk\Model\TransactionUpdateUrlLink|\Rebilly\Sdk\Model\WebsiteLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{parentTransaction:\Rebilly\Sdk\Model\Transaction,gatewayAccount:\Rebilly\Sdk\Model\GatewayAccount,customer:\Rebilly\Sdk\Model\Customer,leadSource:\Rebilly\Sdk\Model\LeadSource,website:\Rebilly\Sdk\Model\Website,paymentCard:\Rebilly\Sdk\Model\PaymentCard,bankAccount:\Rebilly\Sdk\Model\BankAccount,invoices:\Rebilly\Sdk\Model\Invoice[],childTransactions:\Rebilly\Sdk\Model\Transaction[]}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
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
            $data['acquirerName'] = $this->fields['acquirerName']?->value;
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method']?->value;
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
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setGatewayAccountId(null|string $gatewayAccountId): self
    {
        $this->fields['gatewayAccountId'] = $gatewayAccountId;

        return $this;
    }

    private function setGatewayTransactionId(null|string $gatewayTransactionId): self
    {
        $this->fields['gatewayTransactionId'] = $gatewayTransactionId;

        return $this;
    }

    private function setAcquirerName(null|AcquirerName|string $acquirerName): self
    {
        if ($acquirerName !== null && !($acquirerName instanceof AcquirerName)) {
            $acquirerName = AcquirerName::from($acquirerName);
        }

        $this->fields['acquirerName'] = $acquirerName;

        return $this;
    }

    private function setRevision(null|int $revision): self
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    /**
     * @param null|array<string,string> $referenceData
     */
    private function setReferenceData(null|array $referenceData): self
    {
        $this->fields['referenceData'] = $referenceData;

        return $this;
    }

    private function setBin(null|string $bin): self
    {
        $this->fields['bin'] = $bin;

        return $this;
    }

    private function setHasDcc(null|bool $hasDcc): self
    {
        $this->fields['hasDcc'] = $hasDcc;

        return $this;
    }

    private function setHasBumpOffer(null|bool $hasBumpOffer): self
    {
        $this->fields['hasBumpOffer'] = $hasBumpOffer;

        return $this;
    }

    private function setRiskScore(null|int $riskScore): self
    {
        $this->fields['riskScore'] = $riskScore;

        return $this;
    }

    private function setIsDisputed(null|bool $isDisputed): self
    {
        $this->fields['isDisputed'] = $isDisputed;

        return $this;
    }

    private function setDisputeTime(null|DateTimeImmutable|string $disputeTime): self
    {
        if ($disputeTime !== null && !($disputeTime instanceof DateTimeImmutable)) {
            $disputeTime = new DateTimeImmutable($disputeTime);
        }

        $this->fields['disputeTime'] = $disputeTime;

        return $this;
    }

    /**
     * @psalm-param self::DISPUTE_STATUS_*|null $disputeStatus
     */
    private function setDisputeStatus(null|string $disputeStatus): self
    {
        $this->fields['disputeStatus'] = $disputeStatus;

        return $this;
    }

    private function setIsReconciled(null|bool $isReconciled): self
    {
        $this->fields['isReconciled'] = $isReconciled;

        return $this;
    }

    private function setHadDiscrepancy(null|bool $hadDiscrepancy): self
    {
        $this->fields['hadDiscrepancy'] = $hadDiscrepancy;

        return $this;
    }

    private function setArn(null|string $arn): self
    {
        $this->fields['arn'] = $arn;

        return $this;
    }

    private function setReportAmount(null|float|string $reportAmount): self
    {
        if (is_string($reportAmount)) {
            $reportAmount = (float) $reportAmount;
        }

        $this->fields['reportAmount'] = $reportAmount;

        return $this;
    }

    private function setReportCurrency(null|string $reportCurrency): self
    {
        $this->fields['reportCurrency'] = $reportCurrency;

        return $this;
    }

    private function setSettlementTime(null|DateTimeImmutable|string $settlementTime): self
    {
        if ($settlementTime !== null && !($settlementTime instanceof DateTimeImmutable)) {
            $settlementTime = new DateTimeImmutable($settlementTime);
        }

        $this->fields['settlementTime'] = $settlementTime;

        return $this;
    }

    private function setDiscrepancyTime(null|DateTimeImmutable|string $discrepancyTime): self
    {
        if ($discrepancyTime !== null && !($discrepancyTime instanceof DateTimeImmutable)) {
            $discrepancyTime = new DateTimeImmutable($discrepancyTime);
        }

        $this->fields['discrepancyTime'] = $discrepancyTime;

        return $this;
    }

    /**
     * @param null|array<\Rebilly\Sdk\Model\ApprovalUrlLink|\Rebilly\Sdk\Model\CustomerLink|\Rebilly\Sdk\Model\DisputeLink|\Rebilly\Sdk\Model\GatewayAccountLink|\Rebilly\Sdk\Model\InvoicesLink|\Rebilly\Sdk\Model\LeadSourceLink|\Rebilly\Sdk\Model\ParentTransactionLink|\Rebilly\Sdk\Model\PaymentCardLink|\Rebilly\Sdk\Model\QueryUrlLink|\Rebilly\Sdk\Model\RefundUrlLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\TransactionRedirectUrlLink|\Rebilly\Sdk\Model\TransactionUpdateUrlLink|\Rebilly\Sdk\Model\WebsiteLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{parentTransaction:\Rebilly\Sdk\Model\Transaction,gatewayAccount:\Rebilly\Sdk\Model\GatewayAccount,customer:\Rebilly\Sdk\Model\Customer,leadSource:\Rebilly\Sdk\Model\LeadSource,website:\Rebilly\Sdk\Model\Website,paymentCard:\Rebilly\Sdk\Model\PaymentCard,bankAccount:\Rebilly\Sdk\Model\BankAccount,invoices:\Rebilly\Sdk\Model\Invoice[],childTransactions:\Rebilly\Sdk\Model\Transaction[]} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['parentTransaction'] = isset($embedded['parentTransaction']) ? ($embedded['parentTransaction'] instanceof self ? $embedded['parentTransaction'] : self::from($embedded['parentTransaction'])) : null;
        $embedded['gatewayAccount'] = isset($embedded['gatewayAccount']) ? ($embedded['gatewayAccount'] instanceof \Rebilly\Sdk\Model\GatewayAccount ? $embedded['gatewayAccount'] : \Rebilly\Sdk\Model\GatewayAccount::from($embedded['gatewayAccount'])) : null;
        $embedded['customer'] = isset($embedded['customer']) ? ($embedded['customer'] instanceof \Rebilly\Sdk\Model\Customer ? $embedded['customer'] : \Rebilly\Sdk\Model\Customer::from($embedded['customer'])) : null;
        $embedded['leadSource'] = isset($embedded['leadSource']) ? ($embedded['leadSource'] instanceof \Rebilly\Sdk\Model\LeadSource ? $embedded['leadSource'] : \Rebilly\Sdk\Model\LeadSource::from($embedded['leadSource'])) : null;
        $embedded['website'] = isset($embedded['website']) ? ($embedded['website'] instanceof \Rebilly\Sdk\Model\Website ? $embedded['website'] : \Rebilly\Sdk\Model\Website::from($embedded['website'])) : null;
        $embedded['paymentCard'] = isset($embedded['paymentCard']) ? ($embedded['paymentCard'] instanceof \Rebilly\Sdk\Model\PaymentCard ? $embedded['paymentCard'] : \Rebilly\Sdk\Model\PaymentCard::from($embedded['paymentCard'])) : null;
        $embedded['bankAccount'] = isset($embedded['bankAccount']) ? ($embedded['bankAccount'] instanceof \Rebilly\Sdk\Model\BankAccount ? $embedded['bankAccount'] : \Rebilly\Sdk\Model\BankAccount::from($embedded['bankAccount'])) : null;
        $embedded['invoices'] = isset($embedded['invoices']) ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\Invoice ? $value : \Rebilly\Sdk\Model\Invoice::from($value)) : null, $embedded['invoices']) : null;
        $embedded['childTransactions'] = isset($embedded['childTransactions']) ? array_map(fn ($value) => $value !== null ? ($value instanceof self ? $value : self::from($value)) : null, $embedded['childTransactions']) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
