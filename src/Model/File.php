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

class File implements JsonSerializable
{
    public const SOURCE_TYPE_UPLOAD = 'upload';

    public const SOURCE_TYPE_CAMERA = 'camera';

    public const SOURCE_TYPE_ORGANIZATION_EXPORT = 'organization-export';

    public const SOURCE_TYPE_ORGANIZATION_CLOSURE_EXPORT = 'organization-closure-export';

    public const SOURCE_TYPE_NULL = 'null';

    public const MIME_IMAGE_PNG = 'image/png';

    public const MIME_IMAGE_JPEG = 'image/jpeg';

    public const MIME_IMAGE_GIF = 'image/gif';

    public const MIME_APPLICATION_PDF = 'application/pdf';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('extension', $data)) {
            $this->setExtension($data['extension']);
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
        if (array_key_exists('mime', $data)) {
            $this->setMime($data['mime']);
        }
        if (array_key_exists('size', $data)) {
            $this->setSize($data['size']);
        }
        if (array_key_exists('width', $data)) {
            $this->setWidth($data['width']);
        }
        if (array_key_exists('height', $data)) {
            $this->setHeight($data['height']);
        }
        if (array_key_exists('sha1', $data)) {
            $this->setSha1($data['sha1']);
        }
        if (array_key_exists('exifData', $data)) {
            $this->setExifData($data['exifData']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('isPublic', $data)) {
            $this->setIsPublic($data['isPublic']);
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

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->fields['extension'] ?? null;
    }

    public function setExtension(null|string $extension): static
    {
        $this->fields['extension'] = $extension;

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

    public function getMime(): ?string
    {
        return $this->fields['mime'] ?? null;
    }

    public function getSize(): ?int
    {
        return $this->fields['size'] ?? null;
    }

    public function getWidth(): ?int
    {
        return $this->fields['width'] ?? null;
    }

    public function getHeight(): ?int
    {
        return $this->fields['height'] ?? null;
    }

    public function getSha1(): ?string
    {
        return $this->fields['sha1'] ?? null;
    }

    public function getExifData(): ?array
    {
        return $this->fields['exifData'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
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
        if (array_key_exists('extension', $this->fields)) {
            $data['extension'] = $this->fields['extension'];
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
        if (array_key_exists('mime', $this->fields)) {
            $data['mime'] = $this->fields['mime'];
        }
        if (array_key_exists('size', $this->fields)) {
            $data['size'] = $this->fields['size'];
        }
        if (array_key_exists('width', $this->fields)) {
            $data['width'] = $this->fields['width'];
        }
        if (array_key_exists('height', $this->fields)) {
            $data['height'] = $this->fields['height'];
        }
        if (array_key_exists('sha1', $this->fields)) {
            $data['sha1'] = $this->fields['sha1'];
        }
        if (array_key_exists('exifData', $this->fields)) {
            $data['exifData'] = $this->fields['exifData'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('isPublic', $this->fields)) {
            $data['isPublic'] = $this->fields['isPublic'];
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

    private function setMime(null|string $mime): static
    {
        $this->fields['mime'] = $mime;

        return $this;
    }

    private function setSize(null|int $size): static
    {
        $this->fields['size'] = $size;

        return $this;
    }

    private function setWidth(null|int $width): static
    {
        $this->fields['width'] = $width;

        return $this;
    }

    private function setHeight(null|int $height): static
    {
        $this->fields['height'] = $height;

        return $this;
    }

    private function setSha1(null|string $sha1): static
    {
        $this->fields['sha1'] = $sha1;

        return $this;
    }

    private function setExifData(null|array $exifData): static
    {
        $this->fields['exifData'] = $exifData;

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
