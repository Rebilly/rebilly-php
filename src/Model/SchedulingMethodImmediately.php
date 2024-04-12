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

class SchedulingMethodImmediately implements ServicePeriodAnchorInstruction, InvoiceRetryScheduleInstruction, SettlementPeriod, ScheduleInstruction
{
    public function __construct(array $data = [])
    {
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return 'immediately';
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'immediately',
        ];

        return $data;
    }
}
