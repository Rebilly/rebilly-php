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

use Rebilly\Rest\Entity;

/**
 * Class Layout
 *
 * ```json
 * {
 *   "id",
 *   "name"
 *   "items"
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Layout extends Entity
{
    private $_items = [];

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return string
     */
    public function getItems()
    {
        return $this->getAttribute('items');
    }

    /**
     * @param $planId
     * @param bool|false $starred
     *
     * @return $this
     */
    public function addItem($planId, $starred = false)
    {
        $this->_items[] = [
            'planId' => $planId,
            'starred' => (bool) $starred
        ];

        return $this->setAttribute('items', $this->_items);
    }
}
