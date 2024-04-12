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

use JsonSerializable;

class RuleActionScheduleReminderSchedule implements JsonSerializable
{
    public const CHRONOLOGY_BEFORE = 'before';

    public const CHRONOLOGY_AFTER = 'after';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('instructions', $data)) {
            $this->setInstructions($data['instructions']);
        }
        if (array_key_exists('chronology', $data)) {
            $this->setChronology($data['chronology']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return ReminderScheduleInstruction[]
     */
    public function getInstructions(): array
    {
        return $this->fields['instructions'];
    }

    /**
     * @param array[]|ReminderScheduleInstruction[] $instructions
     */
    public function setInstructions(array $instructions): static
    {
        $instructions = array_map(
            fn ($value) => $value instanceof ReminderScheduleInstruction ? $value : ReminderScheduleInstructionFactory::from($value),
            $instructions,
        );

        $this->fields['instructions'] = $instructions;

        return $this;
    }

    public function getChronology(): string
    {
        return $this->fields['chronology'];
    }

    public function setChronology(string $chronology): static
    {
        $this->fields['chronology'] = $chronology;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('instructions', $this->fields)) {
            $data['instructions'] = array_map(
                static fn (ReminderScheduleInstruction $reminderScheduleInstruction) => $reminderScheduleInstruction->jsonSerialize(),
                $this->fields['instructions'],
            );
        }
        if (array_key_exists('chronology', $this->fields)) {
            $data['chronology'] = $this->fields['chronology'];
        }

        return $data;
    }
}
