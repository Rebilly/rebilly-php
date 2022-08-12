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

use InvalidArgumentException;
use JsonSerializable;

abstract class RedemptionRestriction implements JsonSerializable
{
    public const TYPE_DISCOUNTS_PER_REDEMPTION = 'discounts-per-redemption';

    public const TYPE_MINIMUM_ORDER_AMOUNT = 'minimum-order-amount';

    public const TYPE_RESTRICT_TO_INVOICES = 'restrict-to-invoices';

    public const TYPE_RESTRICT_TO_PLANS = 'restrict-to-plans';

    public const TYPE_RESTRICT_TO_SUBSCRIPTIONS = 'restrict-to-subscriptions';

    public const TYPE_RESTRICT_TO_PRODUCTS = 'restrict-to-products';

    public const TYPE_PAID_BY_TIME = 'paid-by-time';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['type']) {
            case 'discounts-per-redemption':
                return new DiscountsPerRedemption($data);
            case 'minimum-order-amount':
                return new MinimumOrderAmount($data);
            case 'paid-by-time':
                return new PaidByTime($data);
            case 'restrict-to-invoices':
                return new RestrictToInvoices($data);
            case 'restrict-to-plans':
                return new RestrictToPlans($data);
            case 'restrict-to-products':
                return new RestrictToProducts($data);
            case 'restrict-to-subscriptions':
                return new RestrictToSubscriptions($data);
        }

        throw new InvalidArgumentException("Unsupported type value: '{$data['type']}'");
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }

        return $data;
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    private function setType(string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }
}
