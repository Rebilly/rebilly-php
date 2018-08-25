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
 * Class RestrictToPlans.
 */
class RestrictToPlans extends Restriction
{
    /**
     * @return array
     */
    public function getPlanIds()
    {
        return $this->getAttribute('planIds');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setPlanIds($value)
    {
        return $this->setAttribute('planIds', $value);
    }

    /**
     * @return string
     */
    protected function restrictionType()
    {
        return self::TYPE_RESTRICT_TO_PLANS;
    }
}
