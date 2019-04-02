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
use Rebilly\Entities\ValuesList;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class ValuesListService
 */
final class ValuesListService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return ValuesList[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'lists', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return ValuesList[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('lists', $params);
    }

    /**
     * @param string $listId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return ValuesList
     */
    public function load($listId, $params = [])
    {
        return $this->client()->get('lists/{listId}', ['listId' => $listId] + (array) $params);
    }

    /**
     * @param string $listId
     * @param int $version
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return ValuesList
     */
    public function loadVersion($listId, $version, $params = [])
    {
        return $this->client()->get('lists/{listId}/{version}', ['listId' => $listId, 'version' => $version] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|ValuesList $data
     * @param string $listId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return ValuesList
     */
    public function create($data, $listId = null)
    {
        if (isset($listId)) {
            return $this->client()->put($data, 'lists/{listId}', ['listId' => $listId]);
        }

        return $this->client()->post($data, 'lists');
    }

    /**
     * @param string $listId
     * @param array|JsonSerializable|ValuesList $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return ValuesList
     */
    public function update($listId, $data)
    {
        return $this->client()->put($data, 'lists/{listId}', ['listId' => $listId]);
    }

    /**
     * @param string $listId
     */
    public function delete($listId)
    {
        $this->client()->delete('lists/{listId}', ['listId' => $listId]);
    }
}
