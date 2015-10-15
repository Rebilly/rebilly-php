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
use Rebilly\Entities\CustomField;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CustomFieldService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class CustomFieldService extends Service
{
    /**
     * @param string $resourceType
     * @param array|ArrayObject $params
     *
     * @return CustomField[][]|Collection[]|Paginator
     */
    public function paginator($resourceType, $params = [])
    {
        return new Paginator($this->client(), 'custom-fields/{resourceType}',
            ['resourceType' => $resourceType] + (array) $params);
    }

    /**
     * @param string $resourceType
     * @param array|ArrayObject $params
     *
     * @return CustomField[]|Collection
     */
    public function search($resourceType, $params = [])
    {
        return $this->client()->get('custom-fields/{resourceType}', ['resourceType' => $resourceType] + (array)
            $params);
    }

    /**
     * @param string $resourceType
     * @param string $name
     * @param array|JsonSerializable|CustomField $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CustomField
     */
    public function create($resourceType, $name, $data)
    {
        return $this->client()->put($data, 'custom-fields/{resourceType}/{name}', [
            'resourceType' => $resourceType,
            'name' => $name,
        ]);
    }

    /**
     * @param string $resourceType
     * @param string $name
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The custom field does not exist
     *
     * @return CustomField
     */
    public function load($resourceType, $name, $params = [])
    {
        return $this->client()->get('custom-fields/{resourceType}/{name}', [
                'resourceType' => $resourceType,
                'name' => $name
            ] + (array) $params);
    }

    /**
     * @param string $resourceType
     * @param string $name
     * @param array|JsonSerializable|CustomField $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CustomField
     */
    public function update($resourceType, $name, $data)
    {
        return $this->client()->put($data, 'custom-fields/{resourceType}/{name}', [
            'resourceType' => $resourceType,
            'name' => $name,
        ]);
    }

    /**
     * @param string $resourceType
     * @param string $name
     */
    public function delete($resourceType, $name)
    {
        $this->client()->delete('custom-fields/{resourceType}/{name}', [
            'resourceType' => $resourceType,
            'name' => $name,
        ]);
    }
}
