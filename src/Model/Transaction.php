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

class Transaction implements JsonSerializable
{
    public const TYPE__3DS_AUTHENTICATION = '3ds-authentication';

    public const TYPE_AUTHORIZE = 'authorize';

    public const TYPE_CAPTURE = 'capture';

    public const TYPE_CREDIT = 'credit';

    public const TYPE_REFUND = 'refund';

    public const TYPE_SALE = 'sale';

    public const TYPE_SETUP = 'setup';

    public const TYPE_VOID = 'void';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_CONN_ERROR = 'conn-error';

    public const STATUS_DISPUTED = 'disputed';

    public const STATUS_NEVER_SENT = 'never-sent';

    public const STATUS_OFFSITE = 'offsite';

    public const STATUS_PARTIALLY_REFUNDED = 'partially-refunded';

    public const STATUS_PENDING = 'pending';

    public const STATUS_REFUNDED = 'refunded';

    public const STATUS_SENDING = 'sending';

    public const STATUS_TIMEOUT = 'timeout';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_WAITING_APPROVAL = 'waiting-approval';

    public const STATUS_WAITING_CAPTURE = 'waiting-capture';

    public const STATUS_WAITING_GATEWAY = 'waiting-gateway';

    public const STATUS_WAITING_REFUND = 'waiting-refund';

    public const RESULT_ABANDONED = 'abandoned';

    public const RESULT_APPROVED = 'approved';

    public const RESULT_CANCELED = 'canceled';

    public const RESULT_DECLINED = 'declined';

    public const RESULT_UNKNOWN = 'unknown';

    public const DISPUTE_STATUS_NULL = 'null';

    public const DISPUTE_STATUS_RESPONSE_NEEDED = 'response-needed';

    public const DISPUTE_STATUS_UNDER_REVIEW = 'under-review';

    public const DISPUTE_STATUS_FORFEITED = 'forfeited';

    public const DISPUTE_STATUS_WON = 'won';

    public const DISPUTE_STATUS_LOST = 'lost';

