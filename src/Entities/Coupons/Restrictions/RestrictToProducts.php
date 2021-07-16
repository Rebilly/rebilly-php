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

    /**
     * @return string
     */
    protected function restrictionType()
    {
        return self::TYPE_RESTRICT_TO_PRODUCTS;
    }
}
