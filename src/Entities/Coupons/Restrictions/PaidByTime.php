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

declare(strict_types=1);

namespace Rebilly\Entities\Coupons\Restrictions;

use Rebilly\Entities\Coupons\Restriction;

class PaidByTime extends Restriction
{
    /**
     * @return string
     */
    public function getTime()
    {
        return $this->getAttribute('time');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTime($value)
    {
        return $this->setAttribute('time', $value);
    }

    /**
     * @return string
     */
    protected function restrictionType()
    {
        return self::TYPE_PAID_BY_TIME;
    }
}
