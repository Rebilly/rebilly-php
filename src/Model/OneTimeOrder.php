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

class OneTimeOrder implements Order
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_ABANDONED = 'abandoned';

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
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
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
        if (array_key_exists('activationTime', $data)) {
            $this->setActivationTime($data['activationTime']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('shipping', $data)) {
            $this->setShipping($data['shipping']);
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
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
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
        return 'one-time';
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

    /**
     * @return OneTimeSaleItem[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|OneTimeSaleItem[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof OneTimeSaleItem ? $value : OneTimeSaleItem::from($value),
            $items,
        );

        $this->fields['items'] = $items;

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

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
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

    public function getEmbedded(): ?OneTimeOrderEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|OneTimeOrderEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof OneTimeOrderEmbedded)) {
            $embedded = OneTimeOrderEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'one-time',
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
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = array_map(
                static fn (OneTimeSaleItem $oneTimeSaleItem) => $oneTimeSaleItem->jsonSerialize(),
                $this->fields['items'],
            );
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
        if (array_key_exists('activationTime', $this->fields)) {
            $data['activationTime'] = $this->fields['activationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('shipping', $this->fields)) {
            $data['shipping'] = $this->fields['shipping']?->jsonSerialize();
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
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
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

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

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
