<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Subscriptions;

use Rebilly\Rest\Resource;

final class PlanTrialPeriod extends Resource
{
    public function getUnit()
    {
        return $this->getAttribute('unit');
    }

    public function setUnit($value)
    {
        return $this->setAttribute('unit', $value);
    }

    public function getLength()
    {
        return $this->getAttribute('length');
    }

    public function setLength($value)
    {
        return $this->setAttribute('length', $value);
    }
}
