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

use DomainException;
use Rebilly\Resource\Resource;

/**
 * Class SubscriptionCancel.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class SubscriptionCancel extends Resource
{
    const AT_NEXT_REBILL = 'AT_NEXT_REBILL';
    const NOW_WITHOUT_REFUND = 'NOW_WITHOUT_REFUND';
    const NOW_WITH_PRORATA_REFUND = 'NOW_WITH_PRORATA_REFUND';
    const NOW_WITH_FULL_REFUND = 'NOW_WITH_FULL_REFUND';

    public static function policies()
    {
        return [
            "AT_NEXT_REBILL",
            "NOW_WITHOUT_REFUND",
            "NOW_WITH_PRORATA_REFUND",
            "NOW_WITH_FULL_REFUND",
        ];
    }

    /**
     * @return string
     */
    public function getPolicy()
    {
        return $this->getAttribute('policy');
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return SubscriptionCancel
     */
    public function setPolicy($value)
    {
        if (!in_array($value, self::policies())) {
            throw new DomainException('Only "' . implode(', ', self::policies()) . ' policy supports');
        }

        return $this->setAttribute('policy', $value);
    }
}
