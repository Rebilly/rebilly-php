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

abstract class CommonTransaction implements JsonSerializable
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

    public const STATUS_SUSPENDED = 'suspended';

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

    private array $fields = [];

    protected function __construct(array $data = [])
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
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getWebsiteId(): ?string
    {
        return $this->fields['websiteId'] ?? null;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @psalm-return self::RESULT_*|null $result
     */
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

    public function getPurchaseAmount(): ?float
    {
        return $this->fields['purchaseAmount'] ?? null;
    }

    public function getPurchaseCurrency(): ?string
    {
        return $this->fields['purchaseCurrency'] ?? null;
    }

    public function getRequestAmount(): ?float
    {
        return $this->fields['requestAmount'] ?? null;
    }

    public function getRequestCurrency(): ?string
    {
        return $this->fields['requestCurrency'] ?? null;
    }

    public function getParentTransactionId(): ?string
    {
        return $this->fields['parentTransactionId'] ?? null;
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

    public function setBillingAddress(null|ContactObject|array $billingAddress): self
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

    public function get3ds(): ?ThreeDSecureResult
    {
        return $this->fields['3ds'] ?? null;
    }

    public function set3ds(null|ThreeDSecureResult|array $_3ds): self
    {
        if ($_3ds !== null && !($_3ds instanceof ThreeDSecureResult)) {
            $_3ds = ThreeDSecureResult::from($_3ds);
        }

        $this->fields['3ds'] = $_3ds;

        return $this;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): self
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

    public function setDescription(null|string $description): self
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getRequestId(): ?string
    {
        return $this->fields['requestId'] ?? null;
    }

    public function setRequestId(null|string $requestId): self
    {
        $this->fields['requestId'] = $requestId;

        return $this;
    }

    public function getHasAmountAdjustment(): ?bool
    {
        return $this->fields['hasAmountAdjustment'] ?? null;
    }

    public function getGatewayName(): ?GatewayName
    {
        return $this->fields['gatewayName'] ?? null;
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

    public function getProcessedTime(): ?DateTimeImmutable
    {
        return $this->fields['processedTime'] ?? null;
    }

    public function setProcessedTime(null|DateTimeImmutable|string $processedTime): self
    {
        if ($processedTime !== null && !($processedTime instanceof DateTimeImmutable)) {
            $processedTime = new DateTimeImmutable($processedTime);
        }

        $this->fields['processedTime'] = $processedTime;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

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
            $data['gatewayName'] = $this->fields['gatewayName']?->value;
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

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setWebsiteId(null|string $websiteId): self
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

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

    /**
     * @psalm-param self::RESULT_*|null $result
     */
    private function setResult(null|string $result): self
    {
        $this->fields['result'] = $result;

        return $this;
    }

    private function setAmount(null|float|string $amount): self
    {
        if ($amount !== null && is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    private function setCurrency(null|string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    private function setPurchaseAmount(null|float|string $purchaseAmount): self
    {
        if ($purchaseAmount !== null && is_string($purchaseAmount)) {
            $purchaseAmount = (float) $purchaseAmount;
        }

        $this->fields['purchaseAmount'] = $purchaseAmount;

        return $this;
    }

    private function setPurchaseCurrency(null|string $purchaseCurrency): self
    {
        $this->fields['purchaseCurrency'] = $purchaseCurrency;

        return $this;
    }

    private function setRequestAmount(null|float|string $requestAmount): self
    {
        if ($requestAmount !== null && is_string($requestAmount)) {
            $requestAmount = (float) $requestAmount;
        }

        $this->fields['requestAmount'] = $requestAmount;

        return $this;
    }

    private function setRequestCurrency(null|string $requestCurrency): self
    {
        $this->fields['requestCurrency'] = $requestCurrency;

        return $this;
    }

    private function setParentTransactionId(null|string $parentTransactionId): self
    {
        $this->fields['parentTransactionId'] = $parentTransactionId;

        return $this;
    }

    /**
     * @param null|string[] $childTransactions
     */
    private function setChildTransactions(null|array $childTransactions): self
    {
        $childTransactions = $childTransactions !== null ? array_map(fn ($value) => $value ?? null, $childTransactions) : null;

        $this->fields['childTransactions'] = $childTransactions;

        return $this;
    }

    /**
     * @param null|string[] $invoiceIds
     */
    private function setInvoiceIds(null|array $invoiceIds): self
    {
        $invoiceIds = $invoiceIds !== null ? array_map(fn ($value) => $value ?? null, $invoiceIds) : null;

        $this->fields['invoiceIds'] = $invoiceIds;

        return $this;
    }

    /**
     * @param null|string[] $subscriptionIds
     */
    private function setSubscriptionIds(null|array $subscriptionIds): self
    {
        $subscriptionIds = $subscriptionIds !== null ? array_map(fn ($value) => $value ?? null, $subscriptionIds) : null;

        $this->fields['subscriptionIds'] = $subscriptionIds;

        return $this;
    }

    /**
     * @param null|string[] $planIds
     */
    private function setPlanIds(null|array $planIds): self
    {
        $planIds = $planIds !== null ? array_map(fn ($value) => $value ?? null, $planIds) : null;

        $this->fields['planIds'] = $planIds;

        return $this;
    }

    private function setIsRebill(null|bool $isRebill): self
    {
        $this->fields['isRebill'] = $isRebill;

        return $this;
    }

    private function setRebillNumber(null|int $rebillNumber): self
    {
        $this->fields['rebillNumber'] = $rebillNumber;

        return $this;
    }

    private function setHas3ds(null|bool $has3ds): self
    {
        $this->fields['has3ds'] = $has3ds;

        return $this;
    }

    private function setRetryNumber(null|int $retryNumber): self
    {
        $this->fields['retryNumber'] = $retryNumber;

        return $this;
    }

    private function setIsRetry(null|bool $isRetry): self
    {
        $this->fields['isRetry'] = $isRetry;

        return $this;
    }

    private function setBillingDescriptor(null|string $billingDescriptor): self
    {
        $this->fields['billingDescriptor'] = $billingDescriptor;

        return $this;
    }

    private function setHasAmountAdjustment(null|bool $hasAmountAdjustment): self
    {
        $this->fields['hasAmountAdjustment'] = $hasAmountAdjustment;

        return $this;
    }

    private function setGatewayName(null|GatewayName|string $gatewayName): self
    {
        if ($gatewayName !== null && !($gatewayName instanceof GatewayName)) {
            $gatewayName = GatewayName::from($gatewayName);
        }

        $this->fields['gatewayName'] = $gatewayName;

        return $this;
    }
}
