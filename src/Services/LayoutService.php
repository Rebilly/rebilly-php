<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\Layout;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class LayoutService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class LayoutService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Layout[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('layouts', $params);
    }

    /**
     * @param string $layoutId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Layout
     */
    public function load($layoutId, $params = [])
    {
        return $this->client()->get('layouts/{layoutId}', ['layoutId' => $layoutId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Layout $data
     * @param string $layoutId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Layout
     */
    public function create($data, $layoutId = null)
    {
        if (isset($layoutId)) {
            return $this->client()->put($data, 'layouts/{layoutId}', ['layoutId' => $layoutId]);
        } else {
            return $this->client()->post($data, 'layouts');
        }
    }

    /**
     * @param string $layoutId
     * @param array|JsonSerializable|Layout $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Layout
     */
    public function update($layoutId, $data)
    {
        return $this->client()->put($data, 'layouts/{layoutId}', ['layoutId' => $layoutId]);
    }
}
