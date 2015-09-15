<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Resource;

/**
 * Class LayoutItem
 *
 * ```json
 * {
 *   "planId",
 *   "starred"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
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
}
