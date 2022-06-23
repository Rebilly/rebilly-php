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
use Rebilly\Entities\CreditMemo;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CreditMemoService
 */
final class CreditMemoService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return CreditMemo[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'credit-memos', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return CreditMemo[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('credit-memos', $params);
    }

    /**
     * @param string $creditMemoId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     * @return CreditMemo
     */
    public function load($creditMemoId, $params = [])
    {
        return $this->client()->get('credit-memos/{creditMemoId}', ['creditMemoId' => $creditMemoId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|CreditMemo $data
     * @param string $creditMemoId
     *
     * @throws DataValidationException if input data is not valid
     * @return CreditMemo
     */
    public function create($data, $creditMemoId = null)
    {
        if (isset($creditMemoId)) {
            return $this->client()->put($data, 'credit-memos/{creditMemoId}', ['creditMemoId' => $creditMemoId]);
        }

        return $this->client()->post($data, 'credit-memos');
    }

    /**
     * @param string $creditMemoId
     * @param array|JsonSerializable|CreditMemo $data
     *
     * @throws DataValidationException if input data is not valid
     * @return CreditMemo
     */
    public function update($creditMemoId, $data)
    {
        return $this->client()->put($data, 'credit-memos/{creditMemoId}', ['creditMemoId' => $creditMemoId]);
    }

    /**
     * @param string $creditMemoId
     *
     * @return CreditMemo
     */
    public function void($creditMemoId)
    {
        return $this->client()->post([], 'credit-memos/{creditMemoId}/void', ['creditMemoId' => $creditMemoId]);
    }
}
