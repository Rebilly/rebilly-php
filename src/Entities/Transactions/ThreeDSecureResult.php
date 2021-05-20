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

namespace Rebilly\Entities\Transactions;

use Rebilly\Rest\Entity;

/**
 * Class ThreeDSecureResult.
 */
final class ThreeDSecureResult extends Entity
{
    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->getAttribute('version');
    }

    /**
     * @return string
     */
    public function getEnrolled()
    {
        return $this->getAttribute('enrolled');
    }

    /**
     * @return string
     */
    public function getAuthenticated()
    {
        return $this->getAttribute('authenticated');
    }

    /**
     * @return string
     */
    public function getLiability()
    {
        return $this->getAttribute('liability');
    }

    /**
     * @return string
     */
    public function getFlow()
    {
        return $this->getAttribute('flow');
    }

    /**
     * @return bool
     */
    public function getIsDowngraded()
    {
        return $this->getAttribute('isDowngraded');
    }
}
