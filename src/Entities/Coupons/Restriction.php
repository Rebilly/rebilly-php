<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Coupons;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class Restriction.
 */
abstract class Restriction extends Resource
{
    const MSG_UNSUPPORTED_TYPE = 'Unexpected type. Only %s types support';
    const MSG_REQUIRED_TYPE = 'Type is required';

    const TYPE_DISCOUNTS_PER_REDEMPTION = 'discounts-per-redemption';
    const TYPE_REDEMPTIONS_PER_CUSTOMER = 'redemptions-per-customer';
    const TYPE_RESTRICT_TO_INVOICES = 'restrict-to-invoices';
    const TYPE_RESTRICT_TO_PLANS = 'restrict-to-plans';
    const TYPE_RESTRICT_TO_SUBSCRIPTIONS = 'restrict-to-subscriptions';

    const TYPE_TOTAL_REDEMPTIONS = 'total-redemptions';

    const TYPE_MINIMUM_ORDER_AMOUNT = 'minimum-order-amount';

    protected static $supportedTypes = [
        self::TYPE_DISCOUNTS_PER_REDEMPTION,
        self::TYPE_REDEMPTIONS_PER_CUSTOMER,
        self::TYPE_RESTRICT_TO_INVOICES,
        self::TYPE_RESTRICT_TO_PLANS,
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
