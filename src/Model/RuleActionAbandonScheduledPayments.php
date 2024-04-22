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

class RuleActionAbandonScheduledPayments extends RuleAction
{
    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'abandon-scheduled-payments',
        ] + $data);
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }
}
