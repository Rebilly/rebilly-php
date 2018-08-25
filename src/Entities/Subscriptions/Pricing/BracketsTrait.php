<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
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
