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

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

use InvalidArgumentException;
use JsonSerializable;

abstract class CustomEventScheduleInstruction implements JsonSerializable
{
    public const METHOD_DATE_INTERVAL = 'date-interval';

    public const METHOD_DAY_OF_MONTH = 'day-of-month';

    public const METHOD_DAY_OF_WEEK = 'day-of-week';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['method']) {
            case 'day-of-week':
                return new DayOfWeek($data);
            case 'day-of-month':
                return new DayOfMonth($data);
            case 'date-interval':
                return new DateInterval($data);
        }

        throw new InvalidArgumentException("Unsupported method value: '{$data['method']}'");
    }

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }

        return $data;
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    private function setMethod(string $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }
}
