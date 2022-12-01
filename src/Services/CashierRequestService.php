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

declare(strict_types=1);

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\Cashier\CashierRequest;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CashierRequestService
 */
final class CashierRequestService extends Service
{
    /**
     * @param array|ArrayObject $params
     * @return CashierRequest[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'cashier-requests', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return CashierRequest[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('cashier-requests', $params);
    }

    /**
     * @param string $cashierRequestId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return CashierRequest
     */
    public function load($cashierRequestId, $params = [])
    {
        return $this->client()->get(
            'cashier-requests/{cashierRequestId}',
            ['cashierRequestId' => $cashierRequestId] + (array) $params
        );
    }

    /**
     * @param array|JsonSerializable|CashierRequest $data
     *
     * @throws DataValidationException if input data is not valid
     * @return CashierRequest
     */
    public function create($data)
    {
        return $this->client()->post($data, 'cashier-requests');
    }
}
