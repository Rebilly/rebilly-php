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

class FileCreateFromUrl implements PostFileRequest
{
    public const SOURCE_TYPE_UPLOAD = 'upload';

    public const SOURCE_TYPE_CAMERA = 'camera';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
        }
        if (array_key_exists('isPublic', $data)) {
            $this->setIsPublic($data['isPublic']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('sourceType', $data)) {
            $this->setSourceType($data['sourceType']);
        }
        if (array_key_exists('tags', $data)) {
            $this->setTags($data['tags']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUrl(): string
    {
        return $this->fields['url'];
    }

    public function setUrl(string $url): static
    {
        $this->fields['url'] = $url;

        return $this;
    }

    public function getIsPublic(): ?bool
    {
        return $this->fields['isPublic'] ?? null;
    }

    public function setIsPublic(null|bool $isPublic): static
    {
        $this->fields['isPublic'] = $isPublic;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

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

    public function getSourceType(): ?string
    {
        return $this->fields['sourceType'] ?? null;
    }

    public function setSourceType(null|string $sourceType): static
    {
        $this->fields['sourceType'] = $sourceType;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getTags(): ?array
    {
        return $this->fields['tags'] ?? null;
    }

    /**
     * @param null|string[] $tags
     */
    public function setTags(null|array $tags): static
    {
        $this->fields['tags'] = $tags;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }
        if (array_key_exists('isPublic', $this->fields)) {
            $data['isPublic'] = $this->fields['isPublic'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('sourceType', $this->fields)) {
            $data['sourceType'] = $this->fields['sourceType'];
        }
        if (array_key_exists('tags', $this->fields)) {
            $data['tags'] = $this->fields['tags'];
        }

        return $data;
    }
}
