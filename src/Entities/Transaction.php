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
    const RESULT_APPROVED = 'approved';
    const RESULT_DECLINED = 'declined';
    const RESULT_CANCELED = 'canceled';
    const RESULT_UNKNOWN = 'unknown';

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
        return $this->getResult() === self::RESULT_APPROVED;
    }
}