    public const DISPUTE_STATUS_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('result', $data)) {
            $this->setResult($data['result']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('purchaseAmount', $data)) {
            $this->setPurchaseAmount($data['purchaseAmount']);
        }
        if (array_key_exists('purchaseCurrency', $data)) {
            $this->setPurchaseCurrency($data['purchaseCurrency']);
        }
        if (array_key_exists('requestAmount', $data)) {
            $this->setRequestAmount($data['requestAmount']);
        }
        if (array_key_exists('requestCurrency', $data)) {
            $this->setRequestCurrency($data['requestCurrency']);
        }
        if (array_key_exists('parentTransactionId', $data)) {
            $this->setParentTransactionId($data['parentTransactionId']);
        }
        if (array_key_exists('childTransactions', $data)) {
            $this->setChildTransactions($data['childTransactions']);
        }
        if (array_key_exists('invoiceIds', $data)) {
            $this->setInvoiceIds($data['invoiceIds']);
        }
        if (array_key_exists('subscriptionIds', $data)) {
            $this->setSubscriptionIds($data['subscriptionIds']);
        }
        if (array_key_exists('planIds', $data)) {
            $this->setPlanIds($data['planIds']);
        }
        if (array_key_exists('isRebill', $data)) {
            $this->setIsRebill($data['isRebill']);
        }
        if (array_key_exists('rebillNumber', $data)) {
            $this->setRebillNumber($data['rebillNumber']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('has3ds', $data)) {
            $this->setHas3ds($data['has3ds']);
        }
        if (array_key_exists('3ds', $data)) {
            $this->set3ds($data['3ds']);
        }
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('retryNumber', $data)) {
            $this->setRetryNumber($data['retryNumber']);
        }
        if (array_key_exists('isRetry', $data)) {
            $this->setIsRetry($data['isRetry']);
        }
        if (array_key_exists('billingDescriptor', $data)) {
            $this->setBillingDescriptor($data['billingDescriptor']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('requestId', $data)) {
            $this->setRequestId($data['requestId']);
        }
        if (array_key_exists('hasAmountAdjustment', $data)) {
            $this->setHasAmountAdjustment($data['hasAmountAdjustment']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('processedTime', $data)) {
            $this->setProcessedTime($data['processedTime']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
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
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
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

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getWebsiteId(): ?string
    {
        return $this->fields['websiteId'] ?? null;
    }

    public function setWebsiteId(null|string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getResult(): ?string
    {
        return $this->fields['result'] ?? null;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getPurchaseAmount(): ?float
    {
        return $this->fields['purchaseAmount'] ?? null;
    }

    public function getPurchaseCurrency(): ?string
    {
        return $this->fields['purchaseCurrency'] ?? null;
    }

    public function setPurchaseCurrency(null|string $purchaseCurrency): static
    {
        $this->fields['purchaseCurrency'] = $purchaseCurrency;

        return $this;
    }

    public function getRequestAmount(): ?float
    {
        return $this->fields['requestAmount'] ?? null;
    }

    public function getRequestCurrency(): ?string
    {
        return $this->fields['requestCurrency'] ?? null;
    }

    public function setRequestCurrency(null|string $requestCurrency): static
    {
        $this->fields['requestCurrency'] = $requestCurrency;

        return $this;
    }

    public function getParentTransactionId(): ?string
    {
        return $this->fields['parentTransactionId'] ?? null;
    }

    public function setParentTransactionId(null|string $parentTransactionId): static
    {
        $this->fields['parentTransactionId'] = $parentTransactionId;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getChildTransactions(): ?array
    {
        return $this->fields['childTransactions'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getInvoiceIds(): ?array
    {
        return $this->fields['invoiceIds'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getSubscriptionIds(): ?array
    {
        return $this->fields['subscriptionIds'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getPlanIds(): ?array
    {
        return $this->fields['planIds'] ?? null;
    }

    public function getIsRebill(): ?bool
    {
        return $this->fields['isRebill'] ?? null;
    }

    public function getRebillNumber(): ?int
    {
        return $this->fields['rebillNumber'] ?? null;
    }

    public function getBillingAddress(): ?ContactObject
    {
        return $this->fields['billingAddress'] ?? null;
    }

    public function setBillingAddress(null|ContactObject|array $billingAddress): static
    {
        if ($billingAddress !== null && !($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getHas3ds(): ?bool
    {
        return $this->fields['has3ds'] ?? null;
    }

    public function get3ds(): ?Transaction3ds
    {
        return $this->fields['3ds'] ?? null;
    }

    public function set3ds(null|Transaction3ds|array $_3ds): static
    {
        if ($_3ds !== null && !($_3ds instanceof Transaction3ds)) {
            $_3ds = Transaction3ds::from($_3ds);
        }

        $this->fields['3ds'] = $_3ds;

        return $this;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): static
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getRetryNumber(): ?int
    {
        return $this->fields['retryNumber'] ?? null;
    }

    public function getIsRetry(): ?bool
    {
        return $this->fields['isRetry'] ?? null;
    }

    public function getBillingDescriptor(): ?string
    {
        return $this->fields['billingDescriptor'] ?? null;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getRequestId(): ?string
    {
        return $this->fields['requestId'] ?? null;
    }

    public function setRequestId(null|string $requestId): static
    {
        $this->fields['requestId'] = $requestId;

        return $this;
    }

    public function getHasAmountAdjustment(): ?bool
    {
        return $this->fields['hasAmountAdjustment'] ?? null;
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

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getProcessedTime(): ?DateTimeImmutable
    {
        return $this->fields['processedTime'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
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

    public function setGateway(null|TransactionGateway|array $gateway): static
    {
        if ($gateway !== null && !($gateway instanceof TransactionGateway)) {
            $gateway = TransactionGateway::from($gateway);
        }

        $this->fields['gateway'] = $gateway;

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

    public function getMethod(): ?string
    {
        return $this->fields['method'] ?? null;
    }

    public function setMethod(null|string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getVelocity(): ?int
    {
        return $this->fields['velocity'] ?? null;
    }

    public function setVelocity(null|int $velocity): static
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

    public function getPaymentInstrument(): ?TransactionPaymentInstrument
    {
        return $this->fields['paymentInstrument'] ?? null;
    }

    public function setPaymentInstrument(null|TransactionPaymentInstrument|array $paymentInstrument): static
    {
        if ($paymentInstrument !== null && !($paymentInstrument instanceof TransactionPaymentInstrument)) {
            $paymentInstrument = TransactionPaymentInstrument::from($paymentInstrument);
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

    public function setDcc(null|TransactionDcc|array $dcc): static
    {
        if ($dcc !== null && !($dcc instanceof TransactionDcc)) {
            $dcc = TransactionDcc::from($dcc);
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

    public function setBumpOffer(null|TransactionBumpOffer|array $bumpOffer): static
    {
        if ($bumpOffer !== null && !($bumpOffer instanceof TransactionBumpOffer)) {
            $bumpOffer = TransactionBumpOffer::from($bumpOffer);
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

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static
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

    public function setNotificationUrl(null|string $notificationUrl): static
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

    public function setIsProcessedOutside(null|bool $isProcessedOutside): static
    {
        $this->fields['isProcessedOutside'] = $isProcessedOutside;

        return $this;
    }

    public function getIsMerchantInitiated(): ?bool
    {
        return $this->fields['isMerchantInitiated'] ?? null;
    }

    public function setIsMerchantInitiated(null|bool $isMerchantInitiated): static
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

    public function setOrderId(null|string $orderId): static
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

    public function setReportCurrency(null|string $reportCurrency): static
    {
        $this->fields['reportCurrency'] = $reportCurrency;

        return $this;
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

    public function setLimits(null|TransactionLimitAmount|array $limits): static
    {
        if ($limits !== null && !($limits instanceof TransactionLimitAmount)) {
            $limits = TransactionLimitAmount::from($limits);
        }

        $this->fields['limits'] = $limits;

        return $this;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
    }

    public function setOrganizationId(null|string $organizationId): static
    {
        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?TransactionEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|TransactionEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof TransactionEmbedded)) {
            $embedded = TransactionEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
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
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('result', $this->fields)) {
            $data['result'] = $this->fields['result'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('purchaseAmount', $this->fields)) {
            $data['purchaseAmount'] = $this->fields['purchaseAmount'];
        }
        if (array_key_exists('purchaseCurrency', $this->fields)) {
            $data['purchaseCurrency'] = $this->fields['purchaseCurrency'];
        }
        if (array_key_exists('requestAmount', $this->fields)) {
            $data['requestAmount'] = $this->fields['requestAmount'];
        }
        if (array_key_exists('requestCurrency', $this->fields)) {
            $data['requestCurrency'] = $this->fields['requestCurrency'];
        }
        if (array_key_exists('parentTransactionId', $this->fields)) {
            $data['parentTransactionId'] = $this->fields['parentTransactionId'];
        }
        if (array_key_exists('childTransactions', $this->fields)) {
            $data['childTransactions'] = $this->fields['childTransactions'];
        }
        if (array_key_exists('invoiceIds', $this->fields)) {
            $data['invoiceIds'] = $this->fields['invoiceIds'];
        }
        if (array_key_exists('subscriptionIds', $this->fields)) {
            $data['subscriptionIds'] = $this->fields['subscriptionIds'];
        }
        if (array_key_exists('planIds', $this->fields)) {
            $data['planIds'] = $this->fields['planIds'];
        }
        if (array_key_exists('isRebill', $this->fields)) {
            $data['isRebill'] = $this->fields['isRebill'];
        }
        if (array_key_exists('rebillNumber', $this->fields)) {
            $data['rebillNumber'] = $this->fields['rebillNumber'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('has3ds', $this->fields)) {
            $data['has3ds'] = $this->fields['has3ds'];
        }
        if (array_key_exists('3ds', $this->fields)) {
            $data['3ds'] = $this->fields['3ds']?->jsonSerialize();
        }
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('retryNumber', $this->fields)) {
            $data['retryNumber'] = $this->fields['retryNumber'];
        }
        if (array_key_exists('isRetry', $this->fields)) {
            $data['isRetry'] = $this->fields['isRetry'];
        }
        if (array_key_exists('billingDescriptor', $this->fields)) {
            $data['billingDescriptor'] = $this->fields['billingDescriptor'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('requestId', $this->fields)) {
            $data['requestId'] = $this->fields['requestId'];
        }
        if (array_key_exists('hasAmountAdjustment', $this->fields)) {
            $data['hasAmountAdjustment'] = $this->fields['hasAmountAdjustment'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('processedTime', $this->fields)) {
            $data['processedTime'] = $this->fields['processedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
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
            $data['acquirerName'] = $this->fields['acquirerName'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
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
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setResult(null|string $result): static
    {
        $this->fields['result'] = $result;

        return $this;
    }

    private function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    private function setPurchaseAmount(null|float|string $purchaseAmount): static
    {
        if (is_string($purchaseAmount)) {
            $purchaseAmount = (float) $purchaseAmount;
        }

        $this->fields['purchaseAmount'] = $purchaseAmount;

        return $this;
    }

    private function setRequestAmount(null|float|string $requestAmount): static
    {
        if (is_string($requestAmount)) {
            $requestAmount = (float) $requestAmount;
        }

        $this->fields['requestAmount'] = $requestAmount;

        return $this;
    }

    /**
     * @param null|string[] $childTransactions
     */
    private function setChildTransactions(null|array $childTransactions): static
    {
        $this->fields['childTransactions'] = $childTransactions;

        return $this;
    }

    /**
     * @param null|string[] $invoiceIds
     */
    private function setInvoiceIds(null|array $invoiceIds): static
    {
        $this->fields['invoiceIds'] = $invoiceIds;

        return $this;
    }

    /**
     * @param null|string[] $subscriptionIds
     */
    private function setSubscriptionIds(null|array $subscriptionIds): static
    {
        $this->fields['subscriptionIds'] = $subscriptionIds;

        return $this;
    }

    /**
     * @param null|string[] $planIds
     */
    private function setPlanIds(null|array $planIds): static
    {
        $this->fields['planIds'] = $planIds;

        return $this;
    }

    private function setIsRebill(null|bool $isRebill): static
    {
        $this->fields['isRebill'] = $isRebill;

        return $this;
    }

    private function setRebillNumber(null|int $rebillNumber): static
    {
        $this->fields['rebillNumber'] = $rebillNumber;

        return $this;
    }

    private function setHas3ds(null|bool $has3ds): static
    {
        $this->fields['has3ds'] = $has3ds;

        return $this;
    }

    private function setRetryNumber(null|int $retryNumber): static
    {
        $this->fields['retryNumber'] = $retryNumber;

        return $this;
    }

    private function setIsRetry(null|bool $isRetry): static
    {
        $this->fields['isRetry'] = $isRetry;

        return $this;
    }

    private function setBillingDescriptor(null|string $billingDescriptor): static
    {
        $this->fields['billingDescriptor'] = $billingDescriptor;

        return $this;
    }

    private function setHasAmountAdjustment(null|bool $hasAmountAdjustment): static
    {
        $this->fields['hasAmountAdjustment'] = $hasAmountAdjustment;

        return $this;
    }

    private function setProcessedTime(null|DateTimeImmutable|string $processedTime): static
    {
        if ($processedTime !== null && !($processedTime instanceof DateTimeImmutable)) {
            $processedTime = new DateTimeImmutable($processedTime);
        }

        $this->fields['processedTime'] = $processedTime;

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

    private function setGatewayAccountId(null|string $gatewayAccountId): static
    {
        $this->fields['gatewayAccountId'] = $gatewayAccountId;

        return $this;
    }

    private function setGatewayTransactionId(null|string $gatewayTransactionId): static
    {
        $this->fields['gatewayTransactionId'] = $gatewayTransactionId;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    /**
     * @param null|array<string,string> $referenceData
     */
    private function setReferenceData(null|array $referenceData): static
    {
        $this->fields['referenceData'] = $referenceData;

        return $this;
    }

    private function setBin(null|string $bin): static
    {
        $this->fields['bin'] = $bin;

        return $this;
    }

    private function setHasDcc(null|bool $hasDcc): static
    {
        $this->fields['hasDcc'] = $hasDcc;

        return $this;
    }

    private function setHasBumpOffer(null|bool $hasBumpOffer): static
    {
        $this->fields['hasBumpOffer'] = $hasBumpOffer;

        return $this;
    }

    private function setRiskScore(null|int $riskScore): static
    {
        $this->fields['riskScore'] = $riskScore;

        return $this;
    }

    private function setIsDisputed(null|bool $isDisputed): static
    {
        $this->fields['isDisputed'] = $isDisputed;

        return $this;
    }

    private function setDisputeTime(null|DateTimeImmutable|string $disputeTime): static
    {
        if ($disputeTime !== null && !($disputeTime instanceof DateTimeImmutable)) {
            $disputeTime = new DateTimeImmutable($disputeTime);
        }

        $this->fields['disputeTime'] = $disputeTime;

        return $this;
    }

    private function setDisputeStatus(null|string $disputeStatus): static
    {
        $this->fields['disputeStatus'] = $disputeStatus;

        return $this;
    }

    private function setIsReconciled(null|bool $isReconciled): static
    {
        $this->fields['isReconciled'] = $isReconciled;

        return $this;
    }

    private function setHadDiscrepancy(null|bool $hadDiscrepancy): static
    {
        $this->fields['hadDiscrepancy'] = $hadDiscrepancy;

        return $this;
    }

    private function setArn(null|string $arn): static
    {
        $this->fields['arn'] = $arn;

        return $this;
    }

    private function setReportAmount(null|float|string $reportAmount): static
    {
        if (is_string($reportAmount)) {
            $reportAmount = (float) $reportAmount;
        }

        $this->fields['reportAmount'] = $reportAmount;

        return $this;
    }

    private function setSettlementTime(null|DateTimeImmutable|string $settlementTime): static
    {
        if ($settlementTime !== null && !($settlementTime instanceof DateTimeImmutable)) {
            $settlementTime = new DateTimeImmutable($settlementTime);
        }

        $this->fields['settlementTime'] = $settlementTime;

        return $this;
    }

    private function setDiscrepancyTime(null|DateTimeImmutable|string $discrepancyTime): static
    {
        if ($discrepancyTime !== null && !($discrepancyTime instanceof DateTimeImmutable)) {
            $discrepancyTime = new DateTimeImmutable($discrepancyTime);
        }

        $this->fields['discrepancyTime'] = $discrepancyTime;

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
