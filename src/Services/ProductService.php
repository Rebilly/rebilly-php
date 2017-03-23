<?php

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\Product;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class ProductService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Product[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'products', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Product[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('products', $params);
    }

    /**
     * @param string $productId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Product
     */
    public function load($productId, $params = [])
    {
        return $this->client()->get('products/{productId}', ['productId' => $productId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Product $data
     * @param null $productId
     *
     * @return Product The input data does not valid
     */
    public function create($data, $productId = null)
    {
        if (isset($productId)) {
            return $this->client()->put($data, 'products/{productId}', ['productId' => $productId]);
        }

        return $this->client()->post($data, 'products');
    }

    /**
     * @param string $productId
     * @param array|JsonSerializable|Product $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Product
     */
    public function update($productId, $data)
    {
        return $this->client()->put($data, 'products/{productId}', ['productId' => $productId]);
    }

    /**
     * @param string $productId
     */
    public function delete($productId)
    {
        $this->client()->delete('products/{productId}', ['productId' => $productId]);
    }
}
