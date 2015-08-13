<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Api;

/**
 * Class SubscriptionSwitch.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class SubscriptionSwitch extends SubscriptionCancel
{
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
