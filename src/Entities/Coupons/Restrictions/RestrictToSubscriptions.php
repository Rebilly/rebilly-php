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
}
