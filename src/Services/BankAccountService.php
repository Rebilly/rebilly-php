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
use Rebilly\Entities\BankAccount;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class BankAccountService
 *
 * @author Dara Pich <dara.pich@rebilly.com>
 * @version 0.1
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
        } else {
            return $this->client()->post($data, 'bank-accounts');
        }
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
