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

class Immediately extends CommonScheduleInstruction
{
    public const METHOD_INTELLIGENT = 'intelligent';

    public const METHOD_IMMEDIATELY = 'immediately';

    public const METHOD_DATE_INTERVAL = 'date-interval';

    public const METHOD_DAY_OF_MONTH = 'day-of-month';

    public const METHOD_DAY_OF_WEEK = 'day-of-week';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'method' => 'immediately',
        ] + $data);

        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }

        return parent::jsonSerialize() + $data;
    }
}
