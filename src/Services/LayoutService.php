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

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\Layout;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class LayoutService
 *
 */
final class LayoutService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Layout[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'layouts', $params);
    }

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
     * @throws NotFoundException The resource data does not exist
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
        }

        return $this->client()->post($data, 'layouts');
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

    /**
     * @param string $layoutId
     */
    public function delete($layoutId)
    {
        $this->client()->delete('layouts/{layoutId}', ['layoutId' => $layoutId]);
    }
}
