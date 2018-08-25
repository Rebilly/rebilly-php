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

namespace Rebilly\Entities\Subscriptions\Pricing;

trait BracketsTrait
{
    /**
     * @return array|Bracket[]
     */
    public function getBrackets()
    {
        return $this->getAttribute('brackets');
    }

    public function setBrackets(array $value)
    {
        return $this->setAttribute('brackets', $value);
    }

    public function createBrackets(array $values)
    {
        return array_map(
            function (array $value) {
                return new Bracket($value);
            },
            $values
        );
    }
}
