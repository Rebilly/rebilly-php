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

use Rebilly\Sdk\Exception\UnknownDiscriminatorValueException;

class TimelineActionFactory
{
    public static function from(array $data = [], array $metadata = []): TimelineAction
    {
        return match ($data['action']) {
            'redemption-cancel' => RedemptionCancelTimelineAction::from($data, $metadata),
            'resend-email' => ResendEmailTimelineAction::from($data, $metadata),
            'ruleset-restore' => RulesetRestoreTimelineAction::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
