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
use Rebilly\Sdk\Trait\HasMetadata;

class PatchBroadcastMessage implements JsonSerializable
{
    use HasMetadata;

    public const STATUS_DRAFT = 'draft';

    public const STATUS_ARCHIVED = 'archived';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('messages', $data)) {
            $this->setMessages($data['messages']);
        }
        if (array_key_exists('startSendingTime', $data)) {
            $this->setStartSendingTime($data['startSendingTime']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getFilter(): ?string
    {
        return $this->fields['filter'] ?? null;
    }

    public function setFilter(null|string $filter): static
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): static
    {
        $this->fields['title'] = $title;

        return $this;
    }

    /**
     * @return null|PatchBroadcastMessageMessages[]
     */
    public function getMessages(): ?array
    {
        return $this->fields['messages'] ?? null;
    }

    /**
     * @param null|array[]|PatchBroadcastMessageMessages[] $messages
     */
    public function setMessages(null|array $messages): static
    {
        $messages = $messages !== null ? array_map(
            fn ($value) => $value instanceof PatchBroadcastMessageMessages ? $value : PatchBroadcastMessageMessages::from($value),
            $messages,
        ) : null;

        $this->fields['messages'] = $messages;

        return $this;
    }

    public function getStartSendingTime(): ?DateTimeImmutable
    {
        return $this->fields['startSendingTime'] ?? null;
    }

    public function setStartSendingTime(null|DateTimeImmutable|string $startSendingTime): static
    {
        if ($startSendingTime !== null && !($startSendingTime instanceof DateTimeImmutable)) {
            $startSendingTime = new DateTimeImmutable($startSendingTime);
        }

        $this->fields['startSendingTime'] = $startSendingTime;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('messages', $this->fields)) {
            $data['messages'] = $this->fields['messages'] !== null
                ? array_map(
                    static fn (PatchBroadcastMessageMessages $patchBroadcastMessageMessages) => $patchBroadcastMessageMessages->jsonSerialize(),
                    $this->fields['messages'],
                )
                : null;
        }
        if (array_key_exists('startSendingTime', $this->fields)) {
            $data['startSendingTime'] = $this->fields['startSendingTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }

        return $data;
    }
}
