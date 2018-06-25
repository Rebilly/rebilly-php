<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\PaymentRetryInstructions;

use DomainException;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\AutoType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\DateIntervalType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\DayOfMonthType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\DayOfWeekType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\ImmediatelyType;
use Rebilly\Rest\Resource;

/**
 * Class ScheduleInstruction.
 */
abstract class ScheduleInstruction extends Resource
{
    const UNSUPPORTED_METHOD = 'Unexpected method. Only %s methods are supported';
    const REQUIRED_METHOD = 'Method is required';

    const AUTO = 'auto';
    const DATE_INTERVAL = 'date-interval';
    const DAY_OF_MONTH = 'day-of-month';
    const DAY_OF_WEEK = 'day-of-week';
    const IMMEDIATELY = 'immediately';

    private static $availableMethods = [
        self::AUTO,
        self::DATE_INTERVAL,
        self::DAY_OF_MONTH,
        self::DAY_OF_WEEK,
        self::IMMEDIATELY,
    ];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct(['method' => $this->methodName()] + $data);
    }

    /**
     * @param array $data
     *
     * @return ScheduleInstruction
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['method'])) {
            throw new DomainException(self::REQUIRED_METHOD);
        }

        switch ($data['method']) {
            case self::AUTO:
                $scheduleInstruction = new AutoType($data);
                break;
            case self::DATE_INTERVAL:
                $scheduleInstruction = new DateIntervalType($data);
                break;
            case self::DAY_OF_MONTH:
                $scheduleInstruction = new DayOfMonthType($data);
                break;
            case self::DAY_OF_WEEK:
                $scheduleInstruction = new DayOfWeekType($data);
                break;
            case self::IMMEDIATELY:
                $scheduleInstruction = new ImmediatelyType($data);
                break;
            default:
                throw new DomainException(
                    sprintf(self::UNSUPPORTED_METHOD, implode(',', self::$availableMethods))
                );
        }

        return $scheduleInstruction;
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
    abstract protected function methodName();
}
