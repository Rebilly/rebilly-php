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

namespace Rebilly\Entities\Subscriptions;

use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\DateIntervalType;
use Rebilly\Rest\Resource;

final class InvoiceTimeShift extends Resource
{
    /**
     * @return DateIntervalType
     */
    public function getIssueTimeShift()
    {
        return $this->getAttribute('issueTimeShift');
    }

    public function setIssueTimeShift($value)
    {
        return $this->setAttribute('issueTimeShift', $value);
    }

    public function createIssueTimeShift(array $data)
    {
        $data['method'] = DateIntervalType::DATE_INTERVAL;

        return DateIntervalType::createFromData($data);
    }

    /**
     * @return bool
     */
    public function hasDueTimeShift()
    {
        return $this->getAttribute('dueTimeShift') instanceof DateIntervalType;
    }

    /**
     * @return DateIntervalType
     */
    public function getDueTimeShift()
    {
        return $this->getAttribute('dueTimeShift');
    }

    public function setDueTimeShift($value)
    {
        return $this->setAttribute('dueTimeShift', $value);
    }

    public function createDueTimeShift(array $data)
    {
        $data['method'] = DateIntervalType::DATE_INTERVAL;

        return DateIntervalType::createFromData($data);
    }
}
