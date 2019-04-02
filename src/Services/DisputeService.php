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
use Rebilly\Entities\Dispute;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class DisputeService
 *
 */
final class DisputeService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Dispute[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'disputes', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Dispute[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('disputes', $params);
    }

    /**
     * @param string $disputeId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return Dispute
     */
    public function load($disputeId, $params = [])
    {
        return $this->client()->get('disputes/{disputeId}', ['disputeId' => $disputeId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Dispute $data
     * @param string $disputeId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Dispute
     */
    public function create($data, $disputeId = null)
    {
        if (isset($disputeId)) {
            return $this->client()->put($data, 'disputes/{disputeId}', ['disputeId' => $disputeId]);
        }

        return $this->client()->post($data, 'disputes');
    }

    /**
     * @param string $disputeId
     * @param array|JsonSerializable|Dispute $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Dispute
     */
    public function update($disputeId, $data)
    {
        return $this->client()->put($data, 'disputes/{disputeId}', ['disputeId' => $disputeId]);
    }
}
