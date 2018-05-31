<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Resource;

/**
 * Class CustomerLifetimeRevenue.
 */
class CustomerLifetimeRevenue extends Resource
{
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @return float
     */
    public function getAmountUsd()
    {
        return $this->getAttribute('amountUsd');
    }
}
