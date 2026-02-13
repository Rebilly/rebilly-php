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

class PayoutRequestV2 implements JsonSerializable
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_READY = 'ready';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_IN_PROGRESS = 'in-progress';

    public const STATUS_INSTRUMENT_SELECTED = 'instrument-selected';

    public const STATUS_PARTIALLY_FULFILLED = 'partially-fulfilled';

    public const STATUS_FULFILLED = 'fulfilled';

    public const STATUS_CANCELED = 'canceled';

    public const STATUS_CUSTOMER_REVERSED = 'customer-reversed';

    public const STATUS_SYSTEM_REVERSED = 'system-reversed';

    public const STATUS_ADMIN_REVERSED = 'admin-reversed';

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
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('availableAmount', $data)) {
            $this->setAvailableAmount($data['availableAmount']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('blocked', $data)) {
            $this->setBlocked($data['blocked']);
        }
        if (array_key_exists('batchId', $data)) {
            $this->setBatchId($data['batchId']);
        }
        if (array_key_exists('selectPaymentInstrumentUrl', $data)) {
            $this->setSelectPaymentInstrumentUrl($data['selectPaymentInstrumentUrl']);
        }
        if (array_key_exists('allocations', $data)) {
            $this->setAllocations($data['allocations']);
        }
        if (array_key_exists('selectedPaymentInstrumentRedirectUrl', $data)) {
            $this->setSelectedPaymentInstrumentRedirectUrl($data['selectedPaymentInstrumentRedirectUrl']);
        }
        if (array_key_exists('cancellationReason', $data)) {
            $this->setCancellationReason($data['cancellationReason']);
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
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

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

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

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

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

    public function getAvailableAmount(): ?float
    {
        return $this->fields['availableAmount'] ?? null;
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

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getBlocked(): ?bool
    {
        return $this->fields['blocked'] ?? null;
    }

    public function setBlocked(null|bool $blocked): static
    {
        $this->fields['blocked'] = $blocked;

        return $this;
    }

    public function getBatchId(): ?string
    {
        return $this->fields['batchId'] ?? null;
    }

    public function getSelectPaymentInstrumentUrl(): ?string
    {
        return $this->fields['selectPaymentInstrumentUrl'] ?? null;
    }

    /**
     * @return null|PayoutRequestAllocation[]
     */
    public function getAllocations(): ?array
    {
        return $this->fields['allocations'] ?? null;
    }

    public function getSelectedPaymentInstrumentRedirectUrl(): ?string
    {
        return $this->fields['selectedPaymentInstrumentRedirectUrl'] ?? null;
    }

    public function setSelectedPaymentInstrumentRedirectUrl(null|string $selectedPaymentInstrumentRedirectUrl): static
    {
        $this->fields['selectedPaymentInstrumentRedirectUrl'] = $selectedPaymentInstrumentRedirectUrl;

        return $this;
    }

    public function getCancellationReason(): ?PayoutRequestCancellation
    {
        return $this->fields['cancellationReason'] ?? null;
    }

    public function setCancellationReason(null|PayoutRequestCancellation|array $cancellationReason): static
    {
        if ($cancellationReason !== null && !($cancellationReason instanceof PayoutRequestCancellation)) {
            $cancellationReason = PayoutRequestCancellation::from($cancellationReason);
        }

        $this->fields['cancellationReason'] = $cancellationReason;

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
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('availableAmount', $this->fields)) {
            $data['availableAmount'] = $this->fields['availableAmount'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('blocked', $this->fields)) {
            $data['blocked'] = $this->fields['blocked'];
        }
        if (array_key_exists('batchId', $this->fields)) {
            $data['batchId'] = $this->fields['batchId'];
        }
        if (array_key_exists('selectPaymentInstrumentUrl', $this->fields)) {
            $data['selectPaymentInstrumentUrl'] = $this->fields['selectPaymentInstrumentUrl'];
        }
        if (array_key_exists('allocations', $this->fields)) {
            $data['allocations'] = $this->fields['allocations'] !== null
                ? array_map(
                    static fn (PayoutRequestAllocation $payoutRequestAllocation) => $payoutRequestAllocation->jsonSerialize(),
                    $this->fields['allocations'],
                )
                : null;
        }
        if (array_key_exists('selectedPaymentInstrumentRedirectUrl', $this->fields)) {
            $data['selectedPaymentInstrumentRedirectUrl'] = $this->fields['selectedPaymentInstrumentRedirectUrl'];
        }
        if (array_key_exists('cancellationReason', $this->fields)) {
            $data['cancellationReason'] = $this->fields['cancellationReason']?->jsonSerialize();
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

    private function setAvailableAmount(null|float|string $availableAmount): static
    {
        if (is_string($availableAmount)) {
            $availableAmount = (float) $availableAmount;
        }

        $this->fields['availableAmount'] = $availableAmount;

        return $this;
    }

    private function setBatchId(null|string $batchId): static
    {
        $this->fields['batchId'] = $batchId;

        return $this;
    }

    private function setSelectPaymentInstrumentUrl(null|string $selectPaymentInstrumentUrl): static
    {
        $this->fields['selectPaymentInstrumentUrl'] = $selectPaymentInstrumentUrl;

        return $this;
    }

    /**
     * @param null|array[]|PayoutRequestAllocation[] $allocations
     */
    private function setAllocations(null|array $allocations): static
    {
        $allocations = $allocations !== null ? array_map(
            fn ($value) => $value instanceof PayoutRequestAllocation ? $value : PayoutRequestAllocation::from($value),
            $allocations,
        ) : null;

        $this->fields['allocations'] = $allocations;

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
