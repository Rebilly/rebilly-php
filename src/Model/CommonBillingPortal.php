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

abstract class CommonBillingPortal implements JsonSerializable
{
    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('slug', $data)) {
            $this->setSlug($data['slug']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customDomain', $data)) {
            $this->setCustomDomain($data['customDomain']);
        }
        if (array_key_exists('features', $data)) {
            $this->setFeatures($data['features']);
        }
        if (array_key_exists('customization', $data)) {
            $this->setCustomization($data['customization']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getSlug(): string
    {
        return $this->fields['slug'];
    }

    public function setSlug(string $slug): static
    {
        $this->fields['slug'] = $slug;

        return $this;
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCustomDomain(): ?string
    {
        return $this->fields['customDomain'] ?? null;
    }

    public function setCustomDomain(null|string $customDomain): static
    {
        $this->fields['customDomain'] = $customDomain;

        return $this;
    }

    public function getFeatures(): ?CommonBillingPortalFeatures
    {
        return $this->fields['features'] ?? null;
    }

    public function setFeatures(null|CommonBillingPortalFeatures|array $features): static
    {
        if ($features !== null && !($features instanceof CommonBillingPortalFeatures)) {
            $features = CommonBillingPortalFeatures::from($features);
        }

        $this->fields['features'] = $features;

        return $this;
    }

    public function getCustomization(): ?CommonBillingPortalCustomization
    {
        return $this->fields['customization'] ?? null;
    }

    public function setCustomization(null|CommonBillingPortalCustomization|array $customization): static
    {
        if ($customization !== null && !($customization instanceof CommonBillingPortalCustomization)) {
            $customization = CommonBillingPortalCustomization::from($customization);
        }

        $this->fields['customization'] = $customization;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('slug', $this->fields)) {
            $data['slug'] = $this->fields['slug'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('customDomain', $this->fields)) {
            $data['customDomain'] = $this->fields['customDomain'];
        }
        if (array_key_exists('features', $this->fields)) {
            $data['features'] = $this->fields['features']?->jsonSerialize();
        }
        if (array_key_exists('customization', $this->fields)) {
            $data['customization'] = $this->fields['customization']?->jsonSerialize();
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

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
}
