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

class InvoiceTimeShift implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('issueTimeShift', $data)) {
            $this->setIssueTimeShift($data['issueTimeShift']);
        }
        if (array_key_exists('dueTimeShift', $data)) {
            $this->setDueTimeShift($data['dueTimeShift']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getIssueTimeShift(): ?IssueTimeShiftInstruction
    {
        return $this->fields['issueTimeShift'] ?? null;
    }

    public function setIssueTimeShift(null|IssueTimeShiftInstruction|array $issueTimeShift): self
    {
        if ($issueTimeShift !== null && !($issueTimeShift instanceof IssueTimeShiftInstruction)) {
            $issueTimeShift = IssueTimeShiftInstruction::from($issueTimeShift);
        }

        $this->fields['issueTimeShift'] = $issueTimeShift;

        return $this;
    }

    public function getDueTimeShift(): ?DueTimeShiftInstruction
    {
        return $this->fields['dueTimeShift'] ?? null;
    }

    public function setDueTimeShift(null|DueTimeShiftInstruction|array $dueTimeShift): self
    {
        if ($dueTimeShift !== null && !($dueTimeShift instanceof DueTimeShiftInstruction)) {
            $dueTimeShift = DueTimeShiftInstruction::from($dueTimeShift);
        }

        $this->fields['dueTimeShift'] = $dueTimeShift;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('issueTimeShift', $this->fields)) {
            $data['issueTimeShift'] = $this->fields['issueTimeShift']?->jsonSerialize();
        }
        if (array_key_exists('dueTimeShift', $this->fields)) {
            $data['dueTimeShift'] = $this->fields['dueTimeShift']?->jsonSerialize();
        }

        return $data;
    }
}
