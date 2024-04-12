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

class Product implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('unitLabel', $data)) {
            $this->setUnitLabel($data['unitLabel']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('requiresShipping', $data)) {
            $this->setRequiresShipping($data['requiresShipping']);
        }
        if (array_key_exists('options', $data)) {
            $this->setOptions($data['options']);
        }
        if (array_key_exists('taxCategoryId', $data)) {
            $this->setTaxCategoryId($data['taxCategoryId']);
        }
        if (array_key_exists('accountingCode', $data)) {
            $this->setAccountingCode($data['accountingCode']);
        }
        if (array_key_exists('recognition', $data)) {
            $this->setRecognition($data['recognition']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
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

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getUnitLabel(): ?string
    {
        return $this->fields['unitLabel'] ?? null;
    }

    public function setUnitLabel(null|string $unitLabel): static
    {
        $this->fields['unitLabel'] = $unitLabel;

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

    public function getRequiresShipping(): ?bool
    {
        return $this->fields['requiresShipping'] ?? null;
    }

    public function setRequiresShipping(null|bool $requiresShipping): static
    {
        $this->fields['requiresShipping'] = $requiresShipping;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getOptions(): ?array
    {
        return $this->fields['options'] ?? null;
    }

    /**
     * @param null|string[] $options
     */
    public function setOptions(null|array $options): static
    {
        $this->fields['options'] = $options;

        return $this;
    }

    public function getTaxCategoryId(): ?string
    {
        return $this->fields['taxCategoryId'] ?? null;
    }

    public function setTaxCategoryId(null|string $taxCategoryId): static
    {
        $this->fields['taxCategoryId'] = $taxCategoryId;

        return $this;
    }

    public function getAccountingCode(): ?string
    {
        return $this->fields['accountingCode'] ?? null;
    }

    public function setAccountingCode(null|string $accountingCode): static
    {
        $this->fields['accountingCode'] = $accountingCode;

        return $this;
    }

    public function getRecognition(): ?ProductRecognition
    {
        return $this->fields['recognition'] ?? null;
    }

    public function setRecognition(null|ProductRecognition|array $recognition): static
    {
        if ($recognition !== null && !($recognition instanceof ProductRecognition)) {
            $recognition = ProductRecognition::from($recognition);
        }

        $this->fields['recognition'] = $recognition;

        return $this;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

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
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('unitLabel', $this->fields)) {
            $data['unitLabel'] = $this->fields['unitLabel'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('requiresShipping', $this->fields)) {
            $data['requiresShipping'] = $this->fields['requiresShipping'];
        }
        if (array_key_exists('options', $this->fields)) {
            $data['options'] = $this->fields['options'];
        }
        if (array_key_exists('taxCategoryId', $this->fields)) {
            $data['taxCategoryId'] = $this->fields['taxCategoryId'];
        }
        if (array_key_exists('accountingCode', $this->fields)) {
            $data['accountingCode'] = $this->fields['accountingCode'];
        }
        if (array_key_exists('recognition', $this->fields)) {
            $data['recognition'] = $this->fields['recognition']?->jsonSerialize();
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
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
