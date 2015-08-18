<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Api;

use ArrayObject;
use Rebilly\Client;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class Transaction.
 *
 *
 * ```json
 * {
 *   "id"
 *   "createdTime"
 *   "type"
 *   "result"
 *   "amount"
 *   "currency"
 *   "parentTransaction"
 *   "rebillNumber"
 *   "processorAccount"
 *   "processorResponse"
 *   "website"
 *   "customer"
 *   "paymentCard"
 * }
 * ```
 *
 * @todo Check if `getProcessorAccountId` is a ID or name
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Transaction extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return string
     */
    public function getParentTransactionId()
    {
        return $this->getAttribute('parentTransaction');
    }

    /**
     * @return string
     */
    public function getRebillNumber()
    {
        return $this->getAttribute('rebillNumber');
    }

    /**
     * @return string
     */
    public function getProcessorAccountId()
    {
        return $this->getAttribute('processorAccount');
    }

    /**
     * @return string
     */
    public function getProcessorResponse()
    {
        return $this->getAttribute('processorResponse');
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('website');
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customer');
    }

    /**
     * @return string
     */
    public function getPaymentCardId()
    {
        return $this->getAttribute('paymentCard');
    }

    /********************************************************************************
     * Transaction API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return Transaction[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('transactions', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $transactionId
     * @param array|ArrayObject $params
     *
     * @return Transaction
     */
    public static function load($transactionId, $params = [])
    {
        $params['transactionId'] = $transactionId;

        return Client::get('transactions/{transactionId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $transactionId
     * @param float $amount
     *
     * @return Transaction
     */
    public static function refund($transactionId, $amount)
    {
        return Client::post(['amount' => $amount], 'transactions/{transactionId}/refund', ['transactionId' => $transactionId]);
    }
}
