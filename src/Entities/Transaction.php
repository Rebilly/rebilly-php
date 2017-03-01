<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Transaction
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
 *   "payment"
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
    public function getUpdatedTime()
    {
        return $this->getAttribute('updatedTime');
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
    public function getResult()
    {
        return $this->getAttribute('result');
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

    /**
     * @return null|PaymentCard
     */
    public function getPaymentCard()
    {
        if ($this->hasEmbeddedResource('paymentCard')) {
            return new PaymentCard($this->getEmbeddedResource('paymentCard'));
        } else {
            return null;
        }
    }

    /**
     * @return Gateway|null
     */
    public function getGateway()
    {
        return ($this->getAttribute('gateway') !== null) ? new Gateway($this->getAttribute('gateway')) : null;
    }

    /**
     * @return null|Payment
     */
    public function getPayment()
    {
        if ($this->hasEmbeddedResource('payment')) {
            return new Payment($this->getEmbeddedResource('payment'));
        } else {
            return null;
        }
    }

    /**
     * @return bool
     */
    public function isApproved()
    {
        return $this->getResult() === 'approved';
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return array
     */
    public function getChildTransactions()
    {
        return $this->getAttribute('childTransactions');
    }

    /**
     * @return string
     */
    public function getGatewayAccountId()
    {
        return $this->getAttribute('gatewayAccountId');
    }

    /**
     * @return string
     */
    public function getGatewayTransactionId()
    {
        return $this->getAttribute('gatewayTransactionId');
    }

    /**
     * @return string
     */
    public function getGatewayName()
    {
        return $this->getAttribute('gatewayName');
    }

    /**
     * @return string
     */
    public function getAcquirerName()
    {
        return $this->getAttribute('acquirerName');
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @return string
     */
    public function getBin()
    {
        return $this->getAttribute('bin');
    }

    /**
     * @return bool
     */
    public function isHas3ds()
    {
        return $this->getAttribute('has3ds');
    }

    /**
     * @return bool
     */
    public function isHasDcc()
    {
        return $this->getAttribute('hasDcc');
    }
}
