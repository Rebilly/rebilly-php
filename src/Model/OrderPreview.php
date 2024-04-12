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

class OrderPreview implements JsonSerializable
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
        if (array_key_exists('shipping', $data)) {
            $this->setShipping($data['shipping']);
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
     * @return OrderPreviewItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|OrderPreviewItems[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof OrderPreviewItems ? $value : OrderPreviewItems::from($value),
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

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    /**
     * @return null|OrderPreviewLineItems[]
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
     * @return null|OrderPreviewTaxes[]
     */
    public function getTaxes(): ?array
    {
        return $this->fields['taxes'] ?? null;
    }

    /**
     * @return null|OrderPreviewDiscounts[]
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = array_map(
                static fn (OrderPreviewItems $orderPreviewItems) => $orderPreviewItems->jsonSerialize(),
                $this->fields['items'],
            );
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
            $data['lineItems'] = $this->fields['lineItems'] !== null
                ? array_map(
                    static fn (OrderPreviewLineItems $orderPreviewLineItems) => $orderPreviewLineItems->jsonSerialize(),
                    $this->fields['lineItems'],
                )
                : null;
        }
        if (array_key_exists('shippingRates', $this->fields)) {
            $data['shippingRates'] = $this->fields['shippingRates'] !== null
                ? array_map(
                    static fn (ShippingOption $shippingOption) => $shippingOption->jsonSerialize(),
                    $this->fields['shippingRates'],
                )
                : null;
        }
        if (array_key_exists('taxes', $this->fields)) {
            $data['taxes'] = $this->fields['taxes'] !== null
                ? array_map(
                    static fn (OrderPreviewTaxes $orderPreviewTaxes) => $orderPreviewTaxes->jsonSerialize(),
                    $this->fields['taxes'],
                )
                : null;
        }
        if (array_key_exists('discounts', $this->fields)) {
            $data['discounts'] = $this->fields['discounts'] !== null
                ? array_map(
                    static fn (OrderPreviewDiscounts $orderPreviewDiscounts) => $orderPreviewDiscounts->jsonSerialize(),
                    $this->fields['discounts'],
                )
                : null;
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
        if (array_key_exists('shipping', $this->fields)) {
            $data['shipping'] = $this->fields['shipping']?->jsonSerialize();
        }

        return $data;
    }

    private function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    /**
     * @param null|array[]|OrderPreviewLineItems[] $lineItems
     */
    private function setLineItems(null|array $lineItems): static
    {
        $lineItems = $lineItems !== null ? array_map(
            fn ($value) => $value instanceof OrderPreviewLineItems ? $value : OrderPreviewLineItems::from($value),
            $lineItems,
        ) : null;

        $this->fields['lineItems'] = $lineItems;

        return $this;
    }

    /**
     * @param null|array[]|ShippingOption[] $shippingRates
     */
    private function setShippingRates(null|array $shippingRates): static
    {
        $shippingRates = $shippingRates !== null ? array_map(
            fn ($value) => $value instanceof ShippingOption ? $value : ShippingOption::from($value),
            $shippingRates,
        ) : null;

        $this->fields['shippingRates'] = $shippingRates;

        return $this;
    }

    /**
     * @param null|array[]|OrderPreviewTaxes[] $taxes
     */
    private function setTaxes(null|array $taxes): static
    {
        $taxes = $taxes !== null ? array_map(
            fn ($value) => $value instanceof OrderPreviewTaxes ? $value : OrderPreviewTaxes::from($value),
            $taxes,
        ) : null;

        $this->fields['taxes'] = $taxes;

        return $this;
    }

    /**
     * @param null|array[]|OrderPreviewDiscounts[] $discounts
     */
    private function setDiscounts(null|array $discounts): static
    {
        $discounts = $discounts !== null ? array_map(
            fn ($value) => $value instanceof OrderPreviewDiscounts ? $value : OrderPreviewDiscounts::from($value),
            $discounts,
        ) : null;

        $this->fields['discounts'] = $discounts;

        return $this;
    }

    private function setSubtotalAmount(null|float|string $subtotalAmount): static
    {
        if (is_string($subtotalAmount)) {
            $subtotalAmount = (float) $subtotalAmount;
        }

        $this->fields['subtotalAmount'] = $subtotalAmount;

        return $this;
    }

    private function setTaxAmount(null|float|string $taxAmount): static
    {
        if (is_string($taxAmount)) {
            $taxAmount = (float) $taxAmount;
        }

        $this->fields['taxAmount'] = $taxAmount;

        return $this;
    }

    private function setShippingAmount(null|float|string $shippingAmount): static
    {
        if (is_string($shippingAmount)) {
            $shippingAmount = (float) $shippingAmount;
        }

        $this->fields['shippingAmount'] = $shippingAmount;

        return $this;
    }

    private function setDiscountsAmount(null|float|string $discountsAmount): static
    {
        if (is_string($discountsAmount)) {
            $discountsAmount = (float) $discountsAmount;
        }

        $this->fields['discountsAmount'] = $discountsAmount;

        return $this;
    }

    private function setTotal(null|float|string $total): static
    {
        if (is_string($total)) {
            $total = (float) $total;
        }

        $this->fields['total'] = $total;

        return $this;
    }
}
