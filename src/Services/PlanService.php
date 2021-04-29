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
use Rebilly\Entities\Plan;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PlanService
 *
 */
final class PlanService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Plan[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'plans', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Plan[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('plans', $params);
    }

    /**
     * @param string $planId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return Plan
     */
    public function load($planId, $params = [])
    {
        return $this->client()->get('plans/{planId}', ['planId' => $planId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Plan $data
     * @param string $planId
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Plan
     */
    public function create($data, $planId = null)
    {
        if (isset($planId)) {
            return $this->client()->put($data, 'plans/{planId}', ['planId' => $planId]);
        }

        return $this->client()->post($data, 'plans');
    }

    /**
     * @param string $planId
     * @param array|JsonSerializable|Plan $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Plan
     */
    public function update($planId, $data)
    {
        return $this->client()->put($data, 'plans/{planId}', ['planId' => $planId]);
    }

    /**
     * @param string $planId
     */
    public function delete($planId)
    {
        $this->client()->delete('plans/{planId}', ['planId' => $planId]);
    }
}
