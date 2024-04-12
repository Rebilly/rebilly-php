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

class ReadyToPayItems implements PostReadyToPay
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    /**
     * @return ReadyToPayItemsItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|ReadyToPayItemsItems[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof ReadyToPayItemsItems ? $value : ReadyToPayItemsItems::from($value),
            $items,
        );

        $this->fields['items'] = $items;

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

    public function getRiskMetadata(): RiskMetadata
    {
        return $this->fields['riskMetadata'];
    }

    public function setRiskMetadata(RiskMetadata|array $riskMetadata): static
    {
        if (!($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = array_map(
                static fn (ReadyToPayItemsItems $readyToPayItemsItems) => $readyToPayItemsItems->jsonSerialize(),
                $this->fields['items'],
            );
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']->jsonSerialize();
        }

        return $data;
    }
}
