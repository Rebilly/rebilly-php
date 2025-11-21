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

class RecurringOrder implements Order
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_CANCELED = 'canceled';

    public const STATUS_CHURNED = 'churned';

    public const STATUS_PAUSED = 'paused';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_TRIAL_ENDED = 'trial-ended';

    public const STATUS_ABANDONED = 'abandoned';

    public const CANCELED_BY_MERCHANT = 'merchant';

    public const CANCELED_BY_CUSTOMER = 'customer';

    public const CANCELED_BY_REBILLY = 'rebilly';

    public const CANCELED_BY_NULL = 'null';

    public const CANCEL_CATEGORY_BILLING_FAILURE = 'billing-failure';

    public const CANCEL_CATEGORY_DID_NOT_USE = 'did-not-use';

    public const CANCEL_CATEGORY_DID_NOT_WANT = 'did-not-want';

    public const CANCEL_CATEGORY_MISSING_FEATURES = 'missing-features';

    public const CANCEL_CATEGORY_BUGS_OR_PROBLEMS = 'bugs-or-problems';

    public const CANCEL_CATEGORY_DO_NOT_REMEMBER = 'do-not-remember';

    public const CANCEL_CATEGORY_RISK_WARNING = 'risk-warning';

    public const CANCEL_CATEGORY_CONTRACT_EXPIRED = 'contract-expired';

    public const CANCEL_CATEGORY_TOO_EXPENSIVE = 'too-expensive';

    public const CANCEL_CATEGORY_NEVER_STARTED = 'never-started';

    public const CANCEL_CATEGORY_SWITCHED_PLAN = 'switched-plan';

    public const CANCEL_CATEGORY_OTHER = 'other';

    public const CANCEL_CATEGORY_NULL = 'null';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('activationInvoiceId', $data)) {
            $this->setActivationInvoiceId($data['activationInvoiceId']);
        }
        if (array_key_exists('recentInvoiceId', $data)) {
            $this->setRecentInvoiceId($data['recentInvoiceId']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('inTrial', $data)) {
            $this->setInTrial($data['inTrial']);
        }
        if (array_key_exists('trial', $data)) {
            $this->setTrial($data['trial']);
        }
        if (array_key_exists('isTrialOnly', $data)) {
            $this->setIsTrialOnly($data['isTrialOnly']);
        }
        if (array_key_exists('trialConversionTime', $data)) {
            $this->setTrialConversionTime($data['trialConversionTime']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('invoiceIssueTimeShift', $data)) {
            $this->setInvoiceIssueTimeShift($data['invoiceIssueTimeShift']);
        }
        if (array_key_exists('invoiceDueTimeShift', $data)) {
            $this->setInvoiceDueTimeShift($data['invoiceDueTimeShift']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('poNumber', $data)) {
            $this->setPoNumber($data['poNumber']);
        }
        if (array_key_exists('notes', $data)) {
            $this->setNotes($data['notes']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('deliveryAddress', $data)) {
            $this->setDeliveryAddress($data['deliveryAddress']);
        }
        if (array_key_exists('delinquencyPeriod', $data)) {
            $this->setDelinquencyPeriod($data['delinquencyPeriod']);
        }
        if (array_key_exists('couponIds', $data)) {
            $this->setCouponIds($data['couponIds']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('startTime', $data)) {
            $this->setStartTime($data['startTime']);
        }
        if (array_key_exists('activationTime', $data)) {
            $this->setActivationTime($data['activationTime']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('shipping', $data)) {
            $this->setShipping($data['shipping']);
        }
        if (array_key_exists('autopay', $data)) {
            $this->setAutopay($data['autopay']);
        }
        if (array_key_exists('abandonTime', $data)) {
            $this->setAbandonTime($data['abandonTime']);
        }
        if (array_key_exists('abandonReminderTime', $data)) {
            $this->setAbandonReminderTime($data['abandonReminderTime']);
        }
        if (array_key_exists('abandonReminderNumber', $data)) {
            $this->setAbandonReminderNumber($data['abandonReminderNumber']);
        }
        if (array_key_exists('voidTime', $data)) {
            $this->setVoidTime($data['voidTime']);
        }
        if (array_key_exists('churnTime', $data)) {
            $this->setChurnTime($data['churnTime']);
        }
        if (array_key_exists('cancellationTime', $data)) {
            $this->setCancellationTime($data['cancellationTime']);
        }
        if (array_key_exists('canceledBy', $data)) {
            $this->setCanceledBy($data['canceledBy']);
        }
        if (array_key_exists('cancelCategory', $data)) {
            $this->setCancelCategory($data['cancelCategory']);
        }
        if (array_key_exists('cancelDescription', $data)) {
            $this->setCancelDescription($data['cancelDescription']);
        }
        if (array_key_exists('billingPortalToken', $data)) {
            $this->setBillingPortalToken($data['billingPortalToken']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('mrr', $data)) {
            $this->setMrr($data['mrr']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('renewalTime', $data)) {
            $this->setRenewalTime($data['renewalTime']);
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
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'recurring';
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
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

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getActivationInvoiceId(): ?string
    {
        return $this->fields['activationInvoiceId'] ?? null;
    }

    public function getRecentInvoiceId(): ?string
    {
        return $this->fields['recentInvoiceId'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getInTrial(): ?bool
    {
        return $this->fields['inTrial'] ?? null;
    }

    public function getTrial(): ?RecurringOrderTrial
    {
        return $this->fields['trial'] ?? null;
    }

    public function setTrial(null|RecurringOrderTrial|array $trial): static
    {
        if ($trial !== null && !($trial instanceof RecurringOrderTrial)) {
            $trial = RecurringOrderTrial::from($trial);
        }

        $this->fields['trial'] = $trial;

        return $this;
    }

    public function getIsTrialOnly(): ?bool
    {
        return $this->fields['isTrialOnly'] ?? null;
    }

    public function setIsTrialOnly(null|bool $isTrialOnly): static
    {
        $this->fields['isTrialOnly'] = $isTrialOnly;

        return $this;
    }

    public function getTrialConversionTime(): ?DateTimeImmutable
    {
        return $this->fields['trialConversionTime'] ?? null;
    }

    /**
     * @return RecurringOrderItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|RecurringOrderItems[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof RecurringOrderItems ? $value : RecurringOrderItemsFactory::from($value),
            $items,
        );

        $this->fields['items'] = $items;

        return $this;
    }

    public function getInvoiceIssueTimeShift(): ?string
    {
        return $this->fields['invoiceIssueTimeShift'] ?? null;
    }

    public function setInvoiceIssueTimeShift(null|string $invoiceIssueTimeShift): static
    {
        $this->fields['invoiceIssueTimeShift'] = $invoiceIssueTimeShift;

        return $this;
    }

    public function getInvoiceDueTimeShift(): ?string
    {
        return $this->fields['invoiceDueTimeShift'] ?? null;
    }

    public function setInvoiceDueTimeShift(null|string $invoiceDueTimeShift): static
    {
        $this->fields['invoiceDueTimeShift'] = $invoiceDueTimeShift;

        return $this;
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

    public function getPoNumber(): ?string
    {
        return $this->fields['poNumber'] ?? null;
    }

    public function setPoNumber(null|string $poNumber): static
    {
        $this->fields['poNumber'] = $poNumber;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->fields['notes'] ?? null;
    }

    public function setNotes(null|string $notes): static
    {
        $this->fields['notes'] = $notes;

        return $this;
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

    public function getDeliveryAddress(): ?ContactObject
    {
        return $this->fields['deliveryAddress'] ?? null;
    }

    public function setDeliveryAddress(null|ContactObject|array $deliveryAddress): static
    {
        if ($deliveryAddress !== null && !($deliveryAddress instanceof ContactObject)) {
            $deliveryAddress = ContactObject::from($deliveryAddress);
        }

        $this->fields['deliveryAddress'] = $deliveryAddress;

        return $this;
    }

    public function getDelinquencyPeriod(): ?string
    {
        return $this->fields['delinquencyPeriod'] ?? null;
    }

    public function setDelinquencyPeriod(null|string $delinquencyPeriod): static
    {
        $this->fields['delinquencyPeriod'] = $delinquencyPeriod;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getCouponIds(): ?array
    {
        return $this->fields['couponIds'] ?? null;
    }

    /**
     * @param null|string[] $couponIds
     */
    public function setCouponIds(null|array $couponIds): static
    {
        $this->fields['couponIds'] = $couponIds;

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

    public function getStartTime(): ?DateTimeImmutable
    {
        return $this->fields['startTime'] ?? null;
    }

    public function setStartTime(null|DateTimeImmutable|string $startTime): static
    {
        if ($startTime !== null && !($startTime instanceof DateTimeImmutable)) {
            $startTime = new DateTimeImmutable($startTime);
        }

        $this->fields['startTime'] = $startTime;

        return $this;
    }

    public function getActivationTime(): ?DateTimeImmutable
    {
        return $this->fields['activationTime'] ?? null;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function getShipping(): ?Shipping
    {
        return $this->fields['shipping'] ?? null;
    }

    public function setShipping(null|Shipping|array $shipping): static
    {
        if ($shipping !== null && !($shipping instanceof Shipping)) {
            $shipping = ShippingFactory::from($shipping);
        }

        $this->fields['shipping'] = $shipping;

        return $this;
    }

    public function getAutopay(): ?bool
    {
        return $this->fields['autopay'] ?? null;
    }

    public function setAutopay(null|bool $autopay): static
    {
        $this->fields['autopay'] = $autopay;

        return $this;
    }

    public function getAbandonTime(): ?DateTimeImmutable
    {
        return $this->fields['abandonTime'] ?? null;
    }

    public function setAbandonTime(null|DateTimeImmutable|string $abandonTime): static
    {
        if ($abandonTime !== null && !($abandonTime instanceof DateTimeImmutable)) {
            $abandonTime = new DateTimeImmutable($abandonTime);
        }

        $this->fields['abandonTime'] = $abandonTime;

        return $this;
    }

    public function getAbandonReminderTime(): ?DateTimeImmutable
    {
        return $this->fields['abandonReminderTime'] ?? null;
    }

    public function getAbandonReminderNumber(): ?int
    {
        return $this->fields['abandonReminderNumber'] ?? null;
    }

    public function getVoidTime(): ?DateTimeImmutable
    {
        return $this->fields['voidTime'] ?? null;
    }

    public function getChurnTime(): ?DateTimeImmutable
    {
        return $this->fields['churnTime'] ?? null;
    }

    public function getCancellationTime(): ?DateTimeImmutable
    {
        return $this->fields['cancellationTime'] ?? null;
    }

    public function getCanceledBy(): ?string
    {
        return $this->fields['canceledBy'] ?? null;
    }

    public function getCancelCategory(): ?string
    {
        return $this->fields['cancelCategory'] ?? null;
    }

    public function getCancelDescription(): ?string
    {
        return $this->fields['cancelDescription'] ?? null;
    }

    public function getBillingPortalToken(): ?string
    {
        return $this->fields['billingPortalToken'] ?? null;
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

    public function getMrr(): ?float
    {
        return $this->fields['mrr'] ?? null;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getRenewalTime(): ?DateTimeImmutable
    {
        return $this->fields['renewalTime'] ?? null;
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

    public function getEmbedded(): ?RecurringOrderEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|RecurringOrderEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof RecurringOrderEmbedded)) {
            $embedded = RecurringOrderEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'recurring',
        ];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('activationInvoiceId', $this->fields)) {
            $data['activationInvoiceId'] = $this->fields['activationInvoiceId'];
        }
        if (array_key_exists('recentInvoiceId', $this->fields)) {
            $data['recentInvoiceId'] = $this->fields['recentInvoiceId'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('inTrial', $this->fields)) {
            $data['inTrial'] = $this->fields['inTrial'];
        }
        if (array_key_exists('trial', $this->fields)) {
            $data['trial'] = $this->fields['trial']?->jsonSerialize();
        }
        if (array_key_exists('isTrialOnly', $this->fields)) {
            $data['isTrialOnly'] = $this->fields['isTrialOnly'];
        }
        if (array_key_exists('trialConversionTime', $this->fields)) {
            $data['trialConversionTime'] = $this->fields['trialConversionTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = array_map(
                static fn (RecurringOrderItems $recurringOrderItems) => $recurringOrderItems->jsonSerialize(),
                $this->fields['items'],
            );
        }
        if (array_key_exists('invoiceIssueTimeShift', $this->fields)) {
            $data['invoiceIssueTimeShift'] = $this->fields['invoiceIssueTimeShift'];
        }
        if (array_key_exists('invoiceDueTimeShift', $this->fields)) {
            $data['invoiceDueTimeShift'] = $this->fields['invoiceDueTimeShift'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('poNumber', $this->fields)) {
            $data['poNumber'] = $this->fields['poNumber'];
        }
        if (array_key_exists('notes', $this->fields)) {
            $data['notes'] = $this->fields['notes'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('deliveryAddress', $this->fields)) {
            $data['deliveryAddress'] = $this->fields['deliveryAddress']?->jsonSerialize();
        }
        if (array_key_exists('delinquencyPeriod', $this->fields)) {
            $data['delinquencyPeriod'] = $this->fields['delinquencyPeriod'];
        }
        if (array_key_exists('couponIds', $this->fields)) {
            $data['couponIds'] = $this->fields['couponIds'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('startTime', $this->fields)) {
            $data['startTime'] = $this->fields['startTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('activationTime', $this->fields)) {
            $data['activationTime'] = $this->fields['activationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('shipping', $this->fields)) {
            $data['shipping'] = $this->fields['shipping']?->jsonSerialize();
        }
        if (array_key_exists('autopay', $this->fields)) {
            $data['autopay'] = $this->fields['autopay'];
        }
        if (array_key_exists('abandonTime', $this->fields)) {
            $data['abandonTime'] = $this->fields['abandonTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('abandonReminderTime', $this->fields)) {
            $data['abandonReminderTime'] = $this->fields['abandonReminderTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('abandonReminderNumber', $this->fields)) {
            $data['abandonReminderNumber'] = $this->fields['abandonReminderNumber'];
        }
        if (array_key_exists('voidTime', $this->fields)) {
            $data['voidTime'] = $this->fields['voidTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('churnTime', $this->fields)) {
            $data['churnTime'] = $this->fields['churnTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('cancellationTime', $this->fields)) {
            $data['cancellationTime'] = $this->fields['cancellationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('canceledBy', $this->fields)) {
            $data['canceledBy'] = $this->fields['canceledBy'];
        }
        if (array_key_exists('cancelCategory', $this->fields)) {
            $data['cancelCategory'] = $this->fields['cancelCategory'];
        }
        if (array_key_exists('cancelDescription', $this->fields)) {
            $data['cancelDescription'] = $this->fields['cancelDescription'];
        }
        if (array_key_exists('billingPortalToken', $this->fields)) {
            $data['billingPortalToken'] = $this->fields['billingPortalToken'];
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('mrr', $this->fields)) {
            $data['mrr'] = $this->fields['mrr'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('renewalTime', $this->fields)) {
            $data['renewalTime'] = $this->fields['renewalTime']?->format(DateTimeInterface::RFC3339);
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
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setOrganizationId(null|string $organizationId): static
    {
        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    private function setActivationInvoiceId(null|string $activationInvoiceId): static
    {
        $this->fields['activationInvoiceId'] = $activationInvoiceId;

        return $this;
    }

    private function setRecentInvoiceId(null|string $recentInvoiceId): static
    {
        $this->fields['recentInvoiceId'] = $recentInvoiceId;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setInTrial(null|bool $inTrial): static
    {
        $this->fields['inTrial'] = $inTrial;

        return $this;
    }

    private function setTrialConversionTime(null|DateTimeImmutable|string $trialConversionTime): static
    {
        if ($trialConversionTime !== null && !($trialConversionTime instanceof DateTimeImmutable)) {
            $trialConversionTime = new DateTimeImmutable($trialConversionTime);
        }

        $this->fields['trialConversionTime'] = $trialConversionTime;

        return $this;
    }

    private function setActivationTime(null|DateTimeImmutable|string $activationTime): static
    {
        if ($activationTime !== null && !($activationTime instanceof DateTimeImmutable)) {
            $activationTime = new DateTimeImmutable($activationTime);
        }

        $this->fields['activationTime'] = $activationTime;

        return $this;
    }

    private function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    private function setAbandonReminderTime(null|DateTimeImmutable|string $abandonReminderTime): static
    {
        if ($abandonReminderTime !== null && !($abandonReminderTime instanceof DateTimeImmutable)) {
            $abandonReminderTime = new DateTimeImmutable($abandonReminderTime);
        }

        $this->fields['abandonReminderTime'] = $abandonReminderTime;

        return $this;
    }

    private function setAbandonReminderNumber(null|int $abandonReminderNumber): static
    {
        $this->fields['abandonReminderNumber'] = $abandonReminderNumber;

        return $this;
    }

    private function setVoidTime(null|DateTimeImmutable|string $voidTime): static
    {
        if ($voidTime !== null && !($voidTime instanceof DateTimeImmutable)) {
            $voidTime = new DateTimeImmutable($voidTime);
        }

        $this->fields['voidTime'] = $voidTime;

        return $this;
    }

    private function setChurnTime(null|DateTimeImmutable|string $churnTime): static
    {
        if ($churnTime !== null && !($churnTime instanceof DateTimeImmutable)) {
            $churnTime = new DateTimeImmutable($churnTime);
        }

        $this->fields['churnTime'] = $churnTime;

        return $this;
    }

    private function setCancellationTime(null|DateTimeImmutable|string $cancellationTime): static
    {
        if ($cancellationTime !== null && !($cancellationTime instanceof DateTimeImmutable)) {
            $cancellationTime = new DateTimeImmutable($cancellationTime);
        }

        $this->fields['cancellationTime'] = $cancellationTime;

        return $this;
    }

    private function setCanceledBy(null|string $canceledBy): static
    {
        $this->fields['canceledBy'] = $canceledBy;

        return $this;
    }

    private function setCancelCategory(null|string $cancelCategory): static
    {
        $this->fields['cancelCategory'] = $cancelCategory;

        return $this;
    }

    private function setCancelDescription(null|string $cancelDescription): static
    {
        $this->fields['cancelDescription'] = $cancelDescription;

        return $this;
    }

    private function setBillingPortalToken(null|string $billingPortalToken): static
    {
        $this->fields['billingPortalToken'] = $billingPortalToken;

        return $this;
    }

    private function setMrr(null|float|string $mrr): static
    {
        if (is_string($mrr)) {
            $mrr = (float) $mrr;
        }

        $this->fields['mrr'] = $mrr;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    private function setRenewalTime(null|DateTimeImmutable|string $renewalTime): static
    {
        if ($renewalTime !== null && !($renewalTime instanceof DateTimeImmutable)) {
            $renewalTime = new DateTimeImmutable($renewalTime);
        }

        $this->fields['renewalTime'] = $renewalTime;

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
