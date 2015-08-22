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
use Rebilly\Rest\Resource;

/**
 * Class SubscriptionCancel
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class SubscriptionCancel extends Resource
{
    const MSG_UNEXPECTED_POLICY = 'Unexpected type. Only %s types support';

    const AT_NEXT_REBILL = 'AT_NEXT_REBILL';
    const NOW_WITHOUT_REFUND = 'NOW_WITHOUT_REFUND';
    const NOW_WITH_PRORATA_REFUND = 'NOW_WITH_PRORATA_REFUND';
    const NOW_WITH_FULL_REFUND = 'NOW_WITH_FULL_REFUND';

    /**
     * @return array
     */
    public static function policies()
    {
        return [
            self::AT_NEXT_REBILL,
            self::NOW_WITHOUT_REFUND,
            self::NOW_WITH_PRORATA_REFUND,
            self::NOW_WITH_FULL_REFUND,
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
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_POLICY, implode(', ', self::policies())));
        }

        return $this->setAttribute('policy', $value);
    }
}
