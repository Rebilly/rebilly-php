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

class RuleActionScheduleInvoiceRetryAttempts implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('scheduleInstruction', $data)) {
            $this->setScheduleInstruction($data['scheduleInstruction']);
        }
        if (array_key_exists('amountAdjustmentInstruction', $data)) {
            $this->setAmountAdjustmentInstruction($data['amountAdjustmentInstruction']);
        }
        if (array_key_exists('tryBackupInstruments', $data)) {
            $this->setTryBackupInstruments($data['tryBackupInstruments']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getScheduleInstruction(): InvoiceRetryScheduleInstruction
    {
        return $this->fields['scheduleInstruction'];
    }

    public function setScheduleInstruction(InvoiceRetryScheduleInstruction|array $scheduleInstruction): static
    {
        if (!($scheduleInstruction instanceof InvoiceRetryScheduleInstruction)) {
            $scheduleInstruction = InvoiceRetryScheduleInstructionFactory::from($scheduleInstruction);
        }

        $this->fields['scheduleInstruction'] = $scheduleInstruction;

        return $this;
    }

    public function getAmountAdjustmentInstruction(): ?InvoiceRetryAmountAdjustmentInstruction
    {
        return $this->fields['amountAdjustmentInstruction'] ?? null;
    }

    public function setAmountAdjustmentInstruction(null|InvoiceRetryAmountAdjustmentInstruction|array $amountAdjustmentInstruction): static
    {
        if ($amountAdjustmentInstruction !== null && !($amountAdjustmentInstruction instanceof InvoiceRetryAmountAdjustmentInstruction)) {
            $amountAdjustmentInstruction = InvoiceRetryAmountAdjustmentInstructionFactory::from($amountAdjustmentInstruction);
        }

        $this->fields['amountAdjustmentInstruction'] = $amountAdjustmentInstruction;

        return $this;
    }

    public function getTryBackupInstruments(): ?bool
    {
        return $this->fields['tryBackupInstruments'] ?? null;
    }

    public function setTryBackupInstruments(null|bool $tryBackupInstruments): static
    {
        $this->fields['tryBackupInstruments'] = $tryBackupInstruments;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('scheduleInstruction', $this->fields)) {
            $data['scheduleInstruction'] = $this->fields['scheduleInstruction']->jsonSerialize();
        }
        if (array_key_exists('amountAdjustmentInstruction', $this->fields)) {
            $data['amountAdjustmentInstruction'] = $this->fields['amountAdjustmentInstruction']?->jsonSerialize();
        }
        if (array_key_exists('tryBackupInstruments', $this->fields)) {
            $data['tryBackupInstruments'] = $this->fields['tryBackupInstruments'];
        }

        return $data;
    }
}
