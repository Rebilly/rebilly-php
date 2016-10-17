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
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class Redemption extends Entity
{
    /**
     * @var Restriction[]
     */
    private $additionalRestrictions = [];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        if (isset($data['additionalRestrictions']) && is_array($data['additionalRestrictions'])) {
            foreach ($data['additionalRestrictions'] as $restriction) {
                $this->additionalRestrictions[] = Restriction::createFromData($restriction);
            }
        }

        parent::__construct($data);
    }

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
        return $this->additionalRestrictions;
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
        $value = [];

        foreach ($restrictions as $restriction) {
            if (!$restriction instanceof Restriction) {
                throw new DomainException('Wrong restrictions object');
            }

            $value[] = $restriction->jsonSerialize();
        }

        $this->additionalRestrictions = $restrictions;

        return $this->setAttribute('additionalRestrictions', $value);
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
