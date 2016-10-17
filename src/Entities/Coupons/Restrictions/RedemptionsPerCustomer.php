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
 * Class RedemptionsPerCustomer.
 */
class RedemptionsPerCustomer extends Restriction
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getAttribute('quantity');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setQuantity($value)
    {
        return $this->setAttribute('quantity', $value);
    }

    /**
     * @return string
     */
    protected function restrictionType()
    {
        return self::TYPE_REDEMPTIONS_PER_CUSTOMER;
    }
}
