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
use Rebilly\Entities\ShippingRate;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class ShippingRateService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return ShippingRate[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'shipping-rates', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return ShippingRate[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('shipping-rates', $params);
    }

    /**
     * @param string $shippingRateId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return ShippingRate
     */
    public function load($shippingRateId, $params = [])
    {
        return $this->client()->get('shipping-rates/{shippingRateId}', ['shippingRateId' => $shippingRateId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|ShippingRate $data
     * @param string $shippingRateId
     *
     * @return ShippingRate
     */
    public function create($data, $shippingRateId = null)
    {
        if (isset($shippingRateId)) {
            return $this->client()->put($data, 'shipping-rates/{shippingRateId}', ['shippingRateId' => $shippingRateId]);
        }

        return $this->client()->post($data, 'shipping-rates');
    }

    /**
     * @param string $shippingRateId
     * @param array|JsonSerializable|ShippingRate $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return ShippingRate
     */
    public function update($shippingRateId, $data)
    {
        return $this->client()->put($data, 'shipping-rates/{shippingRateId}', ['shippingRateId' => $shippingRateId]);
    }

    /**
     * @param string $shippingRateId
     */
    public function delete($shippingRateId)
    {
        $this->client()->delete('shipping-rates/{shippingRateId}', ['shippingRateId' => $shippingRateId]);
    }
}
