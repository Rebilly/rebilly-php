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

namespace Rebilly\Entities\Coupons\Restrictions;

use Rebilly\Entities\Coupons\Restriction;

/**
 * Class RestrictToSubscriptions.
 */
class RestrictToSubscriptions extends Restriction
{
    /**
     * @return array
     */
    public function getSubscriptionIds()
    {
        return $this->getAttribute('subscriptionIds');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setSubscriptionIds($value)
    {
        return $this->setAttribute('subscriptionIds', $value);
    }

    /**
     * @return string
     */
    protected function restrictionType()
    {
        return self::TYPE_RESTRICT_TO_SUBSCRIPTIONS;
    }
}
