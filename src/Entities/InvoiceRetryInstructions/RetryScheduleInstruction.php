<?php
/**
 * Created by PhpStorm.
 * User: vasile
 * Date: 2019-03-15
 * Time: 10:28
 */

namespace Rebilly\Entities\InvoiceRetryInstructions;

use DomainException;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;

abstract class RetryScheduleInstruction extends ScheduleInstruction
{
    private static $availableMethods = [
        self::INTELLIGENT,
        self::IMMEDIATELY,
        self::DATE_INTERVAL,
        self::DAY_OF_MONTH,
        self::DAY_OF_WEEK,
    ];

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

        if (!in_array($data['method'], self::$availableMethods, true)) {
            throw new DomainException(
                sprintf(self::UNSUPPORTED_METHOD, implode(',', self::$availableMethods))
            );
        }

        return parent::createFromData($data);
    }
}
