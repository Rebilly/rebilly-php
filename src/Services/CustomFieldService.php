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
use Rebilly\Entities\CustomField;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CustomFieldService
 *
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
        return new Paginator(
            $this->client(),
            'custom-fields/{resourceType}',
            ['resourceType' => $resourceType] + (array) $params
        );
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
     * @throws DataValidationException if input data is not valid
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
     * @throws NotFoundException if resource does not exist
     *
     * @return CustomField
     */
    public function load($resourceType, $name, $params = [])
    {
        return $this->client()->get('custom-fields/{resourceType}/{name}', [
                'resourceType' => $resourceType,
                'name' => $name,
            ] + (array) $params);
    }

    /**
     * @param string $resourceType
     * @param string $name
     * @param array|JsonSerializable|CustomField $data
     *
     * @throws DataValidationException if input data is not valid
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
}
