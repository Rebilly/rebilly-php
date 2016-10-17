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

class RestrictToProducts extends Restriction
{
    /**
     * @return array
     */
    public function getProductIds()
    {
        return $this->getAttribute('productIds');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setProductIds($value)
    {
        return $this->setAttribute('productIds', $value);
    }
}
