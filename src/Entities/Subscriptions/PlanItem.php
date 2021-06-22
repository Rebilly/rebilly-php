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

namespace Rebilly\Entities\Subscriptions;

use Rebilly\Entities\Plan;
use Rebilly\Rest\Resource;

final class PlanItem extends Resource
{
    public function getPlan(): Plan
    {
        return new Plan($this->getAttribute('plan'));
    }

    public function setPlan($plan): self
    {
        return $this->setAttribute('plan', $plan);
    }

    /**
     * @deprecated
     *
     * @return null|string
     */
    public function getPlanId()
    {
        return $this->getAttribute('planId');
    }

    /**
     * @deprecated
     *
     * @param null|string $value
     *
     * @return $this
     */
    public function setPlanId($value)
    {
        return $this->setAttribute('planId', $value);
    }

    /**
     * @return null|int
     */
    public function getQuantity()
    {
        return $this->getAttribute('quantity');
    }

    /**
     * @param null|int $value
     *
     * @return $this
     */
    public function setQuantity($value)
    {
        return $this->setAttribute('quantity', $value);
    }
}
