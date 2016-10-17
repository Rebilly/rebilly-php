<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2016 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
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
