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
use Rebilly\Entities\Cashier\CashierStrategy;
use Rebilly\Entities\Invoice;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * calls CashierStrategyService
 */
final class CashierStrategyService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return CashierStrategy[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('cashier-strategies', $params);
    }

    /**
     * @param string $cashierStrategyId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return CashierStrategy
     */
    public function load($cashierStrategyId, $params = [])
    {
        return $this->client()->get(
            'cashier-strategies/{cashierStrategyId}',
            ['cashierStrategyId' => $cashierStrategyId] + (array) $params
        );
    }

    /**
     * @param array|JsonSerializable|CashierStrategy $data
     * @param string $cashierStrategyId
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return CashierStrategy
     */
    public function create($data, $cashierStrategyId = null)
    {
        if ($cashierStrategyId != null) {
            return $this->client()->put($data, 'cashier-strategies/{cashierStrategyId}', ['cashierStrategyId' => $cashierStrategyId]);
        }

        return $this->client()->post($data, 'cashier-strategies');
    }

    /**
     * @param string $cashierStrategyId
     * @param array|JsonSerializable|Invoice $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return CashierStrategy
     */
    public function update($cashierStrategyId, $data)
    {
        return $this->client()->put($data, 'cashier-strategies/{cashierStrategyId}', ['cashierStrategyId' => $cashierStrategyId]);
    }

    /**
     * @param string $cashierStrategyId
     *
     * @throws NotFoundException if resource does not exist
     */
    public function delete($cashierStrategyId)
    {
        $this->client()->delete('cashier-strategies/{cashierStrategyId}', ['cashierStrategyId' => $cashierStrategyId]);
    }
}
