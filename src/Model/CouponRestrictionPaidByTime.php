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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class CouponRestrictionPaidByTime implements RedemptionRestriction, CouponRestriction, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('time', $data)) {
            $this->setTime($data['time']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'paid-by-time';
    }

    public function getTime(): DateTimeImmutable
    {
        return $this->fields['time'];
    }

    public function setTime(DateTimeImmutable|string $time): static
    {
        if (!($time instanceof DateTimeImmutable)) {
            $time = new DateTimeImmutable($time);
        }

        $this->fields['time'] = $time;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'paid-by-time',
        ];
        if (array_key_exists('time', $this->fields)) {
            $data['time'] = $this->fields['time']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
