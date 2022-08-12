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

class BroadcastMessage implements JsonSerializable
{
    public const STATUS_DRAFT = 'draft';

    public const STATUS_SENDING = 'sending';

    public const STATUS_SENT = 'sent';

    public const STATUS_ARCHIVED = 'archived';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('messages', $data)) {
            $this->setMessages($data['messages']);
        }
        if (array_key_exists('splitTestStartTime', $data)) {
            $this->setSplitTestStartTime($data['splitTestStartTime']);
        }
        if (array_key_exists('startSendingTime', $data)) {
            $this->setStartSendingTime($data['startSendingTime']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getFilter(): ?string
    {
        return $this->fields['filter'] ?? null;
    }

    public function setFilter(null|string $filter): self
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): self
    {
        $this->fields['title'] = $title;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\BroadcastMessageMessages[]
     */
    public function getMessages(): ?array
    {
        return $this->fields['messages'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\BroadcastMessageMessages[] $messages
     */
    public function setMessages(null|array $messages): self
    {
        $messages = $messages !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\BroadcastMessageMessages ? $value : \Rebilly\Sdk\Model\BroadcastMessageMessages::from($value)) : null, $messages) : null;

        $this->fields['messages'] = $messages;

        return $this;
    }

    public function getSplitTestStartTime(): ?DateTimeImmutable
    {
        return $this->fields['splitTestStartTime'] ?? null;
    }

    public function getStartSendingTime(): DateTimeImmutable
    {
        return $this->fields['startSendingTime'];
    }

    public function setStartSendingTime(DateTimeImmutable|string $startSendingTime): self
    {
        if (!($startSendingTime instanceof DateTimeImmutable)) {
            $startSendingTime = new DateTimeImmutable($startSendingTime);
        }

        $this->fields['startSendingTime'] = $startSendingTime;

        return $this;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('messages', $this->fields)) {
            $data['messages'] = $this->fields['messages'];
        }
        if (array_key_exists('splitTestStartTime', $this->fields)) {
            $data['splitTestStartTime'] = $this->fields['splitTestStartTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('startSendingTime', $this->fields)) {
            $data['startSendingTime'] = $this->fields['startSendingTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setSplitTestStartTime(null|DateTimeImmutable|string $splitTestStartTime): self
    {
        if ($splitTestStartTime !== null && !($splitTestStartTime instanceof DateTimeImmutable)) {
            $splitTestStartTime = new DateTimeImmutable($splitTestStartTime);
        }

        $this->fields['splitTestStartTime'] = $splitTestStartTime;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\SelfLink ? $value : \Rebilly\Sdk\Model\SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
