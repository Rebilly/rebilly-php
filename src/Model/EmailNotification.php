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

    public function getEventType(): ?string
    {
        return $this->fields['eventType'] ?? null;
    }

    public function setEventType(null|string $eventType): static
    {
        $this->fields['eventType'] = $eventType;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    /**
     * @return null|EmailNotificationNotifications[]
     */
    public function getNotifications(): ?array
    {
        return $this->fields['notifications'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType'];
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

    private function setCount(null|int $count): static
    {
        $this->fields['count'] = $count;

        return $this;
    }

    /**
     * @param null|array[]|EmailNotificationNotifications[] $notifications
     */
    private function setNotifications(null|array $notifications): static
    {
        $notifications = $notifications !== null ? array_map(
            fn ($value) => $value instanceof EmailNotificationNotifications ? $value : EmailNotificationNotifications::from($value),
            $notifications,
        ) : null;

        $this->fields['notifications'] = $notifications;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
