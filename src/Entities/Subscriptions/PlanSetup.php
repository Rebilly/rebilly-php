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

use Rebilly\Rest\Resource;

final class PlanSetup extends Resource
{
    public function getPrice()
    {
        return $this->getAttribute('price');
    }

    public function setPrice($value)
    {
        return $this->setAttribute('price', $value);
    }
}
