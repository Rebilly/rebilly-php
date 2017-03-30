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
use Rebilly\Entities\LeadSource;
use Rebilly\Entities\Transaction;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class TransactionService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class TransactionService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Transaction[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'transactions', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Transaction[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('transactions', $params);
    }

    /**
     * @param string $transactionId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Transaction
     */
    public function load($transactionId, $params = [])
    {
        return $this->client()->get('transactions/{transactionId}', ['transactionId' => $transactionId] + (array) $params);
    }

    /**
     * @param string $transactionId
     * @param float $amount
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Transaction
     */
    public function refund($transactionId, $amount)
    {
        return $this->client()->post(
            ['amount' => $amount],
            'transactions/{transactionId}/refund',
            ['transactionId' => $transactionId]
        );
    }

    /**
     * @param string $transactionId
     *
     * @return LeadSource
     */
    public function getLeadSource($transactionId)
    {
        return $this->client()->get('transactions/{transactionId}/lead-source', ['transactionId' => $transactionId]);
    }

    /**
     * @param string $transactionId
     * @param array|JsonSerializable|LeadSource $leadSource
     *
     * @return LeadSource
     */
    public function updateLeadSource($transactionId, $leadSource)
    {
        return $this->client()->put($leadSource, 'transactions/{transactionId}/lead-source', ['transactionId' => $transactionId]);
    }

    /**
     * @param string $transactionId
     */
    public function deleteLeadSource($transactionId)
    {
        $this->client()->delete('transactions/{transactionId}/lead-source', ['transactionId' => $transactionId]);
    }
}
