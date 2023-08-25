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

class OwnerApplicationInstance implements JsonSerializable
{
    public const STATUS_ENABLING = 'enabling';

    public const STATUS_ENABLED = 'enabled';

    public const STATUS_DISABLING = 'disabling';

    public const STATUS_DISABLED = 'disabled';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('isConfigured', $data)) {
            $this->setIsConfigured($data['isConfigured']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
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
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getIsConfigured(): ?bool
    {
        return $this->fields['isConfigured'] ?? null;
    }

    /**
     * @return null|array<string,string>
     */
    public function getSettings(): ?array
    {
        return $this->fields['settings'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static
    {
        $this->fields['_links'] = $links;

        return $this;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
    }

    public function setOrganizationId(null|string $organizationId): static
    {
        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('isConfigured', $this->fields)) {
            $data['isConfigured'] = $this->fields['isConfigured'];
        }
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings'];
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
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }

        return $data;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setIsConfigured(null|bool $isConfigured): static
    {
        $this->fields['isConfigured'] = $isConfigured;

        return $this;
    }

    /**
     * @param null|array<string,string> $settings
     */
    private function setSettings(null|array $settings): static
    {
        $this->fields['settings'] = $settings;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    private function setToken(null|string $token): static
    {
        $this->fields['token'] = $token;

        return $this;
    }
}
