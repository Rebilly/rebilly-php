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
use Rebilly\Entities\Tag;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class TagService
 *
 */
final class TagService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Tag[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tags', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Tag[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tags', $params);
    }

    /**
     * @param string $tag
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return Tag
     */
    public function load($tag, $params = [])
    {
        return $this->client()->get('tags/{tag}', ['tag' => $tag] + (array) $params);
    }

    /**
     * @param string $tag
     * @param string $customerId
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return void
     */
    public function tagCustomer($tag, $customerId)
    {
        return $this->client()->post([],'tags/{tag}/customers/{customerId}', ['tag' => $tag, 'customerId' => $customerId]);
    }

    /**
     * @param string $tag
     * @param string $customerId
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return void
     */
    public function untagCustomer($tag, $customerId)
    {
        return $this->client()->delete('tags/{tag}/customers/{customerId}', ['tag' => $tag, 'customerId' => $customerId]);
    }

    /**
     * @param string $tag
     * @param array $customerIds
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return void
     */
    public function tagCustomers($tag, $customerIds)
    {
        return $this->client()->post(['customerIds' => $customerIds],'tags/{tag}/customers', ['tag' => $tag]);
    }

    /**
     * @param array|JsonSerializable|Tag $data
     * @param string $tag
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Tag
     */
    public function create($data, $tag = null)
    {
        if (isset($tag)) {
            return $this->client()->patch($data, 'tags/{tag}', ['tag' => $tag]);
        }

        return $this->client()->post($data, 'tags');
    }

    /**
     * @param string $tag
     * @param array|JsonSerializable|Tag $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Tag
     */
    public function update($tag, $data)
    {
        return $this->client()->patch($data, 'tags/{tag}', ['tag' => $tag]);
    }

    /**
     * @param string $tag
     */
    public function delete($tag)
    {
        $this->client()->delete('tags/{tag}', ['tag' => $tag]);
    }
}
