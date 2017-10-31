<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Coupons;

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Redemption
 *
 * ```json
 * {
 *   "id"
 *   "redemptionCode"
 *   "customerId"
 *   "additionalRestrictions"
 *   "redeemedTime"
 *   "canceledTime"
 * }
 * ```
 */
final class Redemption extends Entity
{
    /**
     * @return string
     */
    public function getRedemptionCode()
    {
        return $this->getAttribute('redemptionCode');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRedemptionCode($value)
    {
        return $this->setAttribute('redemptionCode', $value);
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
    }

    /**
     * @return array
     */
    public function getAdditionalRestrictions()
    {
        return $this->getAttribute('additionalRestrictions');
    }

    /**
     * @param array $restrictions
     *
     * @throws DomainException
     *
     * @return $this
     */
    public function setAdditionalRestrictions(array $restrictions)
    {
        return $this->setAttribute('additionalRestrictions', $restrictions);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function createAdditionalRestrictions(array $data)
    {
        return array_map(
            function (array $values) {
                return Restriction::createFromData($values);
            },
            $data
        );
    }

    /**
     * @return string
     */
    public function getRedeemedTime()
    {
        return $this->getAttribute('redeemedTime');
    }

    /**
     * @return string
     */
    public function getCanceledTime()
    {
        return $this->getAttribute('canceledTime');
    }
}
