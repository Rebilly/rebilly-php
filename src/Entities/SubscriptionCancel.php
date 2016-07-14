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

    const AT_NEXT_REBILL = 'at-next-rebill';
    const NOW_WITHOUT_REFUND = 'now-without-refund';
    const NOW_WITH_PRORATA_REFUND = 'now-with-prorata-refund';
    const NOW_WITH_PRORATA_CREDIT = 'now-with_prorata-credit';
    const NOW_WITH_FULL_REFUND = 'now-with-full-refund';

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
            self::NOW_WITH_PRORATA_REFUND,
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
