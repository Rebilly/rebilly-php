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

class JournalSummaryReportDataBreakdown implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('journalAccountId', $data)) {
            $this->setJournalAccountId($data['journalAccountId']);
        }
        if (array_key_exists('recognizedAmount', $data)) {
            $this->setRecognizedAmount($data['recognizedAmount']);
        }
        if (array_key_exists('estimatedAmount', $data)) {
            $this->setEstimatedAmount($data['estimatedAmount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getJournalAccountId(): ?string
    {
        return $this->fields['journalAccountId'] ?? null;
    }

    public function setJournalAccountId(null|string $journalAccountId): static
    {
        $this->fields['journalAccountId'] = $journalAccountId;

        return $this;
    }

    public function getRecognizedAmount(): ?float
    {
        return $this->fields['recognizedAmount'] ?? null;
    }

    public function setRecognizedAmount(null|float|string $recognizedAmount): static
    {
        if (is_string($recognizedAmount)) {
            $recognizedAmount = (float) $recognizedAmount;
        }

        $this->fields['recognizedAmount'] = $recognizedAmount;

        return $this;
    }

    public function getEstimatedAmount(): ?float
    {
        return $this->fields['estimatedAmount'] ?? null;
    }

    public function setEstimatedAmount(null|float|string $estimatedAmount): static
    {
        if (is_string($estimatedAmount)) {
            $estimatedAmount = (float) $estimatedAmount;
        }

        $this->fields['estimatedAmount'] = $estimatedAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('journalAccountId', $this->fields)) {
            $data['journalAccountId'] = $this->fields['journalAccountId'];
        }
        if (array_key_exists('recognizedAmount', $this->fields)) {
            $data['recognizedAmount'] = $this->fields['recognizedAmount'];
        }
        if (array_key_exists('estimatedAmount', $this->fields)) {
            $data['estimatedAmount'] = $this->fields['estimatedAmount'];
        }

        return $data;
    }
}
