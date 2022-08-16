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

class ScheduleReminder extends RuleAction
{
    public const ROLE_ALL = 'all';

    public const ROLE_RENEWAL = 'renewal';

    public const ROLE_TRIAL_END = 'trial-end';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'schedule-reminder',
        ] + $data);

        if (array_key_exists('role', $data)) {
            $this->setRole($data['role']);
        }
        if (array_key_exists('schedule', $data)) {
            $this->setSchedule($data['schedule']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::ROLE_* $role
     */
    public function getRole(): string
    {
        return $this->fields['role'];
    }

    /**
     * @psalm-param self::ROLE_* $role
     */
    public function setRole(string $role): self
    {
        $this->fields['role'] = $role;

        return $this;
    }

    public function getSchedule(): ?ReminderSchedule
    {
        return $this->fields['schedule'] ?? null;
    }

    public function setSchedule(null|ReminderSchedule|array $schedule): self
    {
        if ($schedule !== null && !($schedule instanceof ReminderSchedule)) {
            $schedule = ReminderSchedule::from($schedule);
        }

        $this->fields['schedule'] = $schedule;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('role', $this->fields)) {
            $data['role'] = $this->fields['role'];
        }
        if (array_key_exists('schedule', $this->fields)) {
            $data['schedule'] = $this->fields['schedule']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
