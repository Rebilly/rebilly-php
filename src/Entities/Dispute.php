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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Dispute
 *
 * ```json
 * {
 *   "id"
 *   "customerId",
 *   "transactionId",
 *   "currency",
 *   "amount"
 *   "acquirerReferenceNumber",
 *   "reasonCode",
 *   "category"
 *   "type",
 *   "status",
 *   "postedTime"
 *   "deadlineTime"
 *   "resolvedTime",
 *   "createdTime",
 *   "updatedTime",
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class Dispute extends Entity
{
    const TYPE_1CB = '1CB';
    const TYPE_2CB = '2CB';
    const TYPE_RET = 'RET';
    const TYPE_ARB = 'ARB';

    const STATUS_RESPONSE_NEEDED = 'response-needed';
    const STATUS_UNDER_REVIEW = 'under-review';
    const STATUS_FORFEITED = 'forfeited';
    const STATUS_WON = 'won';
    const STATUS_LOST = 'lost';

    const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s type support';
    const MSG_UNEXPECTED_STATUS = 'Unexpected status. Only %s status support';
    const MSG_UNEXPECTED_REASON_CODE = 'Unexpected reason code. Only %s reason code support';

    /**
     * @return array
     */
    public static function allowedTypes()
    {
        return [
            self::TYPE_1CB,
            self::TYPE_2CB,
            self::TYPE_RET,
            self::TYPE_ARB,
        ];
    }

    /**
     * @return array
     */
    public static function allowedStatuses()
    {
        return [
            self::STATUS_RESPONSE_NEEDED,
            self::STATUS_UNDER_REVIEW,
            self::STATUS_FORFEITED,
            self::STATUS_WON,
            self::STATUS_LOST,
        ];
    }

    /**
     * @return array
     */
    public static function allowedReasonCodes()
    {
        return [
            '1000',
            '12',
            '2',
            '30',
            '31',
            '35',
            '37',
            '40',
            '41',
            '42',
            '46',
            '47',
            '49',
            '50',
            '53',
            '54',
            '55',
            '57',
            '59',
            '60',
            '62',
            '7',
            '70',
            '71',
            '72',
            '73',
            '74',
            '75',
            '76',
            '77',
            '79',
            '8',
            '80',
            '81',
            '82',
            '83',
            '85',
            '86',
            '93',
            '00',
            '63',
        ];
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->getAttribute('transactionId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTransactionId($value)
    {
        return $this->setAttribute('transactionId', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }

    /**
     * @return string
     */
    public function getAcquirerReferenceNumber()
    {
        return $this->getAttribute('acquirerReferenceNumber');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAcquirerReferenceNumber($value)
    {
        return $this->setAttribute('acquirerReferenceNumber', $value);
    }

    /**
     * @return string
     */
    public function getReasonCode()
    {
        return $this->getAttribute('reasonCode');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setReasonCode($value)
    {
        $allowedReasonCodes = self::allowedReasonCodes();

        if (!in_array($value, $allowedReasonCodes)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_REASON_CODE, implode(', ', $allowedReasonCodes)));
        }

        return $this->setAttribute('reasonCode', $value);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @return $this
     * 
     * @throws DomainException
     */
    public function setType($value)
    {
        $allowedTypes = self::allowedTypes();
        
        if (!in_array($value, $allowedTypes)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_TYPE, implode(', ', $allowedTypes)));
        }
        
        return $this->setAttribute('type', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return $this
     * 
     * @throws DomainException
     */
    public function setStatus($value)
    {
        $allowedStatuses = self::allowedStatuses();

        if (!in_array($value, $allowedStatuses)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_STATUS, implode(', ', $allowedStatuses)));
        }
        
        return $this->setAttribute('status', $value);
    }

    /**
     * @return string
     */
    public function getPostedTime()
    {
        return $this->getAttribute('postedTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPostedTime($value)
    {
        return $this->setAttribute('postedTime', $value);
    }

    /**
     * @return string
     */
    public function getDeadlineTime()
    {
        return $this->getAttribute('deadlineTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDeadlineTime($value)
    {
        return $this->setAttribute('deadlineTime', $value);
    }

    /**
     * @return string
     */
    public function getResolvedTime()
    {
        return $this->getAttribute('resolvedTime');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
