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

interface PostFileRequest
{
    public function getIsPublic(): ?bool;

    public function setIsPublic(null|bool $isPublic): static;

    public function getName(): ?string;

    public function setName(null|string $name): static;

    public function getDescription(): ?string;

    public function setDescription(null|string $description): static;

    public function getSourceType(): ?string;

    public function setSourceType(null|string $sourceType): static;

    /**
     * @return null|string[]
     */
    public function getTags(): ?array;

    /**
     * @param null|string[] $tags
     */
    public function setTags(null|array $tags): static;
}
