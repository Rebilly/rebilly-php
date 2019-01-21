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

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Dispute.
 */
final class Dispute extends Entity
{
    public const TYPE_1CB = 'first-chargeback';

    public const TYPE_2CB = 'second-chargeback';

    public const TYPE_RET = 'information-request';

    public const TYPE_ARB = 'arbitration';

    public const STATUS_RESPONSE_NEEDED = 'response-needed';

    public const STATUS_UNDER_REVIEW = 'under-review';

    public const STATUS_FORFEITED = 'forfeited';

    public const STATUS_WON = 'won';

    public const STATUS_LOST = 'lost';

    public const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s type support';

    public const MSG_UNEXPECTED_STATUS = 'Unexpected status. Only %s status support';

    public const MSG_UNEXPECTED_REASON_CODE = 'Unexpected reason code. Only %s reason code support';

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
            'A01',
            'A02',
            'A08',
            'F10',
            'F14',
            'F22',
            'F24',
            'F29',
            'C02',
            'C04',
            'C05',
            'C08',
            'C14',
            'C18',
            'C28',
            'C31',
            'C32',
            'M10',
            'M49',
            'P01',
            'P03',
            'P04',
            'P05',
            'P07',
            'P08',
            'P22',
            'P23',
            'R03',
            'R13',
            'M01',
            'FR1',
            'FR4',
            'FR6',
            'AL',
            'AP',
            'AW',
            'CA',
            'CD',
            'CR',
            'DA',
            'DP',
            'DP1',
            'EX',
            'IC',
            'IN',
            'IS',
            'LP',
            'N',
            'NA',
            'NC',
            'P',
            'RG',
            'RM',
            'RN1',
            'RN2',
            'SV',
            'TF',
            'TNM',
            'UA01',
            'UA02',
            'UA32',
            'UA99',
            'UA03',
            'UA10',
            'UA11',
            'UA12',
            'UA18',
            'UA20',
            'UA21',
            'UA22',
            'UA23',
            'UA28',
            'UA30',
            'UA31',
            'UA38',
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

        if (!in_array($value, $allowedReasonCodes, true)) {
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
     * @throws DomainException
     * @return $this
     *
     */
    public function setType($value)
    {
        $allowedTypes = self::allowedTypes();

        if (!in_array($value, $allowedTypes, true)) {
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
     * @throws DomainException
     * @return $this
     *
     */
    public function setStatus($value)
    {
        $allowedStatuses = self::allowedStatuses();

        if (!in_array($value, $allowedStatuses, true)) {
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
