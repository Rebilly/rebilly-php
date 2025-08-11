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

class EmailNotificationNotifications implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('labels', $data)) {
            $this->setLabels($data['labels']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('isActive', $data)) {
            $this->setIsActive($data['isActive']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getLabels(): ?array
    {
        return $this->fields['labels'] ?? null;
    }

    /**
     * @param null|string[] $labels
     */
    public function setLabels(null|array $labels): static
    {
        $this->fields['labels'] = $labels;

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

    public function getIsActive(): ?bool
    {
        return $this->fields['isActive'] ?? null;
    }

    public function setIsActive(null|bool $isActive): static
    {
        $this->fields['isActive'] = $isActive;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('labels', $this->fields)) {
            $data['labels'] = $this->fields['labels'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('isActive', $this->fields)) {
            $data['isActive'] = $this->fields['isActive'];
        }

        return $data;
    }
}
