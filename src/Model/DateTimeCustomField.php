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

class DateTimeCustomField implements CustomField, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('additionalSchema', $data)) {
            $this->setAdditionalSchema($data['additionalSchema']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'datetime';
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
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

    public function getAdditionalSchema(): ?DateTimeCustomFieldAdditionalSchema
    {
        return $this->fields['additionalSchema'] ?? null;
    }

    public function setAdditionalSchema(null|DateTimeCustomFieldAdditionalSchema|array $additionalSchema): static
    {
        if ($additionalSchema !== null && !($additionalSchema instanceof DateTimeCustomFieldAdditionalSchema)) {
            $additionalSchema = DateTimeCustomFieldAdditionalSchema::from($additionalSchema);
        }

        $this->fields['additionalSchema'] = $additionalSchema;

        return $this;
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

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'datetime',
        ];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('additionalSchema', $this->fields)) {
            $data['additionalSchema'] = $this->fields['additionalSchema']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }
}