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
use Rebilly\Entities\Dispute;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class DisputeService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
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
     * @throws NotFoundException The resource data does exist
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
        } else {
            return $this->client()->post($data, 'disputes');
        }
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
