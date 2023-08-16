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

class RestrictToCountries extends CouponRestriction
{
    public const TYPE_DISCOUNTS_PER_REDEMPTION = 'discounts-per-redemption';

    public const TYPE_MINIMUM_ORDER_AMOUNT = 'minimum-order-amount';

    public const TYPE_RESTRICT_TO_INVOICES = 'restrict-to-invoices';

    public const TYPE_RESTRICT_TO_PLANS = 'restrict-to-plans';

    public const TYPE_RESTRICT_TO_SUBSCRIPTIONS = 'restrict-to-subscriptions';

    public const TYPE_RESTRICT_TO_PRODUCTS = 'restrict-to-products';

    public const TYPE_PAID_BY_TIME = 'paid-by-time';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'restrict-to-countries',
        ] + $data);

        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('countries', $data)) {
            $this->setCountries($data['countries']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

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
        $countries = array_map(fn ($value) => $value ?? null, $countries);

        $this->fields['countries'] = $countries;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('countries', $this->fields)) {
            $data['countries'] = $this->fields['countries'];
        }

        return parent::jsonSerialize() + $data;
    }
}
