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
use Rebilly\Entities\BankAccount;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class BankAccountService
 *
 */

class BankAccountService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return BankAccount[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'bank-accounts', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return BankAccount[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('bank-accounts', $params);
    }

    /**
     * @param string $bankAccountId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return BankAccount
     */
    public function load($bankAccountId, $params = [])
    {
        return $this->client()->get('bank-accounts/{bankAccountId}', ['bankAccountId' => $bankAccountId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|BankAccount $data
     * @param string $bankAccountId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return BankAccount
     */
    public function create($data, $bankAccountId = null)
    {
        if (isset($bankAccountId)) {
            return $this->client()->put($data, 'bank-accounts/{bankAccountId}', ['bankAccountId' => $bankAccountId]);
        }

        return $this->client()->post($data, 'bank-accounts');
    }

    /**
     * @param string $bankAccountId
     *
     * @return BankAccount
     */
    public function deactivate($bankAccountId)
    {
        return $this->client()->post([], 'bank-accounts/{bankAccountId}/deactivation', ['bankAccountId' => $bankAccountId]);
    }
}
