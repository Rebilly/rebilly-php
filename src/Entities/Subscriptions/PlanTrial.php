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

final class PlanTrial extends Resource
{
    public function getPrice()
    {
        return $this->getAttribute('price');
    }

    public function setPrice($value)
    {
        return $this->setAttribute('price', $value);
    }

    public function getPeriod()
    {
        return $this->getAttribute('period');
    }

    public function setPeriod(PlanTrialPeriod $value)
    {
        return $this->setAttribute('period', $value);
    }

    public function createPeriod(array $data)
    {
        return new PlanTrialPeriod($data);
    }
}
