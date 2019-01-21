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

namespace Rebilly\Entities;

use Rebilly\Rest\Resource;

/**
 * Class LayoutItem.
 */
final class LayoutItem extends Resource
{
    /**
     * @return string
     */
    public function getPlanId()
    {
        return $this->getAttribute('planId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPlanId($value)
    {
        return $this->setAttribute('planId', $value);
    }

    /**
     * @return bool
     */
    public function getStarred()
    {
        return $this->getAttribute('starred') ?: false;
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setStarred($value)
    {
        return $this->setAttribute('starred', (bool) $value);
    }

    /**
     * @todo Get Plan from embedded data
     * @return Plan|null
     */
    public function getPlan()
    {
        $values = $this->getAttribute('plan');

        if ($values !== null) {
            return new Plan($values);
        }

        return null;
    }
}
