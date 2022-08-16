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

use JsonSerializable;

abstract class CommonOrderPreview implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
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
        if (array_key_exists('deliveryAddress', $data)) {
            $this->setDeliveryAddress($data['deliveryAddress']);
        }
        if (array_key_exists('couponIds', $data)) {
            $this->setCouponIds($data['couponIds']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('lineItems', $data)) {
            $this->setLineItems($data['lineItems']);
        }
        if (array_key_exists('shippingRates', $data)) {
            $this->setShippingRates($data['shippingRates']);
        }
        if (array_key_exists('taxes', $data)) {
            $this->setTaxes($data['taxes']);
        }
        if (array_key_exists('discounts', $data)) {
            $this->setDiscounts($data['discounts']);
        }
        if (array_key_exists('subtotalAmount', $data)) {
            $this->setSubtotalAmount($data['subtotalAmount']);
        }
        if (array_key_exists('taxAmount', $data)) {
            $this->setTaxAmount($data['taxAmount']);
        }
        if (array_key_exists('shippingAmount', $data)) {
            $this->setShippingAmount($data['shippingAmount']);
        }
        if (array_key_exists('discountsAmount', $data)) {
            $this->setDiscountsAmount($data['discountsAmount']);
        }
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): self
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    /**
     * @return CommonOrderPreviewItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param CommonOrderPreviewItems[] $items
     */
    public function setItems(array $items): self
    {
        $items = array_map(fn ($value) => $value !== null ? ($value instanceof CommonOrderPreviewItems ? $value : CommonOrderPreviewItems::from($value)) : null, $items);

        $this->fields['items'] = $items;

        return $this;
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

    public function getDeliveryAddress(): ?ContactObject
    {
        return $this->fields['deliveryAddress'] ?? null;
    }

    public function setDeliveryAddress(null|ContactObject|array $deliveryAddress): self
    {
        if ($deliveryAddress !== null && !($deliveryAddress instanceof ContactObject)) {
            $deliveryAddress = ContactObject::from($deliveryAddress);
        }

        $this->fields['deliveryAddress'] = $deliveryAddress;

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
    public function setCouponIds(null|array $couponIds): self
    {
        $couponIds = $couponIds !== null ? array_map(fn ($value) => $value ?? null, $couponIds) : null;

        $this->fields['couponIds'] = $couponIds;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    /**
     * @return null|CommonOrderPreviewLineItems[]
     */
    public function getLineItems(): ?array
    {
        return $this->fields['lineItems'] ?? null;
    }

    /**
     * @return null|ShippingOption[]
     */
    public function getShippingRates(): ?array
    {
        return $this->fields['shippingRates'] ?? null;
    }

    /**
     * @return null|CommonOrderPreviewTaxes[]
     */
    public function getTaxes(): ?array
    {
        return $this->fields['taxes'] ?? null;
    }

    /**
     * @return null|CommonOrderPreviewDiscounts[]
     */
    public function getDiscounts(): ?array
    {
        return $this->fields['discounts'] ?? null;
    }

    public function getSubtotalAmount(): ?float
    {
        return $this->fields['subtotalAmount'] ?? null;
    }

    public function getTaxAmount(): ?float
    {
        return $this->fields['taxAmount'] ?? null;
    }

    public function getShippingAmount(): ?float
    {
        return $this->fields['shippingAmount'] ?? null;
    }

    public function getDiscountsAmount(): ?float
    {
        return $this->fields['discountsAmount'] ?? null;
    }

    public function getTotal(): ?float
    {
        return $this->fields['total'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('deliveryAddress', $this->fields)) {
            $data['deliveryAddress'] = $this->fields['deliveryAddress']?->jsonSerialize();
        }
        if (array_key_exists('couponIds', $this->fields)) {
            $data['couponIds'] = $this->fields['couponIds'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('lineItems', $this->fields)) {
            $data['lineItems'] = $this->fields['lineItems'];
        }
        if (array_key_exists('shippingRates', $this->fields)) {
            $data['shippingRates'] = $this->fields['shippingRates'];
        }
        if (array_key_exists('taxes', $this->fields)) {
            $data['taxes'] = $this->fields['taxes'];
        }
        if (array_key_exists('discounts', $this->fields)) {
            $data['discounts'] = $this->fields['discounts'];
        }
        if (array_key_exists('subtotalAmount', $this->fields)) {
            $data['subtotalAmount'] = $this->fields['subtotalAmount'];
        }
        if (array_key_exists('taxAmount', $this->fields)) {
            $data['taxAmount'] = $this->fields['taxAmount'];
        }
        if (array_key_exists('shippingAmount', $this->fields)) {
            $data['shippingAmount'] = $this->fields['shippingAmount'];
        }
        if (array_key_exists('discountsAmount', $this->fields)) {
            $data['discountsAmount'] = $this->fields['discountsAmount'];
        }
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }

        return $data;
    }

    private function setCurrency(null|string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    /**
     * @param null|CommonOrderPreviewLineItems[] $lineItems
     */
    private function setLineItems(null|array $lineItems): self
    {
        $lineItems = $lineItems !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CommonOrderPreviewLineItems ? $value : CommonOrderPreviewLineItems::from($value)) : null, $lineItems) : null;

        $this->fields['lineItems'] = $lineItems;

        return $this;
    }

    /**
     * @param null|ShippingOption[] $shippingRates
     */
    private function setShippingRates(null|array $shippingRates): self
    {
        $shippingRates = $shippingRates !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof ShippingOption ? $value : ShippingOption::from($value)) : null, $shippingRates) : null;

        $this->fields['shippingRates'] = $shippingRates;

        return $this;
    }

    /**
     * @param null|CommonOrderPreviewTaxes[] $taxes
     */
    private function setTaxes(null|array $taxes): self
    {
        $taxes = $taxes !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CommonOrderPreviewTaxes ? $value : CommonOrderPreviewTaxes::from($value)) : null, $taxes) : null;

        $this->fields['taxes'] = $taxes;

        return $this;
    }

    /**
     * @param null|CommonOrderPreviewDiscounts[] $discounts
     */
    private function setDiscounts(null|array $discounts): self
    {
        $discounts = $discounts !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CommonOrderPreviewDiscounts ? $value : CommonOrderPreviewDiscounts::from($value)) : null, $discounts) : null;

        $this->fields['discounts'] = $discounts;

        return $this;
    }

    private function setSubtotalAmount(null|float|string $subtotalAmount): self
    {
        if (is_string($subtotalAmount)) {
            $subtotalAmount = (float) $subtotalAmount;
        }

        $this->fields['subtotalAmount'] = $subtotalAmount;

        return $this;
    }

    private function setTaxAmount(null|float|string $taxAmount): self
    {
        if (is_string($taxAmount)) {
            $taxAmount = (float) $taxAmount;
        }

        $this->fields['taxAmount'] = $taxAmount;

        return $this;
    }

    private function setShippingAmount(null|float|string $shippingAmount): self
    {
        if (is_string($shippingAmount)) {
            $shippingAmount = (float) $shippingAmount;
        }

        $this->fields['shippingAmount'] = $shippingAmount;

        return $this;
    }

    private function setDiscountsAmount(null|float|string $discountsAmount): self
    {
        if (is_string($discountsAmount)) {
            $discountsAmount = (float) $discountsAmount;
        }

        $this->fields['discountsAmount'] = $discountsAmount;

        return $this;
    }

    private function setTotal(null|float|string $total): self
    {
        if (is_string($total)) {
            $total = (float) $total;
        }

        $this->fields['total'] = $total;

        return $this;
    }
}
