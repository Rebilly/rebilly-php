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

namespace Rebilly\Entities\Coupons;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class Restriction.
 */
abstract class Restriction extends Resource
{
    public const MSG_UNSUPPORTED_TYPE = 'Unexpected type. Only %s types support';

    public const MSG_REQUIRED_TYPE = 'Type is required';

    public const TYPE_DISCOUNTS_PER_REDEMPTION = 'discounts-per-redemption';

    public const TYPE_REDEMPTIONS_PER_CUSTOMER = 'redemptions-per-customer';

    public const TYPE_RESTRICT_TO_INVOICES = 'restrict-to-invoices';

    public const TYPE_RESTRICT_TO_PLANS = 'restrict-to-plans';

    public const TYPE_RESTRICT_TO_PRODUCTS = 'restrict-to-products';

    public const TYPE_RESTRICT_TO_SUBSCRIPTIONS = 'restrict-to-subscriptions';

    public const TYPE_TOTAL_REDEMPTIONS = 'total-redemptions';

    public const TYPE_MINIMUM_ORDER_AMOUNT = 'minimum-order-amount';

    protected static $supportedTypes = [
        self::TYPE_DISCOUNTS_PER_REDEMPTION,
        self::TYPE_REDEMPTIONS_PER_CUSTOMER,
        self::TYPE_RESTRICT_TO_INVOICES,
        self::TYPE_RESTRICT_TO_PLANS,
        self::TYPE_RESTRICT_TO_PRODUCTS,
        self::TYPE_RESTRICT_TO_SUBSCRIPTIONS,
        self::TYPE_TOTAL_REDEMPTIONS,
        self::TYPE_MINIMUM_ORDER_AMOUNT,
    ];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct(['type' => $this->restrictionType()] + $data);
    }

    /**
     * @param array $data
     *
     * @return Restriction
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['type'])) {
            throw new DomainException(self::MSG_REQUIRED_TYPE);
        }

        switch ($data['type']) {
            case self::TYPE_DISCOUNTS_PER_REDEMPTION:
                $restriction = new Restrictions\DiscountsPerRedemption($data);

                break;
            case self::TYPE_REDEMPTIONS_PER_CUSTOMER:
                $restriction = new Restrictions\RedemptionsPerCustomer($data);

                break;
            case self::TYPE_RESTRICT_TO_INVOICES:
                $restriction = new Restrictions\RestrictToInvoices($data);

                break;
            case self::TYPE_RESTRICT_TO_PLANS:
                $restriction = new Restrictions\RestrictToPlans($data);

                break;
            case self::TYPE_RESTRICT_TO_PRODUCTS:
                $restriction = new Restrictions\RestrictToProducts($data);

                break;
            case self::TYPE_RESTRICT_TO_SUBSCRIPTIONS:
                $restriction = new Restrictions\RestrictToSubscriptions($data);

                break;
            case self::TYPE_TOTAL_REDEMPTIONS:
                $restriction = new Restrictions\TotalRedemptions($data);

                break;
            case self::TYPE_MINIMUM_ORDER_AMOUNT:
                $restriction = new Restrictions\MinimumOrderAmount($data);

                break;
            default:
                throw new DomainException(
                    sprintf(self::MSG_UNSUPPORTED_TYPE, implode(',', self::$supportedTypes))
                );
        }

        return $restriction;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return string
     */
    abstract protected function restrictionType();
}
