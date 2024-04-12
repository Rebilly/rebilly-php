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

class SubscriptionCancellation implements JsonSerializable
{
    public const CANCELED_BY_MERCHANT = 'merchant';

    public const CANCELED_BY_CUSTOMER = 'customer';

    public const CANCELED_BY_REBILLY = 'rebilly';

    public const REASON_DID_NOT_USE = 'did-not-use';

    public const REASON_DID_NOT_WANT = 'did-not-want';

    public const REASON_MISSING_FEATURES = 'missing-features';

    public const REASON_BUGS_OR_PROBLEMS = 'bugs-or-problems';

    public const REASON_DO_NOT_REMEMBER = 'do-not-remember';

    public const REASON_RISK_WARNING = 'risk-warning';

    public const REASON_CONTRACT_EXPIRED = 'contract-expired';

    public const REASON_TOO_EXPENSIVE = 'too-expensive';

    public const REASON_OTHER = 'other';

    public const REASON_BILLING_FAILURE = 'billing-failure';

    public const STATUS_DRAFT = 'draft';

    public const STATUS_CONFIRMED = 'confirmed';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_REVOKED = 'revoked';

    public const CHURN_TIME_POLICY_NULL = 'null';

    public const CHURN_TIME_POLICY_NOW = 'now';

    public const CHURN_TIME_POLICY_AT_NEXT_RENEWAL = 'at-next-renewal';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('subscriptionId', $data)) {
            $this->setSubscriptionId($data['subscriptionId']);
        }
        if (array_key_exists('proratedInvoiceId', $data)) {
            $this->setProratedInvoiceId($data['proratedInvoiceId']);
        }
        if (array_key_exists('appliedInvoiceId', $data)) {
            $this->setAppliedInvoiceId($data['appliedInvoiceId']);
        }
        if (array_key_exists('canceledBy', $data)) {
            $this->setCanceledBy($data['canceledBy']);
        }
        if (array_key_exists('reason', $data)) {
            $this->setReason($data['reason']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('prorated', $data)) {
            $this->setProrated($data['prorated']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('canceledTime', $data)) {
            $this->setCanceledTime($data['canceledTime']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('churnTime', $data)) {
            $this->setChurnTime($data['churnTime']);
        }
        if (array_key_exists('churnTimePolicy', $data)) {
            $this->setChurnTimePolicy($data['churnTimePolicy']);
        }
        if (array_key_exists('lineItems', $data)) {
            $this->setLineItems($data['lineItems']);
        }
        if (array_key_exists('lineItemSubtotal', $data)) {
            $this->setLineItemSubtotal($data['lineItemSubtotal']);
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

    public function getSubscriptionId(): string
    {
        return $this->fields['subscriptionId'];
    }

    public function setSubscriptionId(string $subscriptionId): static
    {
        $this->fields['subscriptionId'] = $subscriptionId;

        return $this;
    }

    public function getProratedInvoiceId(): ?string
    {
        return $this->fields['proratedInvoiceId'] ?? null;
    }

    public function getAppliedInvoiceId(): ?string
    {
        return $this->fields['appliedInvoiceId'] ?? null;
    }

    public function getCanceledBy(): ?string
    {
        return $this->fields['canceledBy'] ?? null;
    }

    public function setCanceledBy(null|string $canceledBy): static
    {
        $this->fields['canceledBy'] = $canceledBy;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->fields['reason'] ?? null;
    }

    public function setReason(null|string $reason): static
    {
        $this->fields['reason'] = $reason;

        return $this;
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

    public function getProrated(): ?bool
    {
        return $this->fields['prorated'] ?? null;
    }

    public function setProrated(null|bool $prorated): static
    {
        $this->fields['prorated'] = $prorated;

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

    public function getCanceledTime(): ?DateTimeImmutable
    {
        return $this->fields['canceledTime'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getChurnTime(): ?DateTimeImmutable
    {
        return $this->fields['churnTime'] ?? null;
    }

    public function setChurnTime(null|DateTimeImmutable|string $churnTime): static
    {
        if ($churnTime !== null && !($churnTime instanceof DateTimeImmutable)) {
            $churnTime = new DateTimeImmutable($churnTime);
        }

        $this->fields['churnTime'] = $churnTime;

        return $this;
    }

    public function getChurnTimePolicy(): ?string
    {
        return $this->fields['churnTimePolicy'] ?? null;
    }

    public function setChurnTimePolicy(null|string $churnTimePolicy): static
    {
        $this->fields['churnTimePolicy'] = $churnTimePolicy;

        return $this;
    }

    /**
     * @return null|SubscriptionCancellationLineItems[]
     */
    public function getLineItems(): ?array
    {
        return $this->fields['lineItems'] ?? null;
    }

    /**
     * @param null|array[]|SubscriptionCancellationLineItems[] $lineItems
     */
    public function setLineItems(null|array $lineItems): static
    {
        $lineItems = $lineItems !== null ? array_map(
            fn ($value) => $value instanceof SubscriptionCancellationLineItems ? $value : SubscriptionCancellationLineItems::from($value),
            $lineItems,
        ) : null;

        $this->fields['lineItems'] = $lineItems;

        return $this;
    }

    public function getLineItemSubtotal(): ?SubscriptionCancellationLineItemSubtotal
    {
        return $this->fields['lineItemSubtotal'] ?? null;
    }

    public function setLineItemSubtotal(null|SubscriptionCancellationLineItemSubtotal|array $lineItemSubtotal): static
    {
        if ($lineItemSubtotal !== null && !($lineItemSubtotal instanceof SubscriptionCancellationLineItemSubtotal)) {
            $lineItemSubtotal = SubscriptionCancellationLineItemSubtotal::from($lineItemSubtotal);
        }

        $this->fields['lineItemSubtotal'] = $lineItemSubtotal;

        return $this;
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
        if (array_key_exists('subscriptionId', $this->fields)) {
            $data['subscriptionId'] = $this->fields['subscriptionId'];
        }
        if (array_key_exists('proratedInvoiceId', $this->fields)) {
            $data['proratedInvoiceId'] = $this->fields['proratedInvoiceId'];
        }
        if (array_key_exists('appliedInvoiceId', $this->fields)) {
            $data['appliedInvoiceId'] = $this->fields['appliedInvoiceId'];
        }
        if (array_key_exists('canceledBy', $this->fields)) {
            $data['canceledBy'] = $this->fields['canceledBy'];
        }
        if (array_key_exists('reason', $this->fields)) {
            $data['reason'] = $this->fields['reason'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('prorated', $this->fields)) {
            $data['prorated'] = $this->fields['prorated'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('canceledTime', $this->fields)) {
            $data['canceledTime'] = $this->fields['canceledTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('churnTime', $this->fields)) {
            $data['churnTime'] = $this->fields['churnTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('churnTimePolicy', $this->fields)) {
            $data['churnTimePolicy'] = $this->fields['churnTimePolicy'];
        }
        if (array_key_exists('lineItems', $this->fields)) {
            $data['lineItems'] = $this->fields['lineItems'] !== null
                ? array_map(
                    static fn (SubscriptionCancellationLineItems $subscriptionCancellationLineItems) => $subscriptionCancellationLineItems->jsonSerialize(),
                    $this->fields['lineItems'],
                )
                : null;
        }
        if (array_key_exists('lineItemSubtotal', $this->fields)) {
            $data['lineItemSubtotal'] = $this->fields['lineItemSubtotal']?->jsonSerialize();
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

    private function setProratedInvoiceId(null|string $proratedInvoiceId): static
    {
        $this->fields['proratedInvoiceId'] = $proratedInvoiceId;

        return $this;
    }

    private function setAppliedInvoiceId(null|string $appliedInvoiceId): static
    {
        $this->fields['appliedInvoiceId'] = $appliedInvoiceId;

        return $this;
    }

    private function setCanceledTime(null|DateTimeImmutable|string $canceledTime): static
    {
        if ($canceledTime !== null && !($canceledTime instanceof DateTimeImmutable)) {
            $canceledTime = new DateTimeImmutable($canceledTime);
        }

        $this->fields['canceledTime'] = $canceledTime;

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
