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

class EmailNotification implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
        if (array_key_exists('notifications', $data)) {
            $this->setNotifications($data['notifications']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEventType(): ?EventType
    {
        return $this->fields['eventType'] ?? null;
    }

    public function setEventType(null|EventType|string $eventType): self
    {
        if ($eventType !== null && !($eventType instanceof \Rebilly\Sdk\Model\EventType)) {
            $eventType = \Rebilly\Sdk\Model\EventType::from($eventType);
        }

        $this->fields['eventType'] = $eventType;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\EmailNotificationNotifications[]
     */
    public function getNotifications(): ?array
    {
        return $this->fields['notifications'] ?? null;
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
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType']?->value;
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('notifications', $this->fields)) {
            $data['notifications'] = $this->fields['notifications'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setCount(null|int $count): self
    {
        $this->fields['count'] = $count;

        return $this;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\EmailNotificationNotifications[] $notifications
     */
    private function setNotifications(null|array $notifications): self
    {
        $notifications = $notifications !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\EmailNotificationNotifications ? $value : \Rebilly\Sdk\Model\EmailNotificationNotifications::from($value)) : null, $notifications) : null;

        $this->fields['notifications'] = $notifications;

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
