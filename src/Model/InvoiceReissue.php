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

class InvoiceReissue implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('dueTime', $data)) {
            $this->setDueTime($data['dueTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDueTime(): ?DateTimeImmutable
    {
        return $this->fields['dueTime'] ?? null;
    }

    public function setDueTime(null|DateTimeImmutable|string $dueTime): static
    {
        if ($dueTime !== null && !($dueTime instanceof DateTimeImmutable)) {
            $dueTime = new DateTimeImmutable($dueTime);
        }

        $this->fields['dueTime'] = $dueTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('dueTime', $this->fields)) {
            $data['dueTime'] = $this->fields['dueTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
