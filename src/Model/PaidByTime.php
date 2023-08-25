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

class PaidByTime implements CouponRestriction, RedemptionRestriction, JsonSerializable
{
    public const TYPE_PAID_BY_TIME = 'paid-by-time';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('time', $data)) {
            $this->setTime($data['time']);
        }
        if (array_key_exists('planIds', $data)) {
            $this->setPlanIds($data['planIds']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('buy', $data)) {
            $this->setBuy($data['buy']);
        }
        if (array_key_exists('countries', $data)) {
            $this->setCountries($data['countries']);
        }
        if (array_key_exists('productIds', $data)) {
            $this->setProductIds($data['productIds']);
        }
        if (array_key_exists('subscriptionIds', $data)) {
            $this->setSubscriptionIds($data['subscriptionIds']);
        }
        if (array_key_exists('get', $data)) {
            $this->setGet($data['get']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('minimumQuantity', $data)) {
            $this->setMinimumQuantity($data['minimumQuantity']);
        }
        if (array_key_exists('invoiceIds', $data)) {
            $this->setInvoiceIds($data['invoiceIds']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getTime(): DateTimeImmutable
    {
        return $this->fields['time'];
    }

    public function setTime(DateTimeImmutable|string $time): static
    {
        if (!($time instanceof DateTimeImmutable)) {
            $time = new DateTimeImmutable($time);
        }

        $this->fields['time'] = $time;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getPlanIds(): array
    {
        return $this->fields['planIds'];
    }

    /**
     * @param string[] $planIds
     */
    public function setPlanIds(array $planIds): static
    {
        $planIds = array_map(
            fn ($value) => $value,
            $planIds,
        );

        $this->fields['planIds'] = $planIds;

        return $this;
    }

    public function getAmount(): int
    {
        return $this->fields['amount'];
    }

    public function setAmount(int $amount): static
    {
        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->fields['quantity'];
    }

    public function setQuantity(int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    /**
     * @return RestrictToBxgyBuy[]
     */
    public function getBuy(): array
    {
        return $this->fields['buy'];
    }

    /**
     * @param array[]|RestrictToBxgyBuy[] $buy
     */
    public function setBuy(array $buy): static
    {
        $buy = array_map(
            fn ($value) => $value !== null ? ($value instanceof RestrictToBxgyBuy ? $value : RestrictToBxgyBuy::from($value)) : null,
            $buy,
        );

        $this->fields['buy'] = $buy;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getCountries(): array
    {
        return $this->fields['countries'];
    }

    /**
     * @param string[] $countries
     */
    public function setCountries(array $countries): static
    {
        $countries = array_map(
            fn ($value) => $value,
            $countries,
        );

        $this->fields['countries'] = $countries;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getProductIds(): array
    {
        return $this->fields['productIds'];
    }

    /**
     * @param string[] $productIds
     */
    public function setProductIds(array $productIds): static
    {
        $productIds = array_map(
            fn ($value) => $value,
            $productIds,
        );

        $this->fields['productIds'] = $productIds;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getSubscriptionIds(): array
    {
        return $this->fields['subscriptionIds'];
    }

    /**
     * @param string[] $subscriptionIds
     */
    public function setSubscriptionIds(array $subscriptionIds): static
    {
        $subscriptionIds = array_map(
            fn ($value) => $value,
            $subscriptionIds,
        );

        $this->fields['subscriptionIds'] = $subscriptionIds;

        return $this;
    }

    /**
     * @return RestrictToBxgyGet[]
     */
    public function getGet(): array
    {
        return $this->fields['get'];
    }

    /**
     * @param array[]|RestrictToBxgyGet[] $get
     */
    public function setGet(array $get): static
    {
        $get = array_map(
            fn ($value) => $value !== null ? ($value instanceof RestrictToBxgyGet ? $value : RestrictToBxgyGet::from($value)) : null,
            $get,
        );

        $this->fields['get'] = $get;

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

    public function getMinimumQuantity(): ?int
    {
        return $this->fields['minimumQuantity'] ?? null;
    }

    public function setMinimumQuantity(null|int $minimumQuantity): static
    {
        $this->fields['minimumQuantity'] = $minimumQuantity;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getInvoiceIds(): array
    {
        return $this->fields['invoiceIds'];
    }

    /**
     * @param string[] $invoiceIds
     */
    public function setInvoiceIds(array $invoiceIds): static
    {
        $invoiceIds = array_map(
            fn ($value) => $value,
            $invoiceIds,
        );

        $this->fields['invoiceIds'] = $invoiceIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('time', $this->fields)) {
            $data['time'] = $this->fields['time']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('planIds', $this->fields)) {
            $data['planIds'] = $this->fields['planIds'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('buy', $this->fields)) {
            $data['buy'] = $this->fields['buy'];
        }
        if (array_key_exists('countries', $this->fields)) {
            $data['countries'] = $this->fields['countries'];
        }
        if (array_key_exists('productIds', $this->fields)) {
            $data['productIds'] = $this->fields['productIds'];
        }
        if (array_key_exists('subscriptionIds', $this->fields)) {
            $data['subscriptionIds'] = $this->fields['subscriptionIds'];
        }
        if (array_key_exists('get', $this->fields)) {
            $data['get'] = $this->fields['get'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('minimumQuantity', $this->fields)) {
            $data['minimumQuantity'] = $this->fields['minimumQuantity'];
        }
        if (array_key_exists('invoiceIds', $this->fields)) {
            $data['invoiceIds'] = $this->fields['invoiceIds'];
        }

        return $data;
    }
}
