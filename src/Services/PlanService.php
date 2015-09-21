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
use Rebilly\Entities\Plan;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PlanService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
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
     * @throws NotFoundException The resource data does exist
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
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Plan
     */
    public function create($data, $planId = null)
    {
        if (isset($planId)) {
            return $this->client()->put($data, 'plans/{planId}', ['planId' => $planId]);
        } else {
            return $this->client()->post($data, 'plans');
        }
    }

    /**
     * @param string $planId
     * @param array|JsonSerializable|Plan $data
     *
     * @throws UnprocessableEntityException The input data does not valid
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
