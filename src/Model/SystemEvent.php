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

class SystemEvent implements JsonSerializable
{
    public const CATEGORY_BILLING = 'billing';

    public const CATEGORY_PAYMENTS = 'payments';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('category', $data)) {
            $this->setCategory($data['category']);
        }
        if (array_key_exists('rulesCount', $data)) {
            $this->setRulesCount($data['rulesCount']);
        }
        if (array_key_exists('bindsCount', $data)) {
            $this->setBindsCount($data['bindsCount']);
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

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): static
    {
        $this->fields['title'] = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->fields['category'] ?? null;
    }

    public function setCategory(null|string $category): static
    {
        $this->fields['category'] = $category;

        return $this;
    }

    public function getRulesCount(): ?int
    {
        return $this->fields['rulesCount'] ?? null;
    }

    public function getBindsCount(): ?int
    {
        return $this->fields['bindsCount'] ?? null;
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
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('category', $this->fields)) {
            $data['category'] = $this->fields['category'];
        }
        if (array_key_exists('rulesCount', $this->fields)) {
            $data['rulesCount'] = $this->fields['rulesCount'];
        }
        if (array_key_exists('bindsCount', $this->fields)) {
            $data['bindsCount'] = $this->fields['bindsCount'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setRulesCount(null|int $rulesCount): static
    {
        $this->fields['rulesCount'] = $rulesCount;

        return $this;
    }

    private function setBindsCount(null|int $bindsCount): static
    {
        $this->fields['bindsCount'] = $bindsCount;

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
