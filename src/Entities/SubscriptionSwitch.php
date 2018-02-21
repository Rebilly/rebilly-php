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

/**
 * Class SubscriptionSwitch
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 * @deprecated
 */
final class SubscriptionSwitch extends SubscriptionCancel
{
    const AT_NEXT_RENEWAL = 'at-next-renewal';
    const NOW = 'now';
    const NOW_WITH_PRORATA_CREDIT = 'now-with-prorata-credit';

    /**
     * @return array
     */
    public static function policies()
    {
        return [
            self::AT_NEXT_RENEWAL,
            self::NOW,
            self::NOW_WITH_PRORATA_CREDIT,
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

    /**
     * @return string
     */
    public function getPlanId()
    {
        return $this->getAttribute('plan');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionSwitch
     */
    public function setPlanId($value)
    {
        return $this->setAttribute('plan', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('website');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionSwitch
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('website', $value);
    }

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
     * @return SubscriptionSwitch
     */
    public function setQuantity($value)
    {
        return $this->setAttribute('quantity', $value);
    }
}
