<?php

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\Shipping\ShippingZone;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class ShippingZoneService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return ShippingZone[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'shipping-zones', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return ShippingZone[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('shipping-zones', $params);
    }

    /**
     * @param string $shippingZoneId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return ShippingZone
     */
    public function load($shippingZoneId, $params = [])
    {
        return $this->client()->get('shipping-zones/{shippingZoneId}', ['shippingZoneId' => $shippingZoneId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|ShippingZone $data
     * @param null $shippingZoneId
     *
     * @return ShippingZone
     */
    public function create($data, $shippingZoneId = null)
    {
        if (isset($shippingZoneId)) {
            return $this->client()->put($data, 'shipping-zones/{shippingZoneId}', ['shippingZoneId' => $shippingZoneId]);
        }

        return $this->client()->post($data, 'shipping-zones');
    }

    /**
     * @param string $shippingZoneId
     * @param array|JsonSerializable|ShippingZone $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return ShippingZone
     */
    public function update($shippingZoneId, $data)
    {
        return $this->client()->put($data, 'shipping-zones/{shippingZoneId}', ['shippingZoneId' => $shippingZoneId]);
    }

    /**
     * @param string $shippingZoneId
     */
    public function delete($shippingZoneId)
    {
        $this->client()->delete('shipping-zones/{shippingZoneId}', ['shippingZoneId' => $shippingZoneId]);
    }
}
