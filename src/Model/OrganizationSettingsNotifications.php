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

class OrganizationSettingsNotifications implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('notifyOnUserAccessChanges', $data)) {
            $this->setNotifyOnUserAccessChanges($data['notifyOnUserAccessChanges']);
        }
        if (array_key_exists('notifyOnApiKeyAccessChanges', $data)) {
            $this->setNotifyOnApiKeyAccessChanges($data['notifyOnApiKeyAccessChanges']);
        }
        if (array_key_exists('notificationEmailAddresses', $data)) {
            $this->setNotificationEmailAddresses($data['notificationEmailAddresses']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getNotifyOnUserAccessChanges(): ?bool
    {
        return $this->fields['notifyOnUserAccessChanges'] ?? null;
    }

    public function setNotifyOnUserAccessChanges(null|bool $notifyOnUserAccessChanges): static
    {
        $this->fields['notifyOnUserAccessChanges'] = $notifyOnUserAccessChanges;

        return $this;
    }

    public function getNotifyOnApiKeyAccessChanges(): ?bool
    {
        return $this->fields['notifyOnApiKeyAccessChanges'] ?? null;
    }

    public function setNotifyOnApiKeyAccessChanges(null|bool $notifyOnApiKeyAccessChanges): static
    {
        $this->fields['notifyOnApiKeyAccessChanges'] = $notifyOnApiKeyAccessChanges;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getNotificationEmailAddresses(): ?array
    {
        return $this->fields['notificationEmailAddresses'] ?? null;
    }

    /**
     * @param null|string[] $notificationEmailAddresses
     */
    public function setNotificationEmailAddresses(null|array $notificationEmailAddresses): static
    {
        $this->fields['notificationEmailAddresses'] = $notificationEmailAddresses;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('notifyOnUserAccessChanges', $this->fields)) {
            $data['notifyOnUserAccessChanges'] = $this->fields['notifyOnUserAccessChanges'];
        }
        if (array_key_exists('notifyOnApiKeyAccessChanges', $this->fields)) {
            $data['notifyOnApiKeyAccessChanges'] = $this->fields['notifyOnApiKeyAccessChanges'];
        }
        if (array_key_exists('notificationEmailAddresses', $this->fields)) {
            $data['notificationEmailAddresses'] = $this->fields['notificationEmailAddresses'];
        }

        return $data;
    }
}
