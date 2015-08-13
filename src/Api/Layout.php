<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Api;

use ArrayObject;
use Rebilly\Client;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class Layout.
 *
 * ```json
 * {
 *   "id",
 *   "name"
 *   "items"
 * }
 * ```
 *
 * @todo Items
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Layout extends Entity
{
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

    /********************************************************************************
     * Layout API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return Layout[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('layouts', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $layoutId
     * @param array|ArrayObject $params
     *
     * @return Layout
     */
    public static function load($layoutId, $params = [])
    {
        $params['layoutId'] = $layoutId;

        return Client::get('layouts/{layoutId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|Layout $data
     * @param string $layoutId
     *
     * @return Layout
     */
    public static function create($data, $layoutId = null)
    {
        if (isset($layoutId)) {
            return Client::put($data, 'layouts/{layoutId}', ['layoutId' => $layoutId]);
        } else {
            return Client::post($data, 'layouts');
        }
    }

    /**
     * Facade for client command
     *
     * @param string $layoutId
     * @param array|Layout $data
     *
     * @return Layout
     */
    public static function update($layoutId, $data)
    {
        return Client::put($data, 'layouts/{layoutId}', ['layoutId' => $layoutId]);
    }
}
